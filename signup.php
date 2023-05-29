<?php
    require_once 'header.php';
?>

<div class="wrapper">
    <div class="container main">
        <div class="row login">
            <div class="container d-flex text-center justify-content-center">
                <h3 id="title" class="text-start"> <span id="bname">Sign up</span></h3>
            </div>
            <div class="container my-4 px-4 bg-white">
                <form action="controller/signup.controller.php" method="post" class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" autocomplete="off" required>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" autocomplete="off" required class="form-control">
                    <div class="container w-50 my-4">
                        <input type="submit" name="submit" value="Sign up" class="btn form-control btn-primary">
                    </div>
                </form>
                <p class="text-center">Already Have an Account?<span><a href="login.php">click here</a></span></p>
            </div>
        </div>
    </div>
</div>
    
<?php
    require_once 'footer.php';
?>