<?php
	session_start();
	//echo $_SESSION['username'];
	if($_SESSION['user_id']==1){
		echo "1";
	}else{

	// если пользователь не авторизован
		if (!isset($_SESSION['user_id'])) {
			// то проверяем его куки
			// вдруг там есть логин и пароль к нашему скрипту

			if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
				// если же такие имеются
				// то пробуем авторизовать пользователя по этим логину и паролю
				$login = mysql_real_escape_string($_COOKIE['login']);
				$password = mysql_real_escape_string($_COOKIE['password']);

				// и по аналогии с авторизацией через форму:

				// делаем запрос к БД
				// и ищем юзера с таким логином и паролем

				$query = "SELECT `id`
						FROM `loginData`
						WHERE `login`='{$login}' AND `password`='{$password}'
						LIMIT 1";
				$sql = mysql_query($query) or die(mysql_error());

				// если такой пользователь нашелся
				if (mysql_num_rows($sql) == 1) {
					// то мы ставим об этом метку в сессии (допустим мы будем ставить ID пользователя)

					$row = mysql_fetch_assoc($sql);
					$_SESSION['user_id'] = $row['id'];

					// не забываем, что для работы с сессионными данными, у нас в каждом скрипте должно присутствовать session_start();
				}
				else {
					// только мы не будем давай ссылку на форму авторизации
					// вдруг человек и не хочет был авторизованым
					// а пришел просто поглядеть на наши страницы как гость
				}
			}
		}
		
	}

	$conn = mysqli_connect("127.0.0.1" , "root", "", "RPD_osnovi_Java");

	$select = "SELECT * FROM lessonText";
    $result = mysqli_query($conn, $select);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="">
	<div class="row menuBg gx-0">
		<div class="col-2" >
				<!-- //logo -->
				<!-- <h1 class="text-center mb-0">OWL School</h1> -->
				<a href="index.php">
					<img src="img/logoRPDsite.svg" class="col-12 ms-1">
				</a>
				
		</div>
		<div class="col-2 ">
			
		</div>
		<div class="col  d-flex">
			<div class="col-8 d-flex fs-3 pt-4">
			
				<a href="#" class="menu-item  noDecor">
					<button class="btns rounded border-0 mt-2 h-75 inputGroup">
						Уроки и модули
					</button>
				</a>
				
				<a href="reviews.php" class="menu-item  noDecor">
					<button class="btns ms-5 rounded border-0 mt-2 h-75 inputGroup">
						Отзывы
					</button>
				</a>
				<a href="#" class="menu-item  noDecor">
					<button class="btns ms-5 rounded border-0 mt-2 h-75 inputGroup">
						Об учителе
					</button>
				</a>
			</div>
			<?php
				if($_SESSION['user_id']==1){
				
			?>
			<div class="">
				<p>Вы вошли как админ</p>
				<a href="article_add.php" class="menu-item noDecor">
					<button class="btns ms-5 rounded border-0 h-50 inputGroup">
						Добавить статью
					</button>
				</a>
				<a href="index.php" class="menu-item noDecor">
					<button class="btns ms-5 rounded border-0 h-50 inputGroup">
						Выйти
					</button>
					<?php
					$_SESSION['user_id']=0;
					
					?>
				</a>
			</div>
			<?php
				}else {
					//echo "Вы вошли как админ";
			?>
			<a href="sign_in.html" class="menu-item mt-4 noDecor">
				<button class="btns ms-5 rounded border-0 mt-2 h-50 inputGroup">
					Войти
				</button>
			</a>

			<?php
				}
			?>
		</div>
	</div>
	<div class="row  gx-0">
		<div class="col-2 ps-4 pt-3 menuBg">
			<div class="mt-2">
				<h2>Модули</h2>

				<?php
				 $conn_m = mysqli_connect("127.0.0.1", "root", "", "RPD_osnovi_Java");
				 $select_m = "SELECT * FROM modules";
				 $result_m = mysqli_query($conn_m, $select_m);
                if(mysqli_num_rows($result_m)>0){
                
                
                    while($row_m = mysqli_fetch_assoc($result_m)) {
                        //echo "hey";
                    
                ?>
				<p class="fs-6 border-bottom" id="module_num"> <?php echo $row_m["moduleID"]?>. <span id="module_name"><?php echo $row_m["name"]?></span> </p>

                <?php
                    }
                }
                ?>
			</div>
			<div>
				<h3>Задания</h3>
                <?php
                
                    while($row_m = mysqli_fetch_assoc($result_m)) {
                        //echo "hey";
                    
                ?>
                <p id="task_num"> <span id="task_name"></span> </p>
                <?php
                    }
                
                ?>
				
			</div>
		</div>
		<div class="col-2 ">
			
		</div>
		<div class="col">
			<div class="d-flex fs-4 text-dark pt-2">
				<a href="" class="noDecor">
					<button class="rounded border-0 btns inputGroup">
						Статьи
					</button>
				</a>	
				<a href="" class="noDecor">
					<button class="ms-5 rounded border-0 btns inputGroup">
						Авторы
					</button>
				</a>
			</div>

			
			<div class="bg-light col-10 p-3 mt-3">
				<div class="d-flex">
					<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="col-2 ms-3 mt-3">
					<div class="pt-3 ps-3">
						<p class="fs-2">Johny</p>
						<p class="fs-4">10.12.2022</p>						
					</div>

				</div>
				<h1 class="mt-5">Цикл for</h1>
			<?php

				// while(){
				// 	mysqli_fetch_assoc($result);
				// }
				$row = mysqli_fetch_assoc($result);
				$row = mysqli_fetch_assoc($result);
				$row = mysqli_fetch_assoc($result);
				$array_text = explode( '. ', $row['text'] ); 
				for($i=0;$i<count($array_text); $i++){
		
				}
			?>
				<p class="">
					<?php 
						echo $array_text[0];
					?>
				</p>
				<div class="col-4 bg-white p-1 rounded">
					<p class="col-12">
					<?php 
						echo $array_text[1];
					?>
					</p>
					<img class="col-12" src="img/1.png">
				</div>
				
				<p class="mt-4 ">
					<?php 
						echo $array_text[2];
					?>
				</p>
				<p>
					<?php 
						echo $array_text[3];
					?>
				</p>

				<p>
					<?php 
						echo $array_text[4];
					?>
				</p>
				<div class="col-6 bg-white p-1 rounded">
					<p class="col-12">
					<?php 
						echo $array_text[5];
					?>
					</p>
					<img class="col-12" src="img/2.png">
				</div>
				<div class="col-6 bg-white p-1 rounded">
					<p class="col-12">
					<?php 
						echo $array_text[6];
					?>
					</p>
					<img class="col-12" src="img/3.png">
				</div>
				<p>
					<?php 
						echo $array_text[7];
					?>
				</p>
				<p>
					<?php 
						echo $array_text[8];
					?>
				</p>
				<p>
					<?php 
						echo $array_text[9];
					?>
				</p>
				<p>
					<?php 
						echo $array_text[10];
					?>
				</p>
				<p>
					<?php 
						echo $array_text[11];
					?>
				</p>

				
			</div>
		</div>
			
	</div>

</body>
</html>