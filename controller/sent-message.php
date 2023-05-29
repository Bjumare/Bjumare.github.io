<?php

    session_start();

    if(isset($_POST['submit'])){

        include_once "../db/dbconnect.php";

        $username = $_SESSION['username'];
        $message = $_POST['message'];

        $chat_sql = "INSERT INTO chat(username,message) VALUES (?,?)";
        $stmt = $conn->prepare($chat_sql);
        $stmt->execute([$username,$message]);

        header('Location: ../views/index.php');
        exit();
    }else{
        header('Location: ../views/index.php?error=error');
        exit(); 
    }

?>