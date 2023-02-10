<?php 
$userId = $_GET['userId'];
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile_edit</title>
</head>
<body>
    <form action="profile-edit-handler.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="userId" value="<?= $userId ?>">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="userImg">이미지: </label>
        <input type="file" id="userImg" name="userImg">
        <input type="submit" value="완료">
    </form>
</body>
</html>