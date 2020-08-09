<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php";

  $errors = array();

if(isset($_POST['reg'])){
  $data = array(
    $txt_id = $_POST["txt_id"],
    $name_titles = $_POST["name_titles"],
    $txt_fname = $_POST["txt_fname"],
    $txt_lname = $_POST["txt_lname"],
    $txt_mail = $_POST["txt_mail"],
    $txt_tel = $_POST["txt_tel"],
    $major = $_POST["major"],
    $type = "user",
    $course = $_POST["course"],
    // "txt_pwd" => $_POST["txt_pwd"],
    // "txt_cpwd" => $_POST["txt_cpwd"]
  );
  if ($_POST["txt_fname"] == "") {
    $statusMsg = "โปรดระบุชื่อจริง";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  else if ($_POST["txt_lname"] == "") {
      $statusMsg = "โปรดระบุนามสกุล";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  // else if ($_POST["txt_pwd"] == "") {
  //     $statusMsg = "โปรดระบุรหัสผ่าน!";
  //     echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  // }
  // else if ($_POST["txt_cpwd"] == "") {
  //   $statusMsg = "โปรดระบุรหัสผ่านยืนยัน!";
  //   echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  // }

  // else if ($_POST["txt_pwd"] != $_POST["txt_cpwd"]) {
  //   $statusMsg = "โปรดระบุรหัสผ่านและรหัสยืนยัน ให้ตรงกัน";
  //   echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  // }

  if($_POST){
    echo "if";


    // echo 'txtId >>>';
    // echo $data['txt_id'];
    //     $user_check_query = "SELECT * FROM users WHERE id = $data[txt_id] ";
    //     $query = mysqli_query($con, $user_check_query);
    //     $result = mysqli_fetch_assoc($query);
    //     // echo('qwe');4
       
    //     print_r($result);
        

        // if($result){
        //   echo ($result);
        //   if($result['id'] === $data['txt_id']){
        //     array_push($errors, "Username already exists or email");
        //     echo 'มี id นี้ในระบบแล้ว';
        //   }
        //   if($result['email'] === $data['txt_mail']){
        //       array_push($errors, "Username already exists or email");
        //     echo 'มี id นี้ในระบบแล้ว';
        //   }
        //   // $statusMsg = "โปรดระบุรหัสผ่านและรหัสยืนยัน ให้ตรงกัน";
        //   // echo "<script type='text/javascript'>alert('$statusMsg')";
        //   // print_r($errors);
        //   //   echo ('if (have result(มีอยู่แล้ว))');
        //   //   array_push($errors, "Username already exists");
        // }

        // print_r($errors);
        
    if (count($errors) == 0) {
      $sql2 = "UPDATE users SET
      name_titles ='$name_titles',
      f_name ='$txt_fname',
      l_name ='$txt_lname',
      email ='$txt_mail',
      tel = '$txt_tel',
      major ='$major'
      WHERE id ='$txt_id' ";
      $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());

    $statusMsg = "ผลการแก้ไขข้อมูลสำเร็จ";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-users.php';</script>";

    // $qr->close();
  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
      $statusMsg = "else";
      echo "else";
      // echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
  }
}
}
  

?>