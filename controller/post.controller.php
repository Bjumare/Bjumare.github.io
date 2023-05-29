<?php
    session_start();
    
    if(isset($_POST['submit'])){
    
    include_once "../db/dbconnect.php";

        $post_body = $_POST['post_body'];
        $username = $_POST['username'];

        if (isset($_FILES['post_image']['name']) AND !empty($_FILES['post_image']['name'])) {

            $img_name = $_FILES['post_image']['name'];
            $img_size = $_FILES['post_image']['size'];
            $tmp_name = $_FILES['post_image']['tmp_name'];
            $error = $_FILES['post_image']['error'];
            
            if($error === 0){
                
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);
                $allowed_exs = array('jpg', 'jpeg', 'png');
                    if(in_array($img_ex_to_lc, $allowed_exs)){
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_lc;
                    $comment_path = '../includes/assets/img/'.$new_img_name;
                    move_uploaded_file($tmp_name, $comment_path);
                    
                    $sql = "INSERT INTO post(username,body,image) VALUES (?,?,?)";
                    $stmt = $conn->prepare($sql);
                        $stmt->execute([$username,$post_body,$new_img_name]);

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
                $sql = "INSERT INTO post(username,body) VALUES (?,?)";
                $stmt = $conn->prepare($sql);
                    $stmt->execute([$username,$post_body]);

                    header('Location: ../views/index.php');
                    exit();
    }else{
        $em = "Error";
        header("Location: ../views/index.php?error=$em");
        exit;
    }
        
?>