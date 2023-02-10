<?php
require 'DB.php';


$userId = $_POST['userId'];
$userPw = $_POST['userPw'];
$confirm = $_POST['confirm'];
$captcha = $_POST['captcha'];

session_start();
$fetch = DB::fetch("SELECT * FROM `user` WHERE `userId` = '$userId'");

if($fetch){
    return header("Location: register.php?err=need a unique userid");
}
if($userPw !== $confirm){
    return header("Location: register.php?err=invalid credentials");
}
if($_SESSION['capt'] !== $captcha){
    return header("Location: register.php?err=captcha err");
}

$savingFile = "./userImg/$userId.png";
move_uploaded_file($_FILES['userImg']['tmp_name'], $savingFile);

$insert = DB::exec("INSERT INTO `user`(`userId`, `userPw`) VALUES ('$userId','$userPw')");
header("Location: index.php");