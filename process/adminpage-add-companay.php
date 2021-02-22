<?php // เปิดหัวประกาศคำสั่งphp
  session_start(); // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
  echo "<pre>", print_r($_POST, true), "</pre>"; 
  include "../configure/connect.php"; // include คือการเรียกใช้ script จาก ../configure/connect.php
  $errors = array();
if(isset($_POST['reg'])){ // เงื่อนไข if ถ้า $_POST['reg'] มีค่า จะทำให้เงื่อนไขนี้เป็นจริง true
  $data = array( // สร้างตัวแปรเพื่อเก็บค่า ต่างๆหลัง () เพื่อนำไปใช้งาน โดยจัดเก็บข้อมูลให้อยู่ในรูปแบบ array
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
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-companay.php';</script>"; // ทำการ router ไปที่ .../adminpage-companay.php
    $qr->close();
  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
      $statusMsg = "else";
      echo "else";
  }
}
function generateRandomString($length = 8) {
  $characters = '0123456789';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
