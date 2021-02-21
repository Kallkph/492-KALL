<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php";

  $errors = array();

if(isset($_POST['reg'])){
  $data = array(
    $txt_id = $_POST["txt_id"],
    $name_titles = $_POST["name_titles"],
    $txt_mail = $_POST["txt_mail"],
    $txt_tel = $_POST["txt_tel"],
    $major = $_POST["major"],
    $type = "user",
  );

  if($_POST){
    echo "if";
        
    if (count($errors) == 0) {
      $sql2 = "UPDATE users SET
      name_titles ='$name_titles',
      email ='$txt_mail',
      tel = '$txt_tel',
      major ='$major'
      WHERE id ='$txt_id' ";
      $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " );

    $statusMsg = "ผลการแก้ไขข้อมูลสำเร็จ";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/user/pageuser.php';</script>";

  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
      $statusMsg = "else";
      echo "else";
  }
}
}
  

?>