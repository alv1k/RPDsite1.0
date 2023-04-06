<?php
	session_start();

	// если пользователь не авторизован
		
	if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
		// если же такие имеются
		// то пробуем авторизовать пользователя по этим логину и паролю
		$login = $_SESSION['login'];
		$password = $_SESSION['password'];

		$conn = mysqli_connect("127.0.0.1", "root", "", "RPD_osnovi_Java");
		// и по аналогии с авторизацией через форму:

		// делаем запрос к БД
		// и ищем юзера с таким логином и паролем

		$query = "SELECT `id`
				FROM `loginData`
				WHERE `login`='{$login}' AND `pass`='{$password}'
				LIMIT 1";
		$sql = mysqli_query($conn, $query);

		// если такой пользователь нашелся
		if (mysqli_num_rows($sql) == 1) {
			// то мы ставим об этом метку в сессии (допустим мы будем ставить ID пользователя)

			$row = mysqli_fetch_assoc($sql);
			$_SESSION['user_id'] = $row['id'];
			$name = 'Администратор';
			setcookie('my_name',$name,time() + (86400)); // 86400 = 1 день в секундах
			// не забываем, что для работы с сессионными данными, у нас в каждом скрипте должно присутствовать session_start();
		}
		else {
			// только мы не будем давай ссылку на форму авторизации
			// вдруг человек и не хочет был авторизованым
			// а пришел просто поглядеть на наши страницы как гость
		}
	}
	
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

<?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "RPD_osnovi_Java");
    $select = "SELECT * FROM modules";
    $result = mysqli_query($conn, $select);

?>
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
				
				<a href="index.php" class="menu-item  noDecor">
					<button class="btns rounded border-0 mt-2 h-50 inputGroup">
						Лонгриды
					</button>
				</a>
				
				<a href="reviews.php" class="menu-item  noDecor">
					<button class="btns ms-5 rounded border-0 mt-2 h-50 inputGroup">
						Отзывы
					</button>
				</a>
				<a href="about.php" class="menu-item  noDecor">
					<button class="btns ms-5 rounded border-0 mt-2 h-50 inputGroup">
						Об учителе
					</button>
				</a>
				
			</div>
			<?php

			
				if( $_COOKIE['my_name'] != '' ){
					//echo 'Привет, ' . $_COOKIE['my_name'] . '!';
				
				
				
			?>
			<div class="pt-4">
				<p class="mt-2">Вы вошли как админ</p>
				<a href="article_add.php" class="menu-item noDecor">
					<button class="btns rounded border-0 h-25 inputGroup col-12">
						Добавить статью
					</button>
				</a>
				<a href="index.php" class="menu-item noDecor">
					<form action="btnCookieKill.php" method="POST">
						<button name="btnCookieKill" class="btns mt-2 rounded border-0 h-50 inputGroup col-12">
							Выйти
						</button>
					</form>
					
				</a>
			</div>
			<?php
				}else{
				echo 'Привет, Гость!';
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
                if(mysqli_num_rows($result)>0){
                
                
                    while($row = mysqli_fetch_assoc($result)) {
                        //echo "hey";
                    
                ?>
				<p class="fs-6 border-bottom" id="module_num"> <?php echo $row["moduleID"]?>. <span id="module_name"><?php echo $row["name"]?></span> </p>

                <?php
                    }
                }
                ?>
			</div>
			<div>
				<h3>Задания</h3>
                <?php
                
                    while($row = mysqli_fetch_assoc($result)) {
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
			<div class="mt-3 input-group fs-5">
				<input type="" name="" placeholder="Поиск" class="rounded-start col-5 border-0 bg-light inputGroup">
				<button class="inputGroup rounded-end col-1 border-0">Искать</button>
				<button class="ms-5 inputGroup rounded col-2 border-0">Написать статью</button>
				
				
			</div>
			<div class="row mt-5 mx-0">

			<?php
			 $conn = mysqli_connect("127.0.0.1", "root", "", "RPD_osnovi_Java");
			 $select = "SELECT * FROM lessonText";
			 $result = mysqli_query($conn, $select);
			 if(mysqli_num_rows($result)>0){
                
				while($row = mysqli_fetch_assoc($result)) {
					//echo "hey";
				
					print_r($row);
			?>
			<form action="article<?php echo $row['id'];    ?>.php"  method="get">	
			<div class="article col-10 p-0 mt-5">
				<a href="" class="noDecor d-flex border rounded">		
				
					<div class="col-5 article-image rounded-start">
						
					</div>
					<div class="col-7 rounded-end bg-light">
						<div class="col-12 d-flex">
							<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="col-2 ms-3 mt-3">
							<div class="ms-3">
								<p id="longread_author" class="fs-2 ms-2 align-center"><?php echo $row['title']?></p>
								<p id="name_of_author" class="ms-2"><?php echo $row['author']?></p>
							</div>
							
						</div>
						
						<p id="longread_title" class="fs-3 ms-3 mt-3"><?php echo $row['title']?></p>
						<p id="longread_description" class="fs-4 ms-3 mt-3">Описание</p>
					</div>
					<input type="submit" value="<?php echo $row['id']?>" id="rowID" name="rowID">
				</a>	
			</div>
			</form>
			<?php
				}
				exit;
			}
			?>	
			</div>

			
		</div>
	</div>

	<!-- 
		низкоуровневое прогр C С++ Rust
		frontend js 
		backend php python ruby динамическая е коммерс
		backend serious java c# строгая(статическая) типизация unix хосты, порта, маршрутизация, не с 0, чудовищная сложность.
		mobile нативная под конкретн ОС боолее популярная java kotlin android swift apple
		mobile кроссплатформенная darts react-native
		gamedev unity-c# казуал мобилки прост графика       unreal-c++ триплЭй качественные игры


		javascript/typescript-популярный, web-interface написан на нем бэкенд на nodejs- скорее стартапы
		java - java enterprice автоматизация международных корпораций банки, нефть, телеком, 

	 -->
<script type="text/javascript">
	

</script>
</body>
</html>