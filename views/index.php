<?php
    require_once 'header.php';
?>

<div class="container create-post my-5">
  <div class="wrapper">
    <section class="post">
      <header>Create Post</header>
      <form action="../controller/post.controller.php" method="post" enctype="multipart/form-data">
        <div class="content">
          <img class="img img-fluid rounded" src="../includes/assets/img/poriflepic_thumbnail.png" alt="profile pic">
          <div class="details">
            <p><?=$_SESSION['username']?></p>
          </div>
        </div>
           <input type="text" name="username" value="<?=$_SESSION['username']?>" hidden> 
          <textarea name="post_body" placeholder="What's on your mind?"></textarea>
          <label for="post-_image">Add Image</label>
          <input class="form-control" id="files" type="file" name="post_image" accept="image/*">
        <div class="form-group post-post">
          <input class="btn btn-primary form-control py-2" type="submit" name="submit" value="Post">
        </div>
      </form>
    </section>
  </div>
</div>

<?php

    $user = $_SESSION['username'];
    $post = "SELECT * FROM post WHERE username = '$user'";
    $post_run = $conn -> query($post);
    if($post_run -> num_rows > 0){
        while($userp = $post_run -> fetch_assoc()){
            ?>
                <section class="py-5 post">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">

                                <!-- CUSTOM BLOCKQUOTE -->
                                <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                                    <h4><?=$userp['username']?></h4>
                                    
                                    <?php
                                        if($userp['react'] == 0){
                                    ?>
                                    
                                        <a href="../controller/react.status.controller.php?user_id=<?=$userp['id']?>&&react=1"><div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa-regular fa-heart fa-xl" style="color: #ffffff;"></i></a>
                                    </div>
                                    <?php
                                        }else{
                                    ?>
                                    
                                        <a href="../controller/react.status.controller.php?user_id=<?=$userp['id']?>&&react=0"><div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa-solid fa-heart fa-xl" style="color: #ff0000;"></i></a>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <!-- <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa fa-quote-left text-white"></i></div> -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <p style="word-wrap: break-word;"><?=$userp['body']?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-center border-bottom">
                                                <img class="img img-fluid my-4" id="post_img" src="../includes/assets/img/<?=$userp['image']?>" alt="image">
                                            </div>
                                        </div>

                                        
                                        <?php
                                        $postc = "SELECT * FROM comment";
                                        $postc_run = $conn -> query($postc);
                                        if($postc_run -> num_rows > 0){
                                            
                                    ?>
                                    <div class="row">
                                        <div class="col my-2">
                                            <small class="">Comments:</small>
                                            <?php
                                            while($sent = $postc_run -> fetch_assoc()){
                                                if($sent['user_id'] == $userp['id']){
                                            ?>
                                            <p style="word-wrap: break-word; margin-bottom: 0;"><strong><?=$sent['username']?></strong></p>
                                            <p style="word-wrap: break-word;"><?=$sent['comment']?></p>
                                            <?php
                                                }
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <?php
                                        }
                                    ?>
                                    <div class="row">
                                        <form class="form-group" action="../controller/comment.controller.php?user=<?=$userp['username']?>&&id=<?=$userp['id']?>" method="post" enctype="multipart/form-data">
                                            <div class="col">
                                                <!-- <label class="mt-5 mb-2" for="comment">Comment</label>
                                                <textarea class="form-control" type="text" name="comment" id=""></textarea>
                                                <input class="form-control" type="text" name="comment" autocomplete="off" id="contenteditable" style="width: 95%;"> -->
                                            <div class="row input-icons">
                                                <div class="col">
                                                    <!-- <textarea class="form-control" type="text" name="comment" id=""></textarea> -->
                                                    <input class="form-control" type="text" name="comment" autocomplete="off" id="contenteditable" style="" placeholder="Comment">
                                                </div>
                                                <div class="col-lg-3">
                                                    <!-- <i class="fa-solid fa-paper-plane float-end mb-5 icon" style="cursor: pointer; position: relative; top: 10px; left: -70px;"> -->
                                                    <input class="form-control" type="submit" name="submit" value="Post">
                                                </div>
                                                <!-- <i class="fa-solid fa-paper-plane float-end mb-5 icon" style="position: relative; top: -28px; left: 10px;"></i>
                                                <input class="form-control input-field" type="submit" name="submit" value="Send"> -->
                                            </div>
                                                <!-- <i class="fa-solid fa-paper-plane float-end mb-5 icon" style="position: relative; top: -28px; left: 10px;"></i> -->
                                                <!-- <span class="textarea form-control" role="textbox" name="comment" contenteditable></span> -->
                                            </div>
                                            <!-- <div class="col-lg-3 my-3">
                                                <input class="form-control" type="submit" name="submit" value="Send">
                                            </div> -->
                                        </form>
                                    </div>

                                    
                                </blockquote><!-- END -->
                            </div>
                        </div>
                    </div>
                </section>
  
            <?php
    }
        }
    
?>

<section class="avenue-messenger">
<div class="menu">
<div class="items"><span>
    <a href="#" title="Minimize">&mdash;</a><br>
<!--     
    <a href="">enter email</a><br>
    <a href="">email transcript</a><br>-->
    <a href="#" title="End Chat">&#10005;</a>
    
    </span></div>
    <div class="button">...</div>
</div>
<div class="agent-face">
    <div class="half">
    <img class="agent circle" src="../includes/assets/img/poriflepic_thumbnail.png  " alt="Jesse Tino"></div>
</div>
<div class="chat">
<div class="chat-title">
    <h1><?=$_SESSION['username']?></h1>
<!--  <figure class="avatar">
    <img src="http://askavenue.com/img/17.jpg" /></figure>-->
</div>
<div class="container-fluid messages">
    <div class="messages-content" style="overflow-y: scroll;">
    <?php
        $users = $_SESSION['username'];
        $chat = "SELECT * FROM chat WHERE username = '$users'";
        $chat_run = $conn -> query($chat);
        if($chat_run -> num_rows > 0){
            while($chatp = $chat_run -> fetch_assoc()){
                ?>
                    <div class="row my-3 mx-3">
                        <div class="col text-end overflow-hidden">
                            <label for=""><?=$chatp['username']?></label>
                            <p class="alert alert-primary d-block rounded" style="margin-bottom: 0; word-wrap: break-word;"><?=$chatp['message']?></p>
                            <p class="mb-3"><?=$chatp['date']?></p>
                        </div>
                    </div>
                <?php
            }
        }
    ?>
    </div>
</div>
<div class="message-box">
    <form action="../controller/sent-message.php" method="post">
        <!-- <textarea type="text" class="message-input" name="message" placeholder="Type message..."></textarea> -->
        <input type="text" class="message-input" name="message" placeholder="Type your message..." style="word-wrap: break-word;">
        <input type="submit" class="message-submit" name="submit" value="Send">
    </form>
    
    
</div>
</div>
</div>
</section>

<script>
  $("#files").change(function() {
  filename = this.files[0].name;
  console.log(filename);
});
</script>

<?php
    require_once '../includes/assets/mandatory_script.php';
    require_once 'footer.php';
?>
