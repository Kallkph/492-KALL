<?php // เปิดหัวประกาศคำสั่งphp
    session_start(); // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
    include('../../configure/connect.php'); // include คือการเรียกใช้ script จาก ../../configure/connect.php
?> 
<!DOCTYPE html> // ประกาศคุณลักษณะหน้าเว็บไซต์
<html lang="th"> //กำหนดภาษาของหน้าเว็บไซต์
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> //กำหนด stylesheet css ของหน้าเว็บไซต์
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> //การเรียกใช้งาน bootstrap css framework  ของหน้าเว็บไซต์
<head> // เปิดการกำหนดคำสั่งต่างในส่วนhead
  <meta charset="utf-8" /> // กำหนดรูปแบบภาษาไทย
  <title> ระบบฐานข้อมูลนักศึกษาฝึกงาน </title> // ชื่อที่แสดงส่วนบนหัวเว็บไซต์
  <link rel="stylesheet" href="../../scr/css/styles.css"> // การเรียกใช้ stylesheet css ของหน้าเว็บไซต์
</head> // ปิดการกำหนดคำสั่งต่างในส่วนhead
<body> // คำสั่งที่บอกส่วนเนื้อเรื่องบนหน้าเว็บไซต์
  <div class="container"> // คำสั่ง bootstrap container
    <img src="../../scr/img/Banner.png" width="100%"> // กำหนดขนาดความกว้างของรูปภาพที่นำมาโชว์และให้ภาพนี้แสดงมาจาก ../scr/img/Banner.png
    <div id="mainlink"> // เปิดการกำหนด div mainlink
      <nav class="navbar navbar-expand-lg navbar-light bg-light"> // คำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" // คำสั่งเปิดปุ่ม bootstrap เรียกใช้ class ชื่อ navbar-toggler
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> // คำสั่ง bootstrap เรียกใช้ controls ชื่อ navbarNavAltMarkup
          <span class="navbar-toggler-icon"></span> // คำสั่ง bootstrap แสดงรูป navbar-toggler-icon
        </button> // ปิดคำสั่งปุ่ม bootstrap
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> // คำสั่ง bootstrap เรียกใช้ class ชื่อ collapse navbar-collapse
          <div class="container"> // คำสั่ง bootstrap container
            <div class="navbar-nav"> // คำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
              <a class="nav-item nav-link" href="../user/viewCompanay.php">สถานประกอบการ</a> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ ../user/viewCompanay.php
              <a class="nav-item nav-link" href="Doc.html"> Download เอกสารต่างๆ </a> // คำสั่ง bootstrap ชื่อ nav-link
              <a class="nav-item nav-link" href="#">ข่าวสาร</a> // คำสั่ง bootstrap ชื่อ nav-link
              <a class="nav-item nav-link" href="Fac.html">ติดต่อเรา</a> // คำสั่ง bootstrap ชื่อ nav-link
              <a class="nav-item nav-link" href="regis.html">สมัครสมาชิก</a> // คำสั่ง bootstrap ชื่อ nav-link
              </div> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
          </div> // ปิดคำสั่ง bootstrap container
        </div> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ collapse navbar-collapse
      </nav> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
    </div> // ปิดการกำหนด div mainlink
    <div class="row"> // คำสั่งการแบ่งแถวของหน้าเว็บ
      <div class="leftcolumn"> // คำสั่งการแบ่งคอลัมน์ของหน้าเว็บ
        <?php if (!isset($_SESSION ['success'])) : ?> // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['success'] จะทำให้เงื่อนไขนี้เป็นจริง true
        <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
          <form action="../../process/login_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/login_db.php
            <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="id"> textbox สำหรับใส่รหัสประจำตัวของผู้ใช้เช่น รหัสนักศึกษา, รหัสอาจารย์
            <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password"> textbox สำหรับใส่ password 
            <dev class="card1leftcolumn"> // คำสั่ง css โดยใช้ class ชื่อ card1leftcolumn
              <button type="submit" class="btn btn-primary" name="login_user">Login</button> // ปุ่มเข้าสู่ระบบ
            </dev> // ปิดคำสั่ง css โดยใช้ class ชื่อ card1leftcolumn
          </form> // ปิดคำสั่งการส่งข้อมูล
          <?php else : ;?> // เงื่อนไข if ถ้า มี isset($_SESSION['success'] จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
          <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
            <a href="user/pageuser.php"> // คำสั่ง route จากรูปภาพไปที่ user/pageuser.php
              <img src="../scr/img/profile.jpg" width="50%"> // กำหนดขนาดความกว้างของรูปภาพที่นำมาโชว์และให้ภาพนี้แสดงมาจาก ../scr/img/profile.jpg
            </a>
            รหัสนักศึกษา
            <p><?php echo $_SESSION['id'];?></p> // พิมพ์ _SESSION['id']
            ชื่อ
            <p><?php echo $_SESSION['f_name'],' ', $_SESSION['l_name'];?></p> // พิมพ์ $_SESSION['f_name'],' ', $_SESSION['l_name']
            สาขา
            <p><?php echo $_SESSION['major'];?></p> // พิมพ์ $_SESSION['major']
          </div>
          <?php endif ?>
        </div>
        <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
          <!DOCTYPE html>
          <p id="top">Link Download เอกสารต่างๆ </p>
          <ul>
            <li><a href="เอกสารแนะนำสถานที่ฝึกงาน.doc">เอกสารแนะนำสถานที่ฝึกงาน</a></li> // ลิ้งค์ Download จาก เอกสารแนะนำสถานที่ฝึกงาน.doc
            <li><a href="รายงานประจำสัปดาห์.doc">รายงานประจำสัปดาห์</a></li> // ลิ้งค์ Download จาก รายงานประจำสัปดาห์.doc
            <li><a href="แบบประเมินผลฝึกงาน.doc">แบบประเมินผลฝึกงาน</a></li> // ลิ้งค์ Download จาก แบบประเมินผลฝึกงาน.doc
          </ul>
          <p>ติดต่อเรา..</p>
          
        </div>
      </div>
      <div class="rightcolumn"> // คำสั่ง css โดยใช้ class ชื่อ rightcolumn
        <div class="card2_1"> // คำสั่ง css โดยใช้ class ชื่อ card2_1
          <div class="card"> // คำสั่ง css โดยใช้ class ชื่อ card
            <h> สมัครสมาชิก </h>
            <form action="../../process/register_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/register_db.php
              <?php include('../errors.php'); ?> // include คือการเรียกใช้ script จาก ../configure/errors.php
              <?php if (isset($_SESSION['error'])) : ?> // เงื่อนไข if ถ้า มี isset($_SESSION['error'] จะทำให้เงื่อนไขนี้เป็นจริง true
              <div class="error"> // คำสั่ง css โดยใช้ class ชื่อ error
                <h3>
                  <?php 
                    echo $_SESSION['error']; // พิมพ์ $_SESSION['error']
                    unset($_SESSION['error']); // คำสั่งทำให้ $_SESSION['error'] ไม่มีการเก็บค่าใดๆ
                  ?>
                </h3>
              </div>
              <?php endif ?>
              คำนำหน้าชื่อ<select name="name_titles" class="form-control">
                <option value="นาย">นาย</option>
                <option value="นางสาว">นางสาว</option>
                <option value="นาง">นาง</option>
              </select><br>
              ชื่อ : <input type="text" name="txt_fname" id="txt_fname"> // textboxสามารถแก้ไขชื่อได้
              <br>
              นามสกุล: <input type="text" name="txt_lname" id="txt_lname"> //textboxสามารถแก้ไขชื่อได้
              <br>
              รหัสนักศึกษา : <input type="text" id="txt_id" name="txt_id" pattern="[0-9]{7}"> //textboxสามารถแก้ไขชื่อได้
              <br>
              เบอร์โทร : <input type="text" id="telnum" name="txt_tel" pattern="[0-9]{10}"> //textboxสามารถแก้ไขชื่อได้
              <br>
              E-mail : <input type="text" id="txt_mail" name="txt_mail" placeholder="@rsu.ac.th"> //textboxสามารถแก้ไขชื่อได้
              <br>
              สาขา<select name="major" class="form-control"> // เปิดคำสั่ง css โดยมี class ชื่อ form-control
                <option value="cen">วิศวกรรมโยธา</option> // option ของ select มีการเก็บค่า value = cen
                <option value="cpe">วิศวกรรมคอมพิวเตอร์</option> // option ของ select มีการเก็บค่า value = cpe
                <option value="che">วิศวกรรมเคมี</option> // option ของ select มีการเก็บค่า value = che
                <option value="ien">วิศวกรรมอุตสาหการ</option> // option ของ select มีการเก็บค่า value = ien
                <option value="env">วิศวกรรมสิ่งแวดล้อม</option> // option ของ select มีการเก็บค่า value = env
                <option value="aen">วิศวกรรมยานยนต์</option> // option ของ select มีการเก็บค่า value = aen
                <option value="een">วิศวกรรมไฟฟ้า</option> // option ของ select มีการเก็บค่า value = een
                <option value="ien">วิศวกรรมอุตสาหการ</option> // option ของ select มีการเก็บค่า value = ien
                <option value="men">วิศวกรรมเครื่องกล</option> // option ของ select มีการเก็บค่า value = men
              </select><br> // ปิดคำสั่ง css โดยมี class ชื่อ form-control
              <br> 
              หลักสูตร<select name="course" class="form-control"> // เปิดคำสั่ง css โดยมี class ชื่อ form-control
                <option value="100">ปกติ</option> // option ของ select มีการเก็บค่า value = 100
                <option value="70">ปวส</option> // option ของ select มีการเก็บค่า value = 70
              </select><br>
              Password :<input type="text" name="txt_pwd" id="txt_pwd"><br> // textbox สำหรับใส่รหัสประจำตัวของผู้ใช้เช่น รหัสนักศึกษา, รหัสอาจารย์
              Confirm Password : <input type="text" name="txt_cpwd" id="txt_cpwd"> // textbox สำหรับใส่รหัสประจำตัวของผู้ใช้เช่น รหัสนักศึกษา, รหัสอาจารย์
              <br>
              <button type="submit" class="btn btn-light" id="btn_submit" name="reg"
                value="Save...">สมัครสมาชิก</button> // ปุ่มสมัครสมาชิก
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
</html>