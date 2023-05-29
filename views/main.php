<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
.create-post {
  width: 500px;
  height: 410px;
  overflow: hidden;
  background: #fff;
  border-radius: 10px;
  transition: height 0.2s ease;
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
}
.create-post .active{
  height: 500px;
}
.create-post  .wrapper{
  width: 1000px;
  display: flex;
}
.create-post  .wrapper section{
  width: 500px;
  background: #fff;
}
.create-post  img{
  cursor: pointer;
}
.create-post  .post{
  transition: margin-left 0.18s ease;
}
.create-post .active .post{
  margin-left: -500px;
}
.post header{
  font-size: 22px;
  font-weight: 600;
  padding: 17px 0;
  text-align: center;
  border-bottom: 1px solid #bfbfbf;
}
.post form{
  margin: 20px 25px;
}
.post form .content,
.audience .list li .column{
  display: flex;
  align-items: center;
}
.post form .content img{
  cursor: default;
  max-width: 52px;
}
.post form .content .details{
  margin: -3px 0 0 12px;
}
form :where(textarea, button){
  width: 100%;
  outline: none;
  border: none;
}
form textarea{
  resize: none;
  font-size: 18px;
  margin-top: 30px;
  min-height: 100px;
}
form textarea::placeholder{
  color: #858585;
}
form textarea:focus::placeholder{
  color: #b3b3b3;
}
form button{
  height: 53px;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  cursor: pointer;
  color: #BCC0C4;
  cursor: no-drop;
  border-radius: 7px;
  background: #e2e5e9;
  transition: all 0.3s ease;
  position: relative;
  bottom: 10px;
  left: -10px;
}
form textarea:valid ~ button{
  color: #fff;
  cursor: pointer;
  background: #4599FF;
}
form textarea:valid ~ button:hover{
  background: #1a81ff;
}
.add-image {
  position: relative;
  left: -10px;
  bottom: -25px;
}
.post-post {
  position: relative;
  left: -10px;
}
</style>

<body>
<div class="container create-post">
  <div class="wrapper">
    <section class="post">
      <header>Create Post</header>
      <form action="#">
        <div class="content">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/1156px-Picture_icon_BLACK.svg.png" alt="profile pic">
          <div class="details">
            <p>User name</p>
          </div>
        </div>
        <div class="form-group">
          <textarea placeholder="What's on your mind?" spellcheck="false"></textarea>
        </div>
        <div class="form-group add-image">
          <label for="files" class="btn btn-primary w-100 py-2">Add Image</label>
          <input class="form-control" id="files" style="visibility:hidden;" type="file" name="image" accept="image/*">
        </div>
        <div class="form-group post-post">
          <input class="btn btn-primary form-control py-2" type="submit" name="submit" value="Post">
        </div>
      </form>
    </section>
  </div>
</div>

<script>
  $("#files").change(function() {
  filename = this.files[0].name;
  console.log(filename);
});
</script>
<script src="https://kit.fontawesome.com/b675cf384a.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>