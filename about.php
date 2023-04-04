<?php
	session_start();
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
				<p id="module">1. Введение</p>
			</div>
			<div>
				<h3>Задания</h3>
				<p id="task">1. Задание</p>
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

			
			<div class="review article col-10 p-0 mt-5">
				<p class="fs-3 ms-3">Об учителе</p>
			</div>
		</div>
			
	</div>

</body>
</html>