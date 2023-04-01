<?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "RPD_osnovi_Java");
    $insert = "INSERT INTO lessontext (title, author, text) VALUES ('{$_POST['title']}', '{$_POST['author']}', '{$_POST['text']}')";
    $result = mysqli_query($conn, $insert);
    
    header('Location: index.php');
    exit;
?>