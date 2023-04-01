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

                <div class="bg-success col-10 p-0 mt-5">
                    <form action="article_add_php.php" method="post">
                        <div>
                            <input name="title" type="text" placeholder="Тема">
                        </div>
                        <div>
                            <input name="author" type="text" placeholder="Автор" value="<?php echo $_SESSION['username']?>">
                        </div>
                        <div>
                            <textarea name="text" type="text" placeholder="Текст"></textarea>
                        </div>
                        <input type="submit"  value="Отправить" >
                    </form>
                </div>
			
			</div>

			
		</div>
	</div>
<script type="text/javascript">

	

</script>
</body>
</html>