<?php
require_once 'DB.php';

if(isset($_GET['id'])){
 $id = $_GET['id'];
 $userId = $_GET['userId'];
 $apid = $_GET['apid'];
}else{
    header("Location: main.php");
} 

$posts = DB::fetch("SELECT * FROM post where id=$id");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <form action="edit.handler.php" method="post" enctype="multipart/form-data">
        <label for="title">제목: </label>
        <input type="text" id="title" name="title" value="<?= $posts->title ?>" required autofocus>
        <div class="id">고유 아이디: <?= $posts->id ?></div>
        <input type="hidden" value="<?= $id ?>" name="id">
        <div class="timestamp">작성 시간: <?= $posts->timestamp ?></div>
        <input type="hidden" value="<?= $posts->timestamp ?>" name="timestamp">
        <label for="content">내용: </label>
        <textarea name="content" id="content" cols="30" rows="10" required><?= $posts->content ?></textarea>
        <label for="img">이미지: </label>
        <input type="file" id="img" name="img"> 
        <input type="hidden" name="userId" value="<?= $userId ?>">
        <input type="hidden" name="apid" value="<?= $apid ?>">
        <input type="submit" value="save">
    </form>
</body>
</html>