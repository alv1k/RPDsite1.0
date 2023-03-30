<?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "RPD_osnovi_Java");
    $select = "SELECT * FROM loginData";
    $result = mysqli_query($conn, $select);


    $row = mysqli_fetch_assoc($result);

    $login = $_POST['login'];    
    $pass = $_POST['password'];      

    if($row['login']==$login && $row['pass']==$pass){
        echo "вы зашли в админ панель";
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'admin';
        echo $_SESSION['username'];
        //header('Location: index.php');
        exit;
    }else{
        echo "вы ввели неверный пароль или логин";

    }


?>