<?php
include "../configure/connect.php";
session_start();
  


if (isset($_POST['login_user'])) {
  $id = mysqli_real_escape_string($con, $_POST['txt_id']);
  $password = mysqli_real_escape_string($con, $_POST['txt_password']);

  if (empty($id)) {
    echo 'need id';
  }
  if (empty($password)) {
    echo 'need passwoed';
  }

    $query = "SELECT * FROM users WHERE id = '$id' AND password = '$password' "; // คำสั่งเชื่อมต่อฐานข้อมูล users โดยหา id ทีตรงกับ '$id' และ มี password ทีตรงกับ '$password'
    $result = mysqli_query($con, $query); // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
    $userdata = mysqli_fetch_assoc($result);

    


    if (mysqli_num_rows($result) == 1) {
      switch ($userdata['type']) {
        case 'user':
          $_SESSION['id'] = $id;
          $_SESSION['success'] = "Your are now login";
          print_r($userdata);
          $_SESSION['f_name'] = $userdata['f_name'];
          $_SESSION['l_name'] = $userdata['l_name'];
          $_SESSION['major'] = $userdata['major'];
          $_SESSION['type'] = $userdata['type'];
          $_SESSION['course'] = $userdata['course'];
          $_SESSION['status'] = $userdata['status'];

          if ($_SESSION['status'] == 0) {
            header("location: ../wedpage/user/infograde.php");
          } else {
            header("location: ../wedpage/user/checkstatus.php");
          }

          break;
  
        case 'admin':
          $_SESSION['success'] = "Your are now login";
          $_SESSION['id'] = $id;
          $_SESSION['f_name'] = $userdata['f_name'];
          $_SESSION['major'] = $userdata['major'];
          $_SESSION['type'] = $userdata['type'];
          header("location: ../wedpage/admin/adminpage.php");
          break;

      }
     
    } else {
      $statusMsg = "การเข้าสู่ระบบไม่สำเร็จ กรุณาตรวาจสอบ id และ password ของท่าน!";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
      header("location: ../wedpage/index.php");
    }

} else if (isset($_POST['login_admin'])) {
  $id = mysqli_real_escape_string($con, $_POST['txt_id']);
  $password = mysqli_real_escape_string($con, $_POST['txt_password']);

  if (empty($id)) {
    echo 'need id';
  }
  if (empty($password)) {
    echo 'need passwoed';
  }


    $query = "SELECT * FROM advisor WHERE a_id = '$id' AND a_password = '$password' "; // คำสั่งเชื่อมต่อฐานข้อมูล advisor โดยหา a_id ทีตรงกับ '$id' และ มี password ทีตรงกับ '$password'
    $result = mysqli_query($con, $query); // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
    $userdata = mysqli_fetch_assoc($result);

    


    if (mysqli_num_rows($result) == 1) {
          $_SESSION['success'] = "Your are now login";
          $_SESSION['id'] = $id;
          $_SESSION['f_name'] = $userdata['a_f_name'];
          $_SESSION['major'] = $userdata['a_major'];
          $_SESSION['type'] = $userdata['a_type'];
          header("location: ../wedpage/admin/adminpage.php");
    } else {
      $statusMsg = "การเข้าสู่ระบบไม่สำเร็จ กรุณาตรวาจสอบ id และ password ของท่าน!";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
      header("location: ../wedpage/index.php");
    }
}

?>