<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php";

  $errors = array();

if(isset($_POST['reg'])){
  $data = array(
    $c_name = $_POST["txtc_name"],
    $c_address = $_POST["txtc_address"],
    $c_detail = $_POST["txtc_detail"],
    $c_tel = $_POST["txtc_tel"],
    $c_id = $_POST["txtc_id"],
  );

  if($_POST){
    echo "if";
        
    if (count($errors) == 0) {
      $sql2 = "UPDATE company SET
      c_name ='$c_name',
      c_address ='$c_address',
      c_detail = '$c_detail',
      c_tel = '$c_tel'
      WHERE c_id ='$c_id' ";
      $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());

    $statusMsg = "ผลการแก้ไขข้อมูลสำเร็จ";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-companay.php';</script>";

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