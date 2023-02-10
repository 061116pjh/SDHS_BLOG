<?php
require_once 'DB.php';
$userId = $_POST['userId'];
$userPw = $_POST['userPw'];

$serchId = DB::fetch("SELECT * FROM `user` WHERE userId = '$userId'");
$serchPw = DB::fetch("SELECT * FROM `user` WHERE userId = '$userId' and userPw = '$userPw'");

if(!$serchId){
    return header('Location: index.php?err=id is not found');
}
if(!$serchPw){
    return header('Location: index.php?err=Incorrect password');
}

$id = $serchId->id;

header("Location: main.php?userId='$userId'&id='$id'");
die;