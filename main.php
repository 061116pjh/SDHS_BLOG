<?php
require_once 'DB.php';
$posts = DB::fetchAll("SELECT * FROM post");
if(isset($_GET['id'])){
    $id = preg_replace("/[\"\']/i", "", $_GET['id']);
}
if(isset($GET['userId'])){
    $userId = preg_replace("/[\"\']/i", "", $_GET['userId']);
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDHS_BLOG</title>
    <link rel="stylesheet" href="./style/main.css">
</head>
<body>
    <?php if(isset($_GET['userId'])) : ?>
        <h1><?= $_GET['userId'] ."님 안녕하세요" ?></h1>
        <div class="link-created"><a href="created.php?userId=<?= $_GET['userId'] ?>&id=<?=$id ?>">게시물 작성</a></div>
        <div class="link-profile"><a href="profile.php?userId=<?= $_GET['userId'] ?>&id=<?=$id ?>">프로필</a></div>
        <div class="link-logout"><a href="logout.php">로그아웃</a></div>
        <?php endif; ?>
        <?php if(!isset($_GET['userId'])) : ?>
            <h1>로그인 후 이용해주세요</h1>
            <div class="link-login"><a href="index.php">게시물 작성</a></div>
            <div class="link-login"><a href="index.php">프로필</a></div>
            <div class="link-login"><a href="index.php">로그인</a></div>
    <?php endif; ?>
            
    <?php foreach($posts as $p) : ?>
        <div class="postBox">
            <div class="title">title: <?= $p->title ?></div>
            <div class="timestamp">timestamp: <?= $p->timestamp ?></div>
            <div class="btn"><a href="details.php?id=<?= $p->id ?>&userId=<?= $_GET['userId'] ?>&apid=<?= $id ?>">자세히보기</a></div>
            <div class="img"><img src="./postImg/<?= $p->id ?>.png" alt="titleImg"></div>
            <?php if(isset($_GET['userId'])) : ?>
                <div class="liked">
                    <button class="like" type="button" onclick="window.location.href='like.php?id=<?= $id ?>&userId=<?= $_GET['userId'] ?>'">좋아요</button>
                </div>
            <?php endif ?>
        </div>
    <?php endforeach;?>
</body>
    <script src="./like.js"></script>
</html>