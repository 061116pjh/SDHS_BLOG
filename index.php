<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./style/index.css">
</head>
<body>
    <?php if(isset($_GET['err'])) : ?>
        <div><?= $_GET['err'] ?></div>
    <?php endif; ?>
    <form action="login.handeler.php" method="post">
        <label for="userId">id: </label>
        <input type="text" id="userId" name="userId" required autofocus>

        <label for="userPw">password: </label>
        <input type="password" id="userPw" name="userPw" required>

        <input type="submit" value="login">
    </form>
        <div class="link-register"><a href="register.php">join</a></div>
</body>
</html>