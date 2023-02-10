<?php 
    $userId = $_POST['userId'];
    $id = $_POST['id'];

    session_start();
    
    $updateFile = "./userImg/$userId.png";
    move_uploaded_file($_FILES['userImg']['tmp_name'], $updateFile);
    header("Location: profile.php?userId=$userId&id=$id");