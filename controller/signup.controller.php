<?php
    session_start();
    
    if(isset($_POST['submit'])){
    
    include_once "../db/dbconnect.php";

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn -> query($sql);
            if($result -> num_rows > 0){
                header("Location: ../signup.php?notif=Account Already Exist");
                exit();

            } else {
                $query = "INSERT INTO users(username,password) VALUES (?,?)";
                $stmp = $conn -> prepare($query);
                $stmp -> execute([$username,$password]);

                header("Location: ../login.php?notif=Success");
                exit();
            }
    }   
        
?>