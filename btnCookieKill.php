<?php
session_start();
if (isset($_POST['btnCookieKill'])) {
    $name = 'Администратор';
    setcookie ( 'my_name', $name, time()-5 );
    header('Location: index.php');

}


?>