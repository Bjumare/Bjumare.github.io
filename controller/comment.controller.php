<?php
    session_start();
    
    if(isset($_POST['submit'])){
    
    include_once "../db/dbconnect.php";

        $comment = $_POST['comment'];
        $user = $_GET['user'];
        $id = $_GET['id'];


        if (isset($_FILES['image']['name']) AND !empty($_FILES['image']['name'])) {

            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
            
            if($error === 0){
                
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);
                $allowed_exs = array('jpg', 'jpeg', 'png');
                    if(in_array($img_ex_to_lc, $allowed_exs)){
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_lc;
                    $comment_path = '../includes/assets/img/'.$new_img_name;
                    move_uploaded_file($tmp_name, $comment_path);
                    
                    $sql = "INSERT INTO comment(username,comment,image,user_id) VALUES(?,?,?,?)";
                    $stmt = $conn->prepare($sql);
                        $stmt->execute([$user,$comment,$new_img_name,$id]);
                        
                        $_SESSION['comment'] = $comment;
                        header('Location: ../views/index.php');
                    }else{
                        $em = "You can't upload files of this type";
                        header("Location: ../views/index.php?error=$em");
                        exit;
                    }
                }else{
                    $em = "Error";
                        header("Location: ../views/index.php?error=$em");
                        exit;
                }
            }else
            $sql = "INSERT INTO comment(username,comment,user_id) VALUES(?,?,?)";
            $stmt = $conn->prepare($sql);
                $stmt->execute([$user,$comment,$id]);

                    $_SESSION['comment'] = $comment;
                    header('Location: ../views/index.php');
                    exit();
    }else{
        $em = "Error";
        header("Location: ../views/index.php?error=$em");
        exit;
    }
        
?>