<?php // เปิดหัวประกาศคำสั่งphp
// Code สำหรับการเชื่อมต่อ DATA Base โดยมีชื่อถังจัดเก็บข้อมูลว่า dbinternship
$config = array( // สร้างตัวแปรเพื่อเก็บค่า config เพื่อนำไปใช้งาน mysqli โดยจัดเก็บข้อมูลให้อยู่ในรูปแบบ array
  "host"=>"127.0.0.1", 
  "user"=>"root",
  "pass"=>"",
  "dbname"=>"dbinternship",
  "charset"=>"utf8",
);

$con = new mysqli($config["host"], $config["user"], $config["pass"], $config["dbname"]); // สร้างตัวแปร con เพื่อเก็บค่า ฟังชั่น mysqli() โดยใช้ config ที่ได้รับการกำหนดค่าจาก $config
$con->set_charset($config["charset"]); // ฟังก์ชัน set_charset() คือกำหนดชุดตัวอักษรเริ่มต้นที่ระบุไว้เพื่อการถ่ายโอนข้อมูลไปยังเซิร์ฟเวอร์ฐานข้อมูล

if($con->connect_error) { // if คือเงื่อนไข ถ้าหากการทำ con แล้วมี log error จะทำให้เงื่อนไขนี้เป็นจริง true
  trigger_error("Database connect failed".$con->connect_error, E_USER_ERROR);
} else { // ถ้าหาก if คือเงื่อนไข ถ้าหากการทำ con แล้วมี log error จะทำให้เงื่อนไขนี้เป็นจริง นั้นไม่เป็นจริง false จะทำไห้เข้าเงื่อนไข else
  echo "Connected"; // echo คือคำสั่ง พิมพ์ Connected ในกรณีนี้ใช้สำหรับการ debug
}

?> //ปิดท้ายประกาศคำสั่งphp