<?php
require_once 'DB.php';
$title = $_POST['title'];
$content = $_POST['content'];
$userId = $_POST['id'];
$user = preg_replace("/[\"\']/i", "", $_POST['userId']);
$sql = DB::exec("INSERT INTO `post`(`title`, `content`, `userId`) VALUES ('$title','$content', '$userId')");
$postId = DB::lastInsertId();
$img = $_FILES['img']['name'];
$savingFile = "./postImg/$postId.png";
move_uploaded_file($_FILES['img']['tmp_name'], $savingFile);

header("Location: main.php?userId='$user'&id=$userId"); 
die;