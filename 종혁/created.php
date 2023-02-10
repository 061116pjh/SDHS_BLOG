<?php 
if(!isset($_GET['userId'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>created</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="created.handler.php" method="post" enctype="multipart/form-data">
        <label for="title">제목: </label>
        <input type="text" id="title" name="title" required autofocus>

        <label for="content">내용: </label>
        <textarea name="content" id="content" cols="30" rows="10" required></textarea>

        <label for="img">이미지: </label>
        <input type="file" id="img" name="img">

        <input type="hidden" name="id" value="<?=$_GET['id'] ?>">
        <input type="hidden" name="userId" value="<?=$_GET['userId'] ?>">

        <input type="submit" value="create">
    </form>
    <div class="link-main"><a href="main.php?userId=<?= $_GET['userId']?>&id=<?= $_GET['id'] ?>">메인으로 이동하기</a></div>
</body>
</html>