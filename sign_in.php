<?php
	session_start();
	$_SESSION['id'] = session_id();
	//echo $_SESSION['username'];
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
		</div>
	</div>

	<form action="admin_sign_up.php" class="p-5 text-center" method="POST">
		<input type="text" name="login" placeholder="login" class="mt-3"></input><br>
		<input type="password" name="password" placeholder="password" class="mt-3"></input><br>
		<button type="submit" class="mt-3">
            Войти
		</button>
	</form>

<script type="text/javascript">
	// let artice = document.querySelectorAll(".article");
	// for(let i = 0; i < artice.length; i++){
	// 	artice[i].onclick = function(){
	// 		window.location.href = 'article.php';
	// 	}
	// }
	

</script>
</body>
</html>