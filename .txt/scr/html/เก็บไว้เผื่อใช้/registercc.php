<?php
echo "<pre>", print_r($_POST, true), "</pre>";

include "../configure/connect.php"; // include คือการเรียกใช้ script จาก ../configure/connect.php

$errors = array();

if (isset($_POST['reg'])) {
  if ($_POST["txt_fname"] == "") {
    $statusMsg = "โปรดระบุชื่อจริง";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } else if ($_POST["txt_lname"] == "") {
    $statusMsg = "โปรดระบุนามสกุล";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }
  // else if (!filter_var($_POST["txt_mail"], FILTER_VALIDATE_EMAIL)) {
  //     $statusMsg = "โปรดใช้อีเมลอื่น อีเมล์นี้มีผู้ใช้แล้ว!";
  //     echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
  else if ($_POST["txt_pwd"] == "") {
    $statusMsg = "โปรดระบุรหัสผ่าน!";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } else if ($_POST["txt_cpwd"] == "") {
    $statusMsg = "โปรดระบุรหัสผ่านยืนยัน!";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>"; // ทำการ router ไปที่ .../register.php
  } else if ($_POST["txt_pwd"] != $_POST["txt_cpwd"]) {
    $statusMsg = "โปรดระบุรหัสผ่านและรหัสยืนยัน ให้ตรงกัน"; 
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>"; // ทำการ router ไปที่ .../register.php
  }

  if ($_POST["txt_pwd"] != "" && $_POST["txt_cpwd"] != "" && ($_POST["txt_pwd"] == $_POST["txt_cpwd"])) {
    echo "if";
    $user_check_query = "SELECT * FROM users WHERE s_id = 'txt_id' "; // คำสั่งเชื่อมต่อฐานข้อมูล users โดยหา s_id ทีตรงกับ 'txt_id'
    $query = mysqli_query($con, $user_check_query);
    $result = mysqli_fetch_assoc($query);
    // echo('qwe');4
    echo ($result);
    print_r($result);
    if ($result) {
      $statusMsg = "โปรดระบุรหัสผ่านและรหัสยืนยัน ให้ตรงกัน";
      echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>"; // ทำการ router ไปที่ .../register.php
      print_r($errors);
      echo ('if (have result(มีอยู่แล้ว))');
      array_push($errors, "Username already exists");
    }
    print_r($errors);
    if (count($errors) == 0) { // เงื่อนไข if ถ้า $errors มีค่าเท่ากับ 0 จะทำให้เงื่อนไขนี้เป็นจริง true
      $data = array( // สร้างตัวแปรเพื่อเก็บค่า ต่างๆหลัง () เพื่อนำไปใช้งาน โดยจัดเก็บข้อมูลให้อยู่ในรูปแบบ array
        "txt_id" => $_POST["txt_id"],
        "txt_fname" => $_POST["txt_fname"],
        "txt_lname" => $_POST["txt_lname"],
        "txt_mail" => $_POST["txt_mail"],
        "txt_pwd" => $_POST["txt_pwd"],
        "txt_cpwd" => $_POST["txt_cpwd"]
      );
      $sql = " INSERT INTO users (s_id, s_fname, s_lname, s_email, s_password)
    VALUES
    (?, ?, ?, ?, ?)
    ";
      $qr = $con->prepare($sql);
      if ($qr === false) {
        trigger_error("Wrong SQL : " . $sql . "Error :" . $son->erro, E_USER_ERROR);
      }
      $qr->bind_param("sssss", $data["txt_id"], $data["txt_fname"], $data["txt_lname"], $data["txt_mail"], $data["txt_pwd"]);
      $qr->execute();
      // echo 5
      // $statusMsg = "สมัครสมาชิกเรียบร้อย";
      // echo "<script type='text/javascript'>alert('$statusMsg');window.location ='HTMLPage1.php';</script>";
      $qr->close();
    } else {
      print_r($errors);
      $statusMsg = "else";
      echo "else";
      // echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
    }
  }
}
