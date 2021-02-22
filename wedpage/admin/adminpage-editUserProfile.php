<?php // เปิดหัวประกาศคำสั่งphp
session_start(); // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
if (!isset($_SESSION['id'])) { // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true 
  $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
}
if (isset($_GET['logout'])) { // เงื่อนไข if ถ้า มี $_GET['logout'] จะทำให้เงื่อนไขนี้เป็นจริง true
  session_destroy(); // คำสั่งการยกเลิกข้อมูลทั้งหมดที่อยู่ใน session
  unset($_SESSION['id']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่า $_SESSION['id']
  unset($_SESSION['type']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่า $_SESSION['type']
  header('location: index.php'); // การ route ไปยัง index.php
}
if ($_GET['id']) {
  include('../../configure/connect.php');
  $sql = "SELECT * FROM users WHERE id = ?";
  if ($stmt = mysqli_prepare($con, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $param_id);
    $param_id = trim($_GET['id']);
    if (mysqli_stmt_execute($stmt)) {
      $result = mysqli_stmt_get_result($stmt);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['id'];
      } else {
        echo "else";
      }
    }
  }
}
?>

<html lang="th"> //กำหนดภาษาของหน้าเว็บไซต์
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> //กำหนด stylesheet css ของหน้าเว็บไซต์
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์

<head>
  <meta charset="utf-8" /> // กำหนดรูปแบบภาษาไทย
  <title> ระบบฐานข้อมูลนักศึกษาฝึกงาน </title> // ชื่อที่แสดงส่วนบนหัวเว็บไซต์
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
      <?php if (!isset($_SESSION['success'])) { // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้าไม่มี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้เป็นจริง true
        "<div class='card1'>";
        "<form action='login_db.php' method='post'>";
        echo "<input type='text' id='txt_id' class='fadeIn second' name='txt_id' placeholder='id'>";
        echo "<input type='text' id='txt_password' class='fadeIn third' name='txt_password' placeholder='password'>";
        "<dev class='card1leftcolumn'>";
        echo "<button type='submit' class='btn btn-primary' name = 'login_user'> . Login . </button>";
        "</dev>";
        "</form>";
        "</div>";
      } else { ?>
        <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
          <a href="adminpage.php"> // คำสั่ง route จากรูปภาพไปที่ user/adminpage.php
            <img src="../../scr/img/adminproflie.jpg" width="40%"> 
          </a>
          ชื่อ Admin
          <p><?php echo $_SESSION['f_name']; ?></p>
          สาขา
          <p><?php echo $_SESSION['major']; ?></p>
          <p><?php echo $_SESSION['id']; ?></p>
        </div>
      <?php } ?>
      <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
        <div class="btn-group-vertical">
          แผงควบคุม
        </div>
        <div class="list-group">
          <?php
          if ($_SESSION['major'] == "0") {
            echo "<a href='adminpage.php' class='list-group-item list-group-item-action list-group-item-light'>ใบคำร้องขอฝึกงาน</a>";
            echo "<a href='adminpage-users.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการบัญชีผู้ใช้</a>";
            echo "<a href='adminpage-admin.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการบัญชีแอดมิน</a>";
          } else {
            echo "<a href='adminpage.php' class='list-group-item list-group-item-action list-group-item-light'>ใบคำร้องขอฝึกงาน</a>";
          }
          ?>
        </div>
        <div class="fakeimg" style="height:200px;"></div>
      </div>
    </div>
    <div class="rightcolumn">
      <div class="card2-from-admin-read">
        <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
          <div class="form-group col-md-4">
          </div>
          <div class="form-group col-md-">
            หน้า ดู หรือ แก้ไขข้อมูลประจำตัวผู้ใช้
          </div>
        </div>
        <!-- <form action="../../process/admin-update-status_db.php" method="post"> -->
        <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
          <div class="form-group col-md-4">
            <br>
            <label for="inputEmail4">ข้อมูลของ</label>
            <?php echo "<br>" .  $row['name_titles'] . " " . $row['f_name'] . "  " . $row['l_name']; ?>
          </div>
          <div class="form-group col-md-4">
            <br>
            <label for="inputPassword4" type="text" id="txt_id" name="txt_id">รหัสนักศึกษา</label>
            <?php echo "<br>" . $row['id']; ?>
          </div>
        </div>
        <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
          <form action="../../process/editUserProfile_db.php" method="post">
            คำนำหน้าชื่อ : <input type="text" name="name_titles" id="name_titles" value='<?php echo $row['name_titles'] ?>'> // เป็นช่อง input ที่จะแสดงต่า $row['name_titles']
            ชื่อ : <input type="text" name="txt_fname" id="txt_fname" value='<?php echo $row['f_name'] ?>'> // เป็นช่อง input ที่จะแสดงต่า $row['f_name']
            <br>
            นามสกุล: <input type="text" name="txt_lname" id="txt_lname" value='<?php echo $row['l_name'] ?>'> // เป็นช่อง input ที่จะแสดงต่า $row['l_name']
            <br>
            รหัสนักศึกษา : <input type="text" id="txt_id" name="txt_id" pattern="[0-9]{7}" value='<?php echo $row['id'] ?>'> // เป็นช่อง input ที่จะแสดงต่า $row['id']
            <br>
            เบอร์โทร : <input type="text" id="telnum" name="txt_tel" pattern="[0-9]{10}" value='<?php echo $row['tel'] ?>'> // เป็นช่อง input ที่จะแสดงต่า $row['tel']
            <br>
            E-mail : <input type="text" id="txt_mail" name="txt_mail" placeholder="@rsu.ac.th" value='<?php echo $row['email'] ?>'> // เป็นช่อง input ที่จะแสดงต่า $row['email']
            <br>
            สาขา : <input type="text" id="major" name="major" placeholder="@rsu.ac.th" value='<?php echo $row['major'] ?>'> // เป็นช่อง input ที่จะแสดงต่า $row['major']
            <br>
            หน่วยกิตขั้นต่ำที่จำเป็นต้องถึงก่อน : <input type="text" id="course" name="course" placeholder="@rsu.ac.th" value='<?php echo $row['course'] ?>'> // เป็นช่อง input ที่จะแสดงต่า $row['course']
            <br>
            <?php if ($_SESSION['major'] == 0) {
              echo "รหัสผ่าน :" . "<input type='text' id='password' name='password' placeholder='@rsu.ac.th'  value='$row[password]'>";
            } ?> // เป็นช่อง input ที่จะแสดงต่า $row['password']
            <br>
            <button type="submit" class="btn btn-light" id="btn_submit" name="reg" value="Save...">บันทึก</button>
          </form>
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
</body>

</html>