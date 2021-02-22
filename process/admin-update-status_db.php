<?php
include "../configure/connect.php";
session_start();
echo "<pre>", print_r($_POST, true), "</pre>";
if ($_POST['update-status'] == 'pass') { // if คือเงื่อนไข ถ้าหาก $_POST['update-status'] มีค่าเท่ากับ 'pass' จะทำให้เงื่อนไขนี้เป็นจริง true
    echo "pass";
    $sql = "UPDATE users SET // คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
    status = 1
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " );  // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
    if ($_SESSION['major'] != "0") { // if คือเงื่อนไข ถ้าหาก $_SESSION['major'] มีค่าไม่เท่ากับ "0" จะทำให้เงื่อนไขนี้เป็นจริง true
        $sql2 = "UPDATE requestcompany SET // คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
        r_advisor = $_SESSION[id]
        WHERE r_sid = $_POST[id] ";
        $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " ); // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result2 
    }
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}
if ($_POST['update-status'] == 'false') { // if คือเงื่อนไข ถ้าหาก $_POST['update-status'] มีค่าเท่ากับ false จะทำให้เงื่อนไขนี้เป็นจริง true
    echo "false";
    $sql = "UPDATE users SET คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
    status = 0
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " ); // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . ""); 
}
if ($_POST['update-status'] == 'onFixg') { // if คือเงื่อนไข ถ้าหาก $_POST['update-status'] มีค่าเท่ากับ 'onFixg' จะทำให้เงื่อนไขนี้เป็นจริง true
    echo "onFix";
    $sql = "UPDATE users SET คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
    status = 4
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " ); // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}
if ($_POST['update-status'] == 'onFixc') { // if คือเงื่อนไข ถ้าหาก $_POST['update-status'] มีค่าเท่ากับ 'onFixg' จะทำให้เงื่อนไขนี้เป็นจริง true
    echo "onFix";
    $sql = "UPDATE users SET คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
    status = 5
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " ); // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}
if ($_POST['update-status'] == 'print1') { // if คือเงื่อนไข ถ้าหาก $_POST['update-status'] มีค่าเท่ากับ 'print1' จะทำให้เงื่อนไขนี้เป็นจริง true
    echo "onFix";
    $sql = "UPDATE users SET คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
    status = 8
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " ); // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}
if ($_POST['update-status'] == 'print2') { // if คือเงื่อนไข ถ้าหาก $_POST['update-status'] มีค่าเท่ากับ 'print2' จะทำให้เงื่อนไขนี้เป็นจริง true
    echo "onFix";
    $sql = "UPDATE users SET คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
    status = 9
    WHERE id = $_POST[id] ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " ); // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
    header("location: ../wedpage/admin/adminpage-read.php?id=" . $_POST['id'] . "");
}
