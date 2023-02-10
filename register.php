<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/register.css">
</head>
<body>
    <?php if(isset($_GET['err'])) : ?>
        <div><?= $_GET['err']; ?></div>
    <?php endif; ?>
    <form action="register.handler.php" method="post" enctype="multipart/form-data">
        <label for="userId">Id: </label>
        <input type="text" id="userId" name="userId" required autofocus>

        <label for="userPw">Password: </label>
        <input type="password" id="userPw" name="userPw" required>

        <label for="confirm">Confirm: </label>
        <input type="password" id="confirm" name="confirm" required>

        <label for="userImg">Img</label>
        <input type="file" id="userImg" name="userImg">

        <img src="captcha.php" alt="captcha">
        <label for="captcha">이미지의 글자를 입력하세요.</label>
        <input type="text" id="captcha" name="captcha" require>
        <input type="submit" value="회원가입">
    </form>
</body>
<script src="./captcha.js"></script>
</html>