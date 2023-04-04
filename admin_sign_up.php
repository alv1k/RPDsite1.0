<?php
	session_start();
	$_SESSION['id'] = session_id();
	//echo $_SESSION['username'];
?>
<?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "RPD_osnovi_Java");
    $select = "SELECT * FROM loginData WHERE login='{$_POST['login']}' AND pass='{$_POST['password']}'  ";
    $result = mysqli_query($conn, $select);


    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result)>0){
        echo "вы зашли в админ панель";  
        $_SESSION['user_id'] = $row['id'];
        echo $_SESSION['user_id'];
        $name = 'Администратор';
        setcookie('my_name',$name,time() + (86400)); // 86400 = 1 день в секундах
        header('Location: index.php');
        exit;
    }else{

        echo "вы ввели неверный пароль или логин";

    }


?>