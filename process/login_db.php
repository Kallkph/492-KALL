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

  // if (count($errors == 0)) {

    $query = "SELECT * FROM users WHERE id = '$id' AND password = '$password' ";
    $result = mysqli_query($con, $query);
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
          $_SESSION['status'] = $userdata['status'];

          if ($_SESSION['status'] == 0) {
            header("location: ../wedpage/user/infograde.php");
          } else {
            header("location: ../wedpage/user/checkstatus.php");
          }

          break;
  
        case 'admin':
          $_SESSION['success'] = "Your are now login";
          $_SESSION['f_name'] = $userdata['f_name'];
          $_SESSION['major'] = $userdata['major'];
          header("location: ../wedpage/admin/adminpage.php");
          break;

      }
        // case label3:
        //   code to be executed if n=label3;
        //   break;
     
    } else {
      $statusMsg = "การเข้าสู่ระบบไม่สำเร็จ กรุณาตรวาจสอบ id และ password ของท่าน!";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
      header("location: ../wedpage/index.php");
    }

  // }
}

?>