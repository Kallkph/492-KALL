<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php"; // include คือการเรียกใช้ script จาก ../configure/connect.php

  $errors = array();

if(isset($_POST['reg'])){ // เงื่อนไข if ถ้า $_POST['reg'] มีค่า จะทำให้เงื่อนไขนี้เป็นจริง true
  $data = array( // สร้างตัวแปรเพื่อเก็บค่า ต่างๆหลัง () เพื่อนำไปใช้งาน โดยจัดเก็บข้อมูลให้อยู่ในรูปแบบ array
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
      $sql2 = "UPDATE users SET คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
      name_titles ='$name_titles',
      email ='$txt_mail',
      tel = '$txt_tel',
      major ='$major'
      WHERE id ='$txt_id' ";
      $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " );

    $statusMsg = "ผลการแก้ไขข้อมูลสำเร็จ"; 
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/user/pageuser.php';</script>"; // ทำการ router ไปที่ .../pageuser.php

  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
      $statusMsg = "else";
      echo "else";
  }
}
}
  

?>