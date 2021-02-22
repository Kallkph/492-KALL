<?php // เปิดหัวประกาศคำสั่งphp
session_start(); // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
include('../configure/connect.php'); // include คือการเรียกใช้ script จาก ../configure/connect.php
if (!isset($_SESSION['id'])) { // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
  $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!"; // การเก็บค่าไวใน _SESSION ในตัวแปล msg
}
if (isset($_GET['logout'])) { // เงื่อนไข if ถ้า มี $_GET['logout'] จะทำให้เงื่อนไขนี้เป็นจริง true
  session_destroy(); // คำสั่งการยกเลิกข้อมูลทั้งหมดที่อยู่ใน session
  unset($_SESSION['id']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่าใดๆ
  header('location: index.php'); // การ route ไปยัง index.php
}
$sql = "SELECT * From company"; // คำสั่งเชื่อมต่อฐานข้อมูล company โดยเก็บในตัวแปล $sql
$result = mysqli_query($con, $sql) or die("Error in query: $sql "); // ผลการเชื่อมต่อฐานข้อมูลโดยใช้คำสั่ง mysqli_query() $result 
?> //ปิดท้ายประกาศคำสั่งphp
<html lang="th"> //กำหนดภาษาของหน้าเว็บไซต์
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> //กำหนด stylesheet css ของหน้าเว็บไซต์
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> //การเรียกใช้งาน jquery ของหน้าเว็บไซต์
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> //การเรียกใช้งาน script popper ของหน้าเว็บไซต์
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> //การเรียกใช้งาน script bootstrap ของหน้าเว็บไซต์
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> //การเรียกใช้งาน jquery ของหน้าเว็บไซต์
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> //การเรียกใช้งาน jquery ของหน้าเว็บไซต์
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์
<script src="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์

<head> // เปิดการกำหนดคำสั่งต่างในส่วนhead
  <meta charset="utf-8" /> // กำหนดรูปแบบภาษาไทย
  <title> ระบบฐานข้อมูลนักศึกษาฝึกงาน </title> // ชื่อที่แสดงส่วนบนหัวเว็บไซต์
  <link rel="stylesheet" href="../scr/css/styles.css"> // การเรียกใช้ stylesheet css ของหน้าเว็บไซต์
</head> // ปิดการกำหนดคำสั่งต่างในส่วนhead

<body> // คำสั่งที่บอกส่วนเนื้อเรื่องบนหน้าเว็บไซต์
  <div class="container"> // คำสั่ง bootstrap container
    <img src="../scr/img/Banner.png" width="100%"> // กำหนดขนาดความกว้างของรูปภาพที่นำมาโชว์และให้ภาพนี้แสดงมาจาก ../scr/img/Banner.png
    <div id="mainlink"> // เปิดการกำหนด div mainlink
      <nav class="navbar navbar-expand-lg navbar-light bg-light"> // คำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> // คำสั่งเปิดปุ่ม bootstrap เรียกใช้ class ชื่อ navbar-toggler
          <span class="navbar-toggler-icon"></span> // คำสั่ง bootstrap เรียกใช้ controls ชื่อ navbarNavAltMarkup
        </button> // คำสั่ง bootstrap แสดงรูป navbar-toggler-icon
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> // ปิดคำสั่งปุ่ม bootstrap
          <div class="container"> // คำสั่ง bootstrap container
            <div class="navbar-nav"> // คำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
              <a class="nav-item nav-link" href="afterindex.php">หน้าหลัก</a> // คำสั่ง bootstrap ชื่อ nav-link
              <a class="nav-item nav-link" href="Company.php">สถานประกอบการ</a> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ user/Company.php
              <a class="nav-item nav-link" href="#">ข่าวสาร</a> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ user/news.php
              <a class="nav-item nav-link" href="Fac.html">ติดต่อเรา</a> // คำสั่ง bootstrap ชื่อ nav-link
              <?php if (isset($_SESSION['success'])) : ?> // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
                <a class="nav-item nav-link" href="user/request-company.php">ยื่นเรื่องฝึกงาน</a> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ /wedpage/user/register.php
                <a class="nav-item nav-link" href="index.php?logout='1'">ออกจากระบบ</a> // เงื่อนไข if ถ้า มี isset($_SESSION['id'] จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
              <?php endif ?> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ user/checkstatus.php
            </div> // คำสั่ง bootstrap ชื่อ nav-link และส่งค่า logout เท่ากับ 1
          </div> // ปิดคำสั่ง php ใน tag html
        </div> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
      </nav> // ปิดคำสั่ง bootstrap container
    </div> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ collapse navbar-collapse
    <div class="row"> // คำสั่งการแบ่งแถวของหน้าเว็บ
      <div class="leftcolumn"> // คำสั่งการแบ่งคอลัมน์ของหน้าเว็บ
        <?php if (!isset($_SESSION['success'])) : ?> // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้าไม่มี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้เป็นจริง true
          <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
            <form action="login_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/login_db.php
              <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="id"> textbox สำหรับใส่รหัสประจำตัวของผู้ใช้เช่น รหัสนักศึกษา, รหัสอาจารย์
              <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password"> textbox สำหรับกรอก password
              <dev class="card1leftcolumn">
                <button type="submit" class="btn btn-primary" name="login_user">Login</button> // ปุ่มเข้าสู่ระบบ
              </dev> // ปิดคำสั่ง css โดยใช้ class ชื่อ card1leftcolumn
            </form> // ปิดคำสั่งการส่งข้อมูล
          </div> // ปิดคำสั่ง css โดยใช้ class ชื่อ card1
        <?php else :; ?> // ถ้าเงื่อนไข if ถ้ามี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
          <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
            <a href="pageuser.php"> // คำสั่ง route จากรูปภาพไปที่ user/pageuser.php
              <img src="../scr/img/profile.jpg" width="50%"> // กำหนดขนาดความกว้างของรูปภาพที่นำมาโชว์และให้ภาพนี้แสดงมาจาก ../scr/img/profile.jpg
            </a>
            รหัสนักศึกษา
            <p><?php echo $_SESSION['id']; ?></p> // พิมพ์ _SESSION['id']
            ชื่อ
            <p><?php echo $_SESSION['f_name'], ' ', $_SESSION['l_name']; ?></p>
            สาขา
            <p><?php echo $_SESSION['major']; ?></p> // พิมพ์ $_SESSION['major']
          </div> // ปิดคำสั่ง css โดยใช้ class ชื่อ card3
        <?php endif ?> // ปิดคำสั่ง else
        <div class="card3"> // เปิดคำสั่ง css โดยใช้ class ชื่อ card3
          <!DOCTYPE html>
          <p id="top">Link Download เอกสารต่างๆ </p>
          <ul>
            <li><a href="เอกสารแนะนำสถานที่ฝึกงาน.doc">เอกสารแนะนำสถานที่ฝึกงาน</a></li> // ลิ้งค์ Download จาก เอกสารแนะนำสถานที่ฝึกงาน.doc
            <li><a href="รายงานประจำสัปดาห์.doc">รายงานประจำสัปดาห์</a></li> // ลิ้งค์ Download จาก รายงานประจำสัปดาห์.doc
            <li><a href="แบบประเมินผลฝึกงาน.doc">แบบประเมินผลฝึกงาน</a></li> // ลิ้งค์ Download จาก แบบประเมินผลฝึกงาน.doc
          </ul>
          <p>ติดต่อเรา..</p>

          <div class="fakeimg" style="height:200px;"></div> คำสั่ง css ทำให้มีพื้นที่สูง 200px
        </div>
      </div>// ปิดคำสั่งการแบ่งคอลัมน์ของหน้าเว็บ
      <div class="rightcolumn"> // คำสั่ง css โดยใช้ class ชื่อ rightcolumn
        <div class="card2" style="height:auto;"> // คำสั่ง css โดยใช้ class ชื่อ card2_index
          <div class="row row-cols-1 row-cols-md-3"> คำสั่ง bootstrap เรียกใช้ class ชื่อ carousel slide โดยมี id carouselExampleIndicators
          </div>
          <table class="table" id="table_row" width="800px" style="margin-top:30px;">
            <thead class="thead-dark">
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <tr>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <th scope="col" style="width:300px;">ชื่อ</th>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <th scope="col" style="width:60px;"></th>
                </ol>
                <th scope="col" style="width:280px;">ที่อยู่</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_assoc()) {  // คำสั่งการ loop ค่าในตัวแปล $result ด้วยคำสั่ง fetch_assoc() แล้วนำค่าที่ได้ index นั่นๆเก็บลง $row 
                echo "<tr>";
                echo "<td>" . $row['c_name'] . "</td>"; // echo คือคำสั่ง พิมพ์ $row['c_name']
                echo "<td>" . "</td>";
                echo "<td>" . $row['c_address'] . "</td>"; // echo คือคำสั่ง พิมพ์ $row['c_address']
                echo "<td>";
                echo "<a href='user/viewCompanay.php?id=" . $row['c_id'] . "' title='View' class='btn btn-link'>ดูข้อมูล</a>";   // echo คือคำสั่ง พิมพ์  $row['c_id']
                "</td>";
                "</tr>";
              } ?>
            </tbody>
          </table>
        </div> // ปิดคำสั่ง css
      </div>
    </div>
  </div>
  <div class="conteiner">
    <div class="footer">
      <div class="fakeimg">
      </div>
    </div>
  </div>
  <?php
  if (isset($_SESSION['success'])) {
    echo $_SESSION['id']; // พิมพ์ _SESSION['id']
    echo $_SESSION['f_name']; // พิมพ์ _SESSION['f_name']
    echo $_SESSION['l_name']; // พิมพ์ _SESSION['l_name']
    unset($_SESSION['error']); // พิมพ์ _SESSION['error']
  }
  ?>
  </div>
</body>

</html>
<script>
  $(document).ready(function() {
    $('#table_row').DataTable();
  });
</script>