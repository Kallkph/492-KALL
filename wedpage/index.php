<?php // เปิดหัวประกาศคำสั่งphp
  session_start(); // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
  include('../configure/connect.php'); // include คือการเรียกใช้ script จาก ../configure/connect.php
  if (!isset($_SESSION['id'])) { // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
    $_SESSION['msg'] = "กรุณาเข้าสู่ระบบก่อนเริ่มใช้งาน !"; // การเก็บค่าไวใน _SESSION ในตัวแปล msg
  }
  if (isset($_SESSION['id'])){ // เงื่อนไข if ถ้า มี isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
    $loginAction = true; //การกำหนดค่า ตัวแปล loginAction ใหัมีค่า true
    $query = "SELECT * FROM users WHERE id = '$_SESSION[id]' "; //การ Read ข้อมูลเพื่อหา id ที่ตรงกับ $_SESSION[id] แล้วนำไปเก็บไว้ในตัวแปล query
    $result = mysqli_query($con, $query); // ผลของการค้นหาข้อมูลจาก query จะถูกเก็บไว้ในตัวแปล result 
    $userdata = mysqli_fetch_assoc($result); // การแปลงข้อมูล result ที่ได้มาให้อยู่ในรูปแบบ array จะถูกเก็บไว้ในตัวแปล userdata
    if (mysqli_num_rows($result) == 1) { //  เงื่อนไข if ถ้ามีการพบข้อมูลที่มี length เท่ากับ 1 จะทำให้เงื่อนไขนี้เป็นจริง true
      $_SESSION['status'] = $userdata['status']; //การกำหนดค่า ตัวแปล $_SESSION['status'] ใหัมีค่า $userdata['status']
    }
    header("location: /../afterindex.php");  //การ  ไปยัง afterindex.php
  } else { // จากเงื่อนไข if ถ้ามีการพบข้อมูลที่มี length ไม่เท่ากับ 1 จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
     $loginAction = false; // การกำหนดค่า ตัวแปล loginAction ใหัมีค่า false
  }
  if (isset($_GET['logout'])) { // เงื่อนไข if ถ้าหากพบ การออกจากระบบจะทำให้เงื่อนไขนี้เป็นจริง true
    session_destroy(); // คำสั่งการยกเลิกข้อมูลทั้งหมดที่อยู่ใน session
    unset($_SESSION); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่าใดๆ
    header('location: index.php'); // การ route ไปยัง index.php
  }
?> //ปิดท้ายประกาศคำสั่งphp

<html lang="th"> //กำหนดภาษาของหน้าเว็บไซต์
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" //กำหนด stylesheet css ของหน้าเว็บไซต์
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" //การเรียกใช้งาน bootstrap css framework  ของหน้าเว็บไซต์
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" // คำสั่งเปิดปุ่ม bootstrap เรียกใช้ class ชื่อ navbar-toggler
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> // คำสั่ง bootstrap เรียกใช้ controls ชื่อ navbarNavAltMarkup
          <span class="navbar-toggler-icon"></span> // คำสั่ง bootstrap แสดงรูป navbar-toggler-icon
        </button> // ปิดคำสั่งปุ่ม bootstrap
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> // คำสั่ง bootstrap เรียกใช้ class ชื่อ collapse navbar-collapse
          <div class="container"> // คำสั่ง bootstrap container
            <div class="navbar-nav"> // คำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
              <a class="nav-item nav-link" href="Company.php">สถานประกอบการ</a> //  คำสั่ง bootstrap ชื่อ nav-link
              <a class="nav-item nav-link" href="user/news.php">แนะนำ</a>  // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ user/news.php
              <a class="nav-item nav-link" href="about.php">ติดต่อเรา</a> // คำสั่ง bootstrap ชื่อ nav-link
              <?php if (!isset($_SESSION ['success'])) : ?>  // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
              <a class="nav-item nav-link" href="/wedpage/user/register.php">สมัครสมาชิก</a> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ /wedpage/user/register.php
              <?php else : ?> // เงื่อนไข if ถ้า มี isset($_SESSION['id'] จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
              <a class="nav-item nav-link" href="user/checkstatus.php">ยื่นเรื่องฝึกงาน</a> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ user/checkstatus.php
              <a class="nav-item nav-link" href="index.php?logout='1'">ออกจากระบบ</a> // คำสั่ง bootstrap ชื่อ nav-link และส่งค่า logout เท่ากับ 1
              <?php endif ?> // ปิดคำสั่ง php ใน tag html 
            </div> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
          </div> // ปิดคำสั่ง bootstrap container
        </div> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ collapse navbar-collapse
      </nav> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
    </div> // ปิดการกำหนด div mainlink
    <div class="row"> // คำสั่งการแบ่งแถวของหน้าเว็บ
      <div class="leftcolumn"> // คำสั่งการแบ่งคอลัมน์ของหน้าเว็บ
        <?php if ($loginAction == true) { ?> // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้า loginAction มีค่าเป็น true จะทำให้เงื่อนไขนี้เป็นจริง true
          <?php if (!isset($_SESSION ['success'])) { ?>  // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้าไม่มี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้เป็นจริง true
          <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
            <!-- Login Form -->
            <form action="../process/login_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/login_db.php
              <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="ID"> textbox สำหรับใส่รหัสประจำตัวของผู้ใช้เช่น รหัสนักศึกษา, รหัสอาจารย์
              <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="Password"> textbox สำหรับใส่ password 
              <dev class="card1leftcolumn"> // คำสั่ง css โดยใช้ class ชื่อ card1leftcolumn
                <button type="submit" class="btn btn-primary" name="login_user">Login</button> // ปุ่มเข้าสู่ระบบ
              </dev> // ปิดคำสั่ง css โดยใช้ class ชื่อ card1leftcolumn
            </form>// ปิดคำสั่งการส่งข้อมูล
          </div> // ปิดคำสั่ง css โดยใช้ class ชื่อ card1
          <?php } else {?> // ถ้าเงื่อนไข if ถ้ามี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
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
          </div> // ปิดคำสั่ง css โดยใช้ class ชื่อ card3
          <?php } ?> // ปิดคำสั่ง else
        <?php } else { ?> // if ถ้า loginAction ไม่มีค่าเป็น true จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
        <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
          <!-- Login Form -->
          <form action="../process/login_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/login_db.php
            เข้าสู่ระบบ
            <div class="form-row" style='margin-top:60px'> // คำสั่ง css โดยใช้ class ชื่อ form-row และเว้นระยะจากด้านบน 60px
              <div class="form-group col-md-3"></div> // คำสั่ง css โดยใช้ class ชื่อ form-group และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-md-3
              <div class="form-group col-md-3"> // คำสั่ง css โดยใช้ class ชื่อ form-group และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-md-3
                <a href="afterindex.php" title="View" class="btn btn-primary">นักศึกษา</a> // ลิ้งค์ route จากรูปภาพไปที่ afterindex.php
              </div>// ปิดคำสั่ง css
            </div>// ปิดคำสั่ง css
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row 
              <div class="form-group col-md-3"></div> // คำสั่ง css โดยใช้ class ชื่อ form-group และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-md-3
                <div class="form-group col-md-3"> // คำสั่ง css โดยใช้ class ชื่อ form-group และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-md-3
                  <a href="admin/adminpage-login.php" title="View" class="btn btn-primary" style='margin-left:5px'>อาจารย์</a> // ลิ้งค์ route จากรูปภาพไปที่ admin/adminpage-login.php
                </dev> // ปิดคำสั่ง css
              </div> // ปิดคำสั่ง css
            </div> // ปิดคำสั่ง css
          </form> // ปิดคำสั่งการส่งข้อมูลด้วยวิธีการ post
        </div> // ปิดคำสั่ง css
        <?php } ?>  // ปิดคำสั่ง else
        <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
          <!DOCTYPE html> // ประกาศคุณลักษณะหน้าเว็บไซต์
          <p id="top">Link Download เอกสารต่างๆ </p> // คำสั่ง css โดยใช้ subclass มี id เท่่ากับ top
          <ul>
            <li><a href="เอกสารแนะนำสถานที่ฝึกงาน.doc">เอกสารแนะนำสถานที่ฝึกงาน</a></li> // ลิ้งค์ Download จาก เอกสารแนะนำสถานที่ฝึกงาน.doc
            <li><a href="รายงานประจำสัปดาห์.doc">รายงานประจำสัปดาห์</a></li> // ลิ้งค์ Download จาก รายงานประจำสัปดาห์.doc
            <li><a href="แบบประเมินผลฝึกงาน.doc">แบบประเมินผลฝึกงาน</a></li> // ลิ้งค์ Download จาก แบบประเมินผลฝึกงาน.doc
          </ul>
          <p>ติดต่อเรา..</p>
          <p><b><a href="link.//www.en-rsu.ac.th" target="_blank">link.//www.en-rsu.ac.th</a></b> ลิ้งค์ สำหรับ www.en-rsu.ac.th
            <div style="height:200px;"></div>  คำสั่ง css ทำให้มีพื้นที่สูง 200px
        </div>
      </div> // ปิดคำสั่งการแบ่งคอลัมน์ของหน้าเว็บ
      <div class="rightcolumn"> // คำสั่ง css โดยใช้ class ชื่อ rightcolumn
        <div class="card2_index"> // คำสั่ง css โดยใช้ class ชื่อ card2_index
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> คำสั่ง bootstrap เรียกใช้ class ชื่อ carousel slide โดยมี id carouselExampleIndicators
            <ol class="carousel-indicators"> คำสั่ง css เรียกใช้ class ชื่อ carousel-indicators
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> // คำสั่ง css กำหนดค่าสไลด์โชว์ active 
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> 
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner"> // คำสั่ง bootstrap เรียกใช้ controls ชื่อ carousel-inner
              <div class="carousel-item"> // คำสั่ง css เรียกใช้ controls ชื่อ carousel-item
                <?php $query = "SELECT * FROM uploadfile WHERE type = 'news'"; //การ Read ข้อมูลเพื่อหา news แล้วนำไปเก็บไว้ในตัวแปล query
                          $result = mysqli_query($con, $query); // ผลของการค้นหาข้อมูลจาก query จะถูกเก็บไว้ในตัวแปล result 
                          while ($row = mysqli_fetch_array($result)) { // การแปลงข้อมูล result ที่ได้มาให้อยู่ในรูปแบบ array จะถูกเก็บไว้ในตัวแปล row
                              echo "<img src='../../scr/fileupload/".$row['fileupload']."' width='100%'>"; 
                            } 
                ?>
              </div> // ปิดคำสั่ง css
              <div class="carousel-item"> // คำสั่ง css โดยใช้ class ชื่อ carousel-item
                <img src="../scr/img/1.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item"> // คำสั่ง css โดยใช้ class ชื่อ carousel-item
                <img src="../scr/img/3.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item active"> // คำสั่ง css โดยใช้ class ชื่อ carousel-item ให้ทำงาน
                <img src="../scr/img/2.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> // คำสั่งเปิดปุ่ม bootstrap เรียกใช้ class ชื่อ carousel-control-prev
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> // คำสั่งเปิดปุ่ม bootstrap เรียกใช้ class ชื่อ carousel-control-next
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>  // ปิดคำสั่ง css โดยใช้ class ชื่อ rightcolumn
    </div> // ปิดคำสั่งการแบ่งแถวของหน้าเว็บ
  </div>
  </div>
</body>
</html>