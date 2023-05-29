<?php
    session_start();
    
    if(isset($_POST['submit'])){
    
    include_once "../db/dbconnect.php";

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn -> query($sql);
            if($result -> num_rows == 1){
                $row = $result -> fetch_assoc();
                    if($row['password'] == $password){
                        $_SESSION['username'] = $username;
                        $_SESSION['user_pwd'] = $password;

                        header('Location: ../views/index.php');
                    }else{
                        header("Location: ../login.php?notif=Failed to Login");
                        exit();
                    }

            } else {
            header("Location: ../login.php?notif=Account Doesn't Exist");
            exit();
            }
    }   
        
?>