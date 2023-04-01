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
			<a href="sign_in.html" class="menu-item mt-4 noDecor">
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