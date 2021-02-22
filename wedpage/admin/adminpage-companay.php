<?php // เปิดหัวประกาศคำสั่งphp
session_start();  // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
if (!isset($_SESSION['id'])) { // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true 
  $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";  
}
if (isset($_GET['logout'])) {  // เงื่อนไข if ถ้า มี $_GET['logout'] จะทำให้เงื่อนไขนี้เป็นจริง true
  session_destroy();  // คำสั่งการยกเลิกข้อมูลทั้งหมดที่อยู่ใน session
  unset($_SESSION['id']);  // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่า $_SESSION['id']
  unset($_SESSION['type']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่า $_SESSION['type']
  header('location: index.php');   // การ route ไปยัง index.php
}
include('../../configure/connect.php');
$sql = "SELECT * From company";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");  // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
?>
<html lang="th">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> //กำหนด stylesheet css ของหน้าเว็บไซต์
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> //การเรียกใช้งาน jquery ของหน้าเว็บไซต์
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> //การเรียกใช้งาน jquery ของหน้าเว็บไซต์
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์
<script src="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์

<head>
  <meta charset="utf-8" /> // กำหนดรูปแบบภาษาไทย
  <title> ระบบฐานข้อมูลนักศึกษาฝึกงาน </title>
  <link rel="stylesheet" href="../../scr/css/styles.css"> // การเรียกใช้ stylesheet css ของหน้าเว็บไซต์
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">หน้าเพจสำหรับ ADMIN</a>
    <form class="form-inline">
      <?php if (!isset($_SESSION)) : ?> // เงื่อนไข if ถ้า ไม่มี isset($_SESSION จะทำให้เงื่อนไขนี้เป็นจริง true
        <a class="nav-item nav-link" href="register.php">สมัครสมาชิก</a>
      <?php else : ?>
        <a class="nav-item nav-link" href="../index.php?logout='1'">ออกจากระบบ</a>
      <?php endif ?>
    </form>
  </nav>
  <div class="row"> // คำสั่งการแบ่งแถวของหน้าเว็บ
    <div class="leftcolumn"> // คำสั่งการแบ่งคอลัมน์ของหน้าเว็บ
      <?php if (!isset($_SESSION['success'])) : ?> // เงื่อนไข if ถ้า ไม่มี isset($_SESSION จะทำให้เงื่อนไขนี้เป็นจริง true
        <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
          <!-- Login Form -->
          <form action="login_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/login_db.php
            <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="id">
            <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password">
            <dev class="card1leftcolumn">
              <button type="submit" class="btn btn-primary" name="login_user">Login</button>
              <!-- <button type="submit" class="btn btn-primary" name="login" value="">Primary</button> -->
            </dev>
          </form>
        </div>
      <?php else :; ?>
        <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
          <a href="pageuser.php"> // คำสั่ง route จากรูปภาพไปที่ user/pageuser.php
            <img src="../../scr/img/adminproflie.jpg" width="40%">
          </a>
          ชื่อ Admin
          <p><?php echo $_SESSION['f_name']; // พิมพ์ _SESSION['f_name']
              ?>
          </p>
          สาขา
          <p><?php echo $_SESSION['major']; ?></p> // พิมพ์ _SESSION['major']
        </div>
      <?php endif ?>
      <div class="card3-adminpage">
        <div class="btn-group-vertical">
          แผงควบคุม
        </div>
        <div class="list-group">
          <?php
          if ($_SESSION['major'] == "0") { // เงื่อนไข if ถ้า $_SESSION['major'] มีค่าเท่ากับ "0" จะทำให้เงื่อนไขนี้เป็นจริง true
            echo "<a href='adminpage.php' class='list-group-item list-group-item-action list-group-item-light'>ใบคำร้องขอฝึกงาน</a>";
            echo "<a href='adminpage-weekstamp.php' class='list-group-item list-group-item-action list-group-item-light'>รายงานประจำสัปดาห์และแผนที่</a>";
            echo "<a href='adminpage-users.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการบัญชีสมาชิก</a>";
            echo "<a href='adminpage-admin.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการบัญชีอาจารย์</a>";
            echo "<a href='adminpage-companay.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการข้อมูลสถานประกอบการ</a>";
            echo "<a href='adminpage-News.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการข้อมูลข่าวสาร</a>";
          } else {
            echo "<a href='adminpage.php' class='list-group-item list-group-item-action list-group-item-light'>ใบคำร้องขอฝึกงาน</a>";
            echo "<a href='adminpage-weekstamp.php' class='list-group-item list-group-item-action list-group-item-light'>รายงานประจำสัปดาห์</a>";
            echo "<a href='adminpage-companay.php' class='list-group-item list-group-item-action list-group-item-light'>ดูข้อมูลสถานประกอบการ</a>";
          }
          ?>
        </div>
        <div class="fakeimg" style="height:200px;"></div>
      </div>
    </div>
    <div class="rightcolumn">
      <div class="card2fortable">
        จัดการข้อมูลสถานประกอบการ
        <table class="table" id="table_row" width="1060px">
          <thead class="thead-dark">
            <tr>
              <th scope="col" style="width:300px;">ชื่อ</th>
              <th scope="col" style="width:60px;"></th>
              <th scope="col" style="width:280px;">ที่อยู่</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { // คำสั่งการ loop ค่าในตัวแปล $result ด้วยคำสั่ง fetch_assoc() แล้วนำค่าที่ได้ index นั่นๆเก็บลง $row 
              echo "<tr>";
              echo "<td>" . $row['c_name'] . "</td>";
              echo "<td>" . "</td>";
              echo "<td>" . $row['c_address'] . "</td>";
              echo "<td>";
              echo "<a href='adminpage-editCompanay.php?id=" . $row['c_id'] . "' title='View' class='btn btn-link'>ดูข้อมูล</a>";
              "</td>";
              "</tr>";
            } ?>
          </tbody>
        </table>
        <?php if ($_SESSION['major'] == '0') { ?>
          <form action="../../process/adminpage-add-companay.php" method="post">
            <div class="form-group" style="width: 600px">
              <label for="exampleFormControlInput1" bootstrap style="margin-top: 50px ">เพิ่มข้อมูลสถานประกอบการใหม่</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="txtc_name" placeholder="ชื่อสถานประกอบการ">
            </div>
            <div class="form-group" style="width: 600px">
              <label for="exampleFormControlTextarea1">ข้อมูลที่อยู่</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="txtc_address" rows="3"></textarea>
            </div>
            <div class="form-group" style="width: 600px">
              <label for="exampleFormControlTextarea1">ข้อมูลเพิ่มเติม</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="txtc_detail" rows="4" style="height: 300px"></textarea>
            </div>
            <div class="form-group" style="width: 600px">
              <label for="exampleFormControlInput1" bootstrap style="margin-top: 0px ">เบอร์โทรติดต่อ</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="txtc_tel" placeholder="เบอร์โทรติดต่อ">
            </div>
            <button type="submit" class="btn btn-light" id="btn_submit" name="reg" value="Save...">เพิ่ม</button>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>
  </div>
  <div class="conteiner">
    <div class="footer">
      <div class="fakeimg">
      </div>  
    </div>
  </div>
  </div>
</body>

</html>
<script>
  $(document).ready(function() {
    $('#table_row').DataTable();
  });
</script>