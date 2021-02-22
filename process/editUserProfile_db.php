<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php"; // include คือการเรียกใช้ script จาก ../configure/connect.php

  $errors = array();

if(isset($_POST['reg'])){ // เงื่อนไข if ถ้า $_POST['reg'] มีค่า จะทำให้เงื่อนไขนี้เป็นจริง true
  $data = array( // สร้างตัวแปรเพื่อเก็บค่า ต่างๆหลัง () เพื่อนำไปใช้งาน โดยจัดเก็บข้อมูลให้อยู่ในรูปแบบ array
    $txt_id = $_POST["txt_id"],
    $name_titles = $_POST["name_titles"],
    $txt_fname = $_POST["txt_fname"],
    $txt_lname = $_POST["txt_lname"],
    $txt_mail = $_POST["txt_mail"],
    $txt_tel = $_POST["txt_tel"],
    $major = $_POST["major"],
    $type = "user",
    $course = $_POST["course"],
  );
  if ($_POST["txt_fname"] == "") {
    $statusMsg = "โปรดระบุชื่อจริง";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  else if ($_POST["txt_lname"] == "") {
      $statusMsg = "โปรดระบุนามสกุล";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 

  if($_POST){
    echo "if";
        
    if (count($errors) == 0) { // เงื่อนไข if ถ้า $errors มีค่าเท่ากับ 0 จะทำให้เงื่อนไขนี้เป็นจริง true
      $sql2 = "UPDATE users SET คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
      name_titles ='$name_titles',
      f_name ='$txt_fname',
      l_name ='$txt_lname',
      email ='$txt_mail',
      tel = '$txt_tel',
      major ='$major'
      WHERE id ='$txt_id' ";
      $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " );

    $statusMsg = "ผลการแก้ไขข้อมูลสำเร็จ";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-users.php';</script>";  // ทำการ router ไปที่ .../adminpage-users.php

  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
      $statusMsg = "else";
      echo "else";
    }
  }
} else if(isset($_POST['regAdmin'])){
  $data = array( // สร้างตัวแปรเพื่อเก็บค่า ต่างๆหลัง () เพื่อนำไปใช้งาน โดยจัดเก็บข้อมูลให้อยู่ในรูปแบบ array
    $txt_id = $_POST["txt_id"],
    $name_titles = $_POST["name_titles"],
    $txt_fname = $_POST["txt_fname"],
    $txt_lname = $_POST["txt_lname"],
    $txt_mail = $_POST["txt_mail"],
    $txt_tel = $_POST["txt_tel"],
    $major = $_POST["major"],
    $type = "user",
    $txt_pwd = $_POST["password"],
  );
  if ($_POST["txt_fname"] == "") {
    $statusMsg = "โปรดระบุชื่อจริง";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  else if ($_POST["txt_lname"] == "") {
      $statusMsg = "โปรดระบุนามสกุล";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 

  if($_POST){
    echo "if";
        
    if (count($errors) == 0) { // เงื่อนไข if ถ้า $errors มีค่าเท่ากับ 0 จะทำให้เงื่อนไขนี้เป็นจริง true
      $sql2 = "UPDATE advisor SET คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
      a_t_position ='$name_titles',
      a_f_name ='$txt_fname',
      a_l_name ='$txt_lname',
      a_email ='$txt_mail',
      a_tel = '$txt_tel',
      a_major ='$major',
      a_password ='$txt_pwd'
      WHERE a_id ='$txt_id' ";
      $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " );

    $statusMsg = "ผลการแก้ไขข้อมูลสำเร็จ";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-users.php';</script>"; // ทำการ router ไปที่ .../adminpage-users.php

  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
      $statusMsg = "else";
      echo "else";
    }
  }
}
  

?>