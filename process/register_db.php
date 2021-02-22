<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php";

  $errors = array();

if(isset($_POST['reg'])){
  $data = array(
    "txt_id" => $_POST["txt_id"],
    "name_titles" => $_POST["name_titles"],
    "txt_fname" => $_POST["txt_fname"],
    "txt_lname" => $_POST["txt_lname"],
    "txt_mail" => $_POST["txt_mail"],
    "txt_tel" => $_POST["txt_tel"],
    "major" => $_POST["major"],
    "type" => "user",
    "course" => $_POST["course"],
    "txt_pwd" => $_POST["txt_pwd"],
    "txt_cpwd" => $_POST["txt_cpwd"]
  );
  if ($_POST["txt_fname"] == "") {
    $statusMsg = "โปรดระบุชื่อจริง";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  else if ($_POST["txt_lname"] == "") {
      $statusMsg = "โปรดระบุนามสกุล";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  else if ($_POST["txt_pwd"] == "") {
      $statusMsg = "โปรดระบุรหัสผ่าน!";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }
  else if ($_POST["txt_cpwd"] == "") {
    $statusMsg = "โปรดระบุรหัสผ่านยืนยัน!";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }

  else if ($_POST["txt_pwd"] != $_POST["txt_cpwd"]) {
    $statusMsg = "โปรดระบุรหัสผ่านและรหัสยืนยัน ให้ตรงกัน";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }

  if($_POST["txt_pwd"] != "" && $_POST["txt_cpwd"] != "" && ($_POST["txt_pwd"] == $_POST["txt_cpwd"])){
    echo "if";


    echo 'txtId >>>';
    echo $data['txt_id'];
        $user_check_query = "SELECT * FROM users WHERE id = $data[txt_id] "; // คำสั่งเชื่อมต่อฐานข้อมูล users โดยหา a_id ทีตรงกับ $data[txt_id]
        $query = mysqli_query($con, $user_check_query);
        $result = mysqli_fetch_assoc($query);
        print_r($result);
        

        if($result){
          echo ($result);
          if($result['id'] === $data['txt_id']){
            array_push($errors, "Username already exists or email");
            echo 'มี id นี้ในระบบแล้ว';
          }
          if($result['email'] === $data['txt_mail']){
              array_push($errors, "Username already exists or email");
            echo 'มี id นี้ในระบบแล้ว';
          }
        }

    if (count($errors) == 0) {
      echo 'error = 0';
      $sql =" INSERT INTO users (id, name_titles, f_name, l_name, email, major, tel, type, course, password)
      VALUES
      (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
      ";

      $qr = $con->prepare($sql);
      if($qr === false){
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
      }

    $qr->bind_param("ssssssssss", $data["txt_id"], $data["name_titles"], $data["txt_fname"], $data["txt_lname"], $data["txt_mail"], $data["major"],  $data["txt_tel"], $data["type"], $data["course"], $data["txt_pwd"]);
    $qr->execute();

  

    $statusMsg = "สมัครสมาชิกเรียบร้อย";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/index.php';</script>";

    $qr->close();
  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
    $statusMsg = "  รหัสนักศึกษานี้ถูกใช้ไปแล้ว กรุณาตรววจสอบอีกครั้ง";
      echo "else";
      echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/user/register.php';</script>";
  }
}
}else if(isset($_POST['regadmin'])){
  $data = array(
    "txt_id" => $_POST["txt_id"],
    "name_titles" => $_POST["name_titles"],
    "txt_fname" => $_POST["txt_fname"],
    "txt_lname" => $_POST["txt_lname"],
    "txt_mail" => $_POST["txt_mail"],
    "txt_tel" => $_POST["txt_tel"],
    "major" => $_POST["major"],
    "type" => 'admin',
    "txt_pwd" => $_POST["txt_pwd"],
    "txt_cpwd" => $_POST["txt_cpwd"]
  );
  if ($_POST["txt_fname"] == "") {
    $statusMsg = "โปรดระบุชื่อจริง";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  else if ($_POST["txt_lname"] == "") {
      $statusMsg = "โปรดระบุนามสกุล";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  else if ($_POST["txt_pwd"] == "") {
      $statusMsg = "โปรดระบุรหัสผ่าน!";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }
  else if ($_POST["txt_cpwd"] == "") {
    $statusMsg = "โปรดระบุรหัสผ่านยืนยัน!";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }

  else if ($_POST["txt_pwd"] != $_POST["txt_cpwd"]) {
    $statusMsg = "โปรดระบุรหัสผ่านและรหัสยืนยัน ให้ตรงกัน";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }

  if($_POST["txt_pwd"] != "" && $_POST["txt_cpwd"] != "" && ($_POST["txt_pwd"] == $_POST["txt_cpwd"])){
    echo "if";


    echo 'txtId >>>';
    echo $data['txt_id'];
        $user_check_query = "SELECT * FROM advisor WHERE a_id = $data[txt_id] "; // คำสั่งเชื่อมต่อฐานข้อมูล advisor โดยหา a_id ทีตรงกับ $data[txt_id]
        $query = mysqli_query($con, $user_check_query);
        $result = mysqli_fetch_assoc($query);
        print_r($result);
        

        if($result){
          echo ($result);
          if($result['a_id'] === $data['txt_id']){
            array_push($errors, "Username already exists or email");
            echo 'มี id นี้ในระบบแล้ว';
          }
          if($result['email'] === $data['txt_mail']){
              array_push($errors, "Username already exists or email");
            echo 'มี id นี้ในระบบแล้ว';
          }
        }
    
    if (count($errors) == 0) {
      echo 'error = 0';
      
      $sql =" INSERT INTO advisor (a_id, a_t_position, a_f_name, a_l_name, a_email, a_tel, a_major, a_type, a_password)
      VALUES
      (?, ?, ?, ?, ?, ?, ?, ?, ?)
      ";

      $qr = $con->prepare($sql);
      if($qr === false){
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
      }

    $qr->bind_param("sssssssss", $data["txt_id"], $data["name_titles"], $data["txt_fname"], $data["txt_lname"], $data["txt_mail"], $data["txt_tel"], $data["major"], $data["type"], $data["txt_pwd"]);
    $qr->execute();

  

    $statusMsg = "สมัครสมาชิกเรียบร้อย";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-admin.php';</script>";

    $qr->close();
  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
      $statusMsg = "รหัสนี้มีการใช้งานแล้ว";
      echo "else";
      echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-admin.php';</script>";
  }
}
}
  

?>