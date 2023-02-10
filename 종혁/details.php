<?php
require_once 'DB.php';

if(isset($_GET['id'])){
    $id = preg_replace("/[\"\']/i", "", $_GET['id']);
}
$userId = preg_replace("/[\"\']/i", "", $_GET['userId']);

$posts = DB::fetch("SELECT * FROM post WHERE id='$id'");
$users = DB::fetch("SELECT * FROM user WHERE userId='$userId'");

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="postBox">
        <div class="title">title: <?= $posts->title ?></div>
        
        <div class="id">id: <?= $id ?></div>
        <div class="timestamp">timestamp: <?= $posts->timestamp ?></div>
        <div class="content">content: <?= $posts->content ?></div>
        <div class="img"><img src="./postImg/<?= $id ?>.png" alt="titleImg"></div>
        <?php if($posts->userId === $users->id) :  ?>
            <div class="update"><a href="edit.php?id=<?= $id ?>&userId=<?= $_GET['userId'] ?>&apid=<?= $_GET['apid'] ?>">수정</a></div>
            <div class="remove"><a href="delete.php?id=<?= $id ?>&userId=<?= $_GET['userId'] ?>&apid=<?= $_GET['apid'] ?>">삭제</a></div>
        <?php endif  ?>
    </div>
</body>
</html>