<?php // เปิดหัวประกาศคำสั่งphp
session_start();  // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
include('../../configure/connect.php');  // include คือการเรียกใช้ script จาก ../configure/connect.php

if (!isset($_SESSION['id'])) {  // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
  $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!"; // การเก็บค่าไวใน _SESSION ในตัวแปล msg
}

if (isset($_GET['logout'])) { // เงื่อนไข if ถ้าหากพบ การออกจากระบบจะทำให้เงื่อนไขนี้เป็นจริง true
  session_destroy(); // คำสั่งการยกเลิกข้อมูลทั้งหมดที่อยู่ใน session
  unset($_SESSION['id']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่าใดๆ
  header('location: index.php'); // การ route ไปยัง index.php
}

if ($_SESSION['status'] != 1) {
  header('location: checkstatus.php'); // การ route ไปยัง index.php
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
  <div class="container"> // คำสั่ง bootstrap container
    <img src="../../scr/img/Banner.png" width="100%">
    <div id="mainlink">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="container"> // คำสั่ง bootstrap container
            <div class="navbar-nav">
              <a class="nav-item nav-link" href="../afterindex.php">หน้าหลัก</a>
              <a class="nav-item nav-link" href="../Company.php">สถานประกอบการ</a>
              <a class="nav-item nav-link" href="Doc.html"> Download เอกสารต่างๆ </a>
              <a class="nav-item nav-link" href="#">ข่าวสาร</a>
              <a class="nav-item nav-link" href="Fac.html">ติดต่อเรา</a>
              <?php if (isset($_SESSION['success'])) : ?>
                <a class="nav-item nav-link" href="request-company.php">ยื่นเรื่องฝึกงาน</a>
                <a class="nav-item nav-link" href="../index.php?logout='1'">ออกจากระบบ</a>
              <?php endif ?>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <div class="row">
      <div class="leftcolumn">
        <?php if (!isset($_SESSION['success'])) : ?>
          <div class="card1">
            <!-- Login Form -->
            <form action="login_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/login_db.php
              <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="id"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/login_db.php
              <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password"> textbox สำหรับใส่รหัสประจำตัวของผู้ใช้เช่น รหัสนักศึกษา, รหัสอาจารย์
              <dev class="card1leftcolumn">
                <button type="submit" class="btn btn-primary" name="login_user">Login</button> // ปุ่มเข้าสู่ระบบ
                <!-- <button type="submit" class="btn btn-primary" name="login" value="">Primary</button> -->
              </dev> // ปิดคำสั่ง css โดยใช้ class ชื่อ card1leftcolumn
            </form> // ปิดคำสั่งการส่งข้อมูล
          </div> // ปิดคำสั่ง css โดยใช้ class ชื่อ card1
        <?php else :; ?> // ถ้าเงื่อนไข if ถ้ามี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
          <div class="card3" style="height:400px;"> // คำสั่ง css โดยใช้ class ชื่อ card3
            <a href="pageuser.php"> // คำสั่ง route จากรูปภาพไปที่ user/pageuser.php
              <img src="../../scr/img/profile.jpg" width="50%"> // กำหนดขนาดความกว้างของรูปภาพที่นำมาโชว์และให้ภาพนี้แสดงมาจาก ../scr/img/profile.jpg
            </a>
            รหัสนักศึกษา
            <p><?php echo $_SESSION['id']; ?></p> // พิมพ์ _SESSION['id']
            ชื่อ
            <p><?php echo $_SESSION['f_name'], ' ', $_SESSION['l_name']; ?></p>
            สาขา
            <p><?php echo $_SESSION['major']; ?></p> // พิมพ์ $_SESSION['major']
            <div class="list-group"> // ปิดคำสั่ง css โดยใช้ class ชื่อ card3
              <a href="weekstamp.php" class="list-group-item list-group-item-action list-group-item-light">อัพโหลดรายงานประจำสัปดาห์</a>
              <a href="pageuser.php" class="list-group-item list-group-item-action list-group-item-light">แก้ไขข้อมูลประจำตัว</a>
              <a href="checkstatus.php" class="list-group-item list-group-item-action list-group-item-light">ตรวจสอบสถานะ</a>
            </div>
          </div>
        <?php endif ?>
        <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
          <!DOCTYPE html>
          <p id="top">Link Download เอกสารต่างๆ </p>
          <ul>
            <li><a href="เอกสารแนะนำสถานที่ฝึกงาน.doc">เอกสารแนะนำสถานที่ฝึกงาน</a></li>
            <li><a href="รายงานประจำสัปดาห์.doc">รายงานประจำสัปดาห์</a></li>
            <li><a href="แบบประเมินผลฝึกงาน.doc">แบบประเมินผลฝึกงาน</a></li>
          </ul>
          <p>ติดต่อเรา..</p>
          <p><b><a href="https://www.en-rsu.ac.th" target="_blank">link.//www.en-rsu.ac.th</a></b>
            <div class="fakeimg" style="height:200px;"></div>
        </div>
      </div>
      <div class="rightcolumn">
        <div class="card2infograde">
          <?php
          $map = false;
          $queryMap = "SELECT * FROM uploadfile WHERE u_id = $_SESSION[id] AND type = 'map'"; // คำสั่งเชื่อมต่อฐานข้อมูล uploadfile โดยหา u_id ทีตรงกับ $_SESSION[id] $sql และมี type เท่ากับ 'map'
          $resultMap = mysqli_query($con, $queryMap); // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล resultMap 
          if (mysqli_num_rows($resultMap) > 0) {
            $map = true;
          } else {
            echo "<form action='../../process/uploadPoto_db.php' method='post' enctype='multipart/form-data'>";
            echo "<div class='form-group'>";
            echo "<label for='inputEmail4'> อัพโหลด แผนที่สถานที่ฝึกงานก่อน ทำการอัพโหลดรายงานประจำสัปดาห์ </label>";
            echo "</div>";
            echo "<div class='form-row'>";
            echo "<div class='form-group col-md-4'>";
            echo "<input type='file' name='fileupload' id='fileupload' required='required'/>";
            echo "</div>";
            echo "<div class='form-group col-md-4'>";
            echo "<select id='weekstamp' name='weekstamp' class='form-control'>";
            echo "<option selected>";
            echo "map";
            echo "</option>";
            echo '</select>';
            echo '</div>';
            echo '</div>';
            echo "<div class='form-group'>";
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='checkbox' id='gridCheck'>";
            echo "<label class='form-check-label' for='gridCheck'>";
            echo 'ตรวจสอบความถูกต้อง';
            echo "</label>";
            echo "</div>";
            echo "<div class='form-group col-md-6'>";
            echo "<input type='hidden' id='upload_id' name='upload_id' value='$_SESSION[id]'>";
            echo "<button type='submit' name='btn_upload' value='upload_map' class='btn btn-primary'> บันทึก </button>";
            echo "</div>";
            echo "</div>";
            echo "<table class='table table-bordered'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>" . 'ชื่อรูป' . "</th>";
            echo "<th scope='col'>" . 'รูปแผนที่' . "</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            $queryMap = "SELECT * FROM uploadfile WHERE u_id = $_SESSION[id] AND type = 'map'" or die("Error:"); // คำสั่งเชื่อมต่อฐานข้อมูล uploadfile โดยหา u_id ทีตรงกับ $_SESSION[id] $sql และมี type เท่ากับ 'map'
            $resultMap = mysqli_query($con, $queryMap);
            while ($row = mysqli_fetch_array($resultMap)) {
              echo "<tr>";
              echo "<td>" . $row['fileupload'] . "</td>";
              echo "<td>" . "<img src='../../scr/fileupload/" . $row['fileupload'] . "' width='100'>" . "</td>";
              echo "</td>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</form>";
          }
          if (isset($_SESSION['id']) && $map) { // เงื่อนไข if ถ้ามี isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
            echo "<form action='../../process/uploadPoto_db.php' method='post' enctype='multipart/form-data'>";
            echo "<div class='form-group'>";
            echo "<label for='inputEmail4'> อัพโหลดรายงานประจำสัปดาห์ </label>";
            echo "</div>";
            echo "<div class='form-row'>";
            echo "<div class='form-group col-md-4'>";
            echo "<input type='file' name='fileupload' id='fileupload' required='required'/>";
            echo "</div>";
            echo "<div class='form-group col-md-4'>";
            echo "สัปดาห์ที่";
            echo "<select id='weekstamp' name='weekstamp' class='form-control'>";
            echo "<option selected>";
            echo "1";
            echo "</option>";
            echo "<option selected>";
            echo "2";
            echo "</option>";
            echo "<option selected>";
            echo "3";
            echo "</option>";
            echo "<option selected>";
            echo "4";
            echo "</option>";
            echo "<option selected>";
            echo "5";
            echo "</option>";
            echo "<option selected>";
            echo "6";
            echo "</option>";
            echo "<option selected>";
            echo "7";
            echo "</option>";
            echo "<option selected>";
            echo "8";
            echo "</option>";
            echo '</select>';
            echo '</div>';
            echo '</div>';
            echo "<div class='form-group'>";
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='checkbox' id='gridCheck'>";
            echo "<label class='form-check-label' for='gridCheck'>";
            echo 'ตรวจสอบความถูกต้อง';
            echo "</label>";
            echo "</div>";
            echo "<div class='form-group col-md-6'>";
            echo "<input type='hidden' id='upload_id' name='upload_id' value='$_SESSION[id]'>";
            echo "<button type='submit' name='btn_upload' value='upload_weekstamp' class='btn btn-primary'> บันทึก </button>";
            echo "</div>";
            echo "</div>";
            echo "<table class='table table-bordered'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>" . 'ชื่อรูป' . "</th>";
            echo "<th scope='col'>" . 'สัปดาห์' . "</th>";
            echo "<th scope='col'>" . 'รูป' . "</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            $query = "SELECT * FROM uploadfile WHERE u_id = $_SESSION[id]" or die("Error:");
            $result = mysqli_query($con, $query);  // ผลของการค้นหาข้อมูลจาก mysqli_query จะถูกเก็บไว้ในตัวแปล result 
            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['fileupload'] . "</td>";
              echo "<td>" . $row['type'] . "</td>";
              echo "<td>" . "<img src='../../scr/fileupload/" . $row['fileupload'] . "' width='250'>" . "</td>";
              echo "</td>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</form>";
          }
          ?>
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
<?php
include('../../configure/connect.php')
?>