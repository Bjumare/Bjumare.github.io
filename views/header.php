<?php
    require_once '../session/login.session.php';
    require_once '../db/dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']; ?></title>
    
    <link rel="shortcut icon" href="../includes/assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../includes/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../includes/assets/css/login.css">
    <link rel="stylesheet" href="../includes/assets/css/qoute.css">
    <link rel="stylesheet" href="../includes/assets/css/style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'>

    
    
</head>
<body class="bg-primary">

<?php require_once 'navbar.php'; ?>