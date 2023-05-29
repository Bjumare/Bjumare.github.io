<?php

    require_once '../db/dbconnect.php';

    $user_id = $_GET['user_id'];
    $react = $_GET['react'];
    
    $sql = "UPDATE post 
            SET react = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$react,$user_id]);

    header("Location: ../views/index.php");

?>