<?php
include "../configure/connect.php";
session_start();

echo "<pre>", print_r($_POST, true), "</pre>";
    
if ($_POST['update-status'] == 'pass') {
    echo "pass";
    $sql = "UPDATE users SET
    status = 1
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " );
    if ($_SESSION['major'] != "0") {
        $sql2 = "UPDATE requestcompany SET
        r_advisor = $_SESSION[id]
        WHERE r_sid = $_POST[id] ";
        $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " );
    }
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");

}


if ($_POST['update-status'] == 'false') {
    echo "false";
    $sql = "UPDATE users SET
    status = 0
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " );
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . ""); 
}


if ($_POST['update-status'] == 'onFixg') {
    echo "onFix";
    $sql = "UPDATE users SET
    status = 4
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " );
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}

if ($_POST['update-status'] == 'onFixc') {
    echo "onFix";
    $sql = "UPDATE users SET
    status = 5
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " );
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}

if ($_POST['update-status'] == 'print1') {
    echo "onFix";
    $sql = "UPDATE users SET
    status = 8
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " );
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}

if ($_POST['update-status'] == 'print2') {
    echo "onFix";
    $sql = "UPDATE users SET
    status = 9
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " );
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}

?>
