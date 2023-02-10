<?php
require_once 'DB.php';

$id = $_GET['id'];
$userId = $_GET['userId'];
$apid = $_GET['apid'];

$php = DB::exec("DELETE FROM `post` WHERE id=$id");

header("Location: main.php?userId=$userId&id=$apid");
die;