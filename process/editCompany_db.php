<?php  // เปิดหัวประกาศคำสั่งphp
  session_start(); // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
  echo "<pre>", print_r($_POST, true), "</pre>";
  include "../configure/connect.php"; // include คือการเรียกใช้ script จาก ../configure/connect.php
  $errors = array(); // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
if(isset($_POST['reg'])){
  $data = array( // สร้างตัวแปรเพื่อเก็บค่า ต่างๆหลัง () เพื่อนำไปใช้งาน โดยจัดเก็บข้อมูลให้อยู่ในรูปแบบ array
    $c_name = $_POST["txtc_name"],
    $c_address = $_POST["txtc_address"],
    $c_detail = $_POST["txtc_detail"],
    $c_tel = $_POST["txtc_tel"],
    $c_id = $_POST["txtc_id"],
  );
  if($_POST){
    echo "if";
    if (count($errors) == 0) {
      $sql2 = "UPDATE company SET คำสั่ง sql ใช้กำหนดสำหรับเพิ่มค่าในฐานข้อมูลหากไม่มีหรือมีค่าเดิมอยู่ให้ทำการ update ค่าเดิม
      c_name ='$c_name',
      c_address ='$c_address',
      c_detail = '$c_detail',
      c_tel = '$c_tel'
      WHERE c_id ='$c_id' ";
      $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " );
    $statusMsg = "ผลการแก้ไขข้อมูลสำเร็จ";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-companay.php';</script>";
    } else if((!count($errors) == 0)){
      echo $errors;
      print_r($errors);
        $statusMsg = "else";
        echo "else";
    }
  }
}
?>