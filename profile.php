<?php
require_once 'DB.php';
$userId = preg_replace("/[\"\']/i", "", $_GET['userId']);
$id = $_GET['id'];
$posts = DB::fetchAll("SELECT * FROM `post` WHERE userId = $id");
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
    <?php if(isset($userId)) : ?>
        <div class="login-profile">
            <?= $userId ?>
            <img src="./userImg/<?= $userId ?>.png" alt="profileImg">
            <div class="profile-edit"><a href="profile-edit.php?userId=<?= $userId ?>&id=<?= $id ?>">프로필 편집</a></div>
            <div class="link-created"><a href="created.php?userId=<?= $userId ?>&id=<?= $_GET['id'] ?>">게시물 작성</a></div>
        </div>
        <?php foreach($posts as $p) : ?>
            <div class="post">
                <div class="title">title: <?= $p->title ?></div>
                <div class="timestamp">timestamp: <?= $p->timestamp ?></div>
                <div class="btn"><a href="details.php?id=<?= $p->id ?>&userId=<?= $userId ?>&apid=<?= $p->userId ?>">자세히보기</a></div>
                <div class="img"><img src="./postImg/<?= $p->id ?>.png" alt="titleImg"></div>
            </div>
        <?php endforeach; ?>
    <?php endif ?>
    <?php if(!isset($userId)||$userId=="") : ?>
        <div class="logout-profile">
            <h3>로그인 후 이용해주세요</h3>
            <a href="index.php">login</a>
        </div>
    <?php endif ?>
    <div class="link-main"><a href="main.php?userId=<?= $userId ?>&id=<?= $id ?>">메인화면으로 돌아가기</a></div>
</body>
</html>