<?php
include "../configure/connect.php";
session_start();

echo "<pre>", print_r($_POST, true), "</pre>";
    
if ($_POST['update-status'] == 'pass') {
    echo "pass";
    $sql = "UPDATE users SET
    status = 1
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}


if ($_POST['update-status'] == 'false') {
    echo "false";
    $sql = "UPDATE users SET
    status = 0
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}


if ($_POST['update-status'] == 'onFix') {
    echo "onFix";
    $sql = "UPDATE users SET
    status = 4
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}
?>
