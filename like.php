<?php
require_once 'DB.php';
session_start();

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$res_check = DB::fetch("SELECT * FROM like_manager WHERE like_post_id='id' and like_user='$user_id'");
if($res_check){
    echo "<script>alert('이미 공감한 게시글입니다!')";
    echo "window.history.back() </script>";
    exit;
}

$updateSql = DB::exec("UPDATE `post` SET `like`='like+1' WHERE id=$id");
$insertSql = DB::exec("INSERT INTO `like_manager`(`like_post_id`, `like_user`) VALUES ('$id','$user_id')");