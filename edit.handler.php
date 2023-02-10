<?php 
require_once 'DB.php';
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$timestamp = $_POST['timestamp'];
$userId = $_POST['userId'];
$apid = $_POST['apid'];

$sql = DB::exec("UPDATE `post` SET `title`='$title',`content`='$content' where id='$id'");
header("Location: main.php?id=$id&userId=$userId");
die;