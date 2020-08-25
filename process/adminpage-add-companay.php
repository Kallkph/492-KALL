<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php";

  $errors = array();

if(isset($_POST['reg'])){
  $data = array(
    "c_name" => $_POST["txtc_name"],
    "c_address" => $_POST["txtc_address"],
    "c_detail" => $_POST["txtc_detail"],
    "c_tel" => $_POST["txtc_tel"],
  );
    
    if (count($errors) == 0) {
      echo 'error = 0';
      $sql =" INSERT INTO company (c_id, c_name, c_address, c_detail, c_tel) 	
      VALUES
      (?, ? ,? , ?, ?)
      ";

      $qr = $con->prepare($sql);
      if($qr === false){
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
      }


      $uuid = generateRandomString(); 

    $qr->bind_param("sssss",$uuid , $data["c_name"], $data["c_address"], $data["c_detail"], $data["c_tel"]);
    $qr->execute();

  

    $statusMsg = "เพิ่มข้อมูลเรียบร้อย";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-companay.php';</script>";

    $qr->close();
  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
      $statusMsg = "else";
      echo "else";
      // echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
  }
}
  
// echo ;

function generateRandomString($length = 8) {
  $characters = '0123456789';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
?>


