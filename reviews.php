<?php
	session_start();
	$_SESSION['id'] = session_id();
	//echo $_SESSION['username'];
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
					<img src="logo5.png" class="col-12 ms-1">
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
				if($_SESSION['username']!='admin'){

				

			?>
			<a href="sign_in.php" class="menu-item mt-4 noDecor">
				<button class="btns ms-5 rounded border-0 mt-2 h-50 inputGroup">
					Войти
				</button>
			</a>

			<?php
				}else if($_SESSION['username']=='admin'){
					//echo "Вы вошли как админ";
				}
			?>
			<div class="">
				<p>Вы вошли как админ</p>
				<a href="article_add.php" class="menu-item noDecor">
					<button class="btns ms-5 rounded border-0 h-50 inputGroup">
						Добавить статью
					</button>
				</a>
			</div>
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

			
			<div class="bg-light col-10 p-3 mt-3">
				<div class="d-flex">
					<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="col-2 ms-3 mt-3">
					<div class="pt-3 ps-3">
						<p class="fs-2">Johny</p>
						<p class="fs-4">10.12.2022</p>						
					</div>

				</div>
				<h1 class="mt-5">Цикл for</h1>
				<p class="">
					Здравствуйте, сегодня поговорим о циклах.
				</p>
				<p class="">
					Представьте себе ситуацию, когда заказчику стало необходимо вывести на консоль последовательность годов от 1990 до 2000.
				</p>
				<div class="col-4 bg-white p-1 rounded">
					<p class="col-12">
						это легко можно сделать с помощью этого кода:
					</p>
					<img class="col-12" src="img/1.png">
				</div>
				
				<p class="mt-4 ">
					но что если заказчик отправил правки в техническое задание и теперь нужно вывести от 1980 до 2000 ?
					можем ли мы как-то автоматизировать эти действия?
				</p>
				<p>
					Неужели нам придется писать один код много раз?
				</p>

				<div class="col-6 bg-white p-1 rounded">
					<p class="col-12">
						Чтобы этого избежать будем использовать цикл for
					</p>
					<img class="col-12" src="img/2.png">
				</div>
				<p>
					
				</p>
				<div class="col-6 bg-white p-1 rounded">
					<p class="col-12">
						Для начала запустим код, который поможет нам понять как работает цикл
					</p>
					<img class="col-12" src="img/3.png">
				</div>
				<p>
					Первое равенство - начало цикла. (В нашем случае - 0)
				</p>
				<p>
					Второе - продолжительность цикла. (Цикл отработает до того, как достигнет цифры 10)
				</p>
				<p>
					Третье  - условие шага цикла. (от начала цикла каждый раз прибавляем 1)
				</p>

				
			</div>
		</div>
			
	</div>

</body>
</html>