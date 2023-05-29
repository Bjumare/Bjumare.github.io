<?php
    require_once 'header.php';
?>

<div class="wrapper">
    <div class="container main">
        <div class="row login">
            <div class="container d-flex text-center justify-content-center">
                <img class="img img-fluid mx-2 logo" id="thumbnail" src="includes/assets/img/logo-ghost-white.png" alt="">
                <h3 id="title" class="text-start"> <span id="bname">SPOOOK <br> SPACE .</span></h3>
            </div>
            <div class="container my-4 px-4 bg-white">
                <form action="controller/login.controller.php" method="post" class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" autocomplete="off" required>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" autocomplete="off" required class="form-control">
                    <div class="container w-50 my-4">
                        <input type="submit" name="submit" class="btn form-control btn-primary">
                    </div>
                </form>
                <p class="text-center">Dont Have an Account?<span><a href="signup.php">click here</a></span></p>
            </div>
        </div>
    </div>
</div>
    
<?php
    require_once 'footer.php';
?>