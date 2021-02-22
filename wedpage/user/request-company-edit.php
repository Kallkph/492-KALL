<?php  // เปิดหัวประกาศคำสั่งphp
session_start();  // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
include('../../configure/connect.php');  // include คือการเรียกใช้ script จาก ../configure/connect.php
if (!isset($_SESSION['id'])) {  // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
  $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";  // การเก็บค่าไวใน _SESSION ในตัวแปล msg
}
if (isset($_GET['logout'])) {  // เงื่อนไข if ถ้าหากพบ การออกจากระบบจะทำให้เงื่อนไขนี้เป็นจริง true
  session_destroy();   // คำสั่งการยกเลิกข้อมูลทั้งหมดที่อยู่ใน session
  unset($_SESSION['id']);  // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่าใดๆ
  header('location: index.php');  // การ route ไปยัง index.php
}  
// if ($_SESSION['status'] != 5) {
//   header('location: checkstatus.php');
// }
if (isset($_POST['query'])) {
  $data = array( // สร้างตัวแปรเพื่อเก็บค่า ต่างๆหลัง () เพื่อนำไปใช้งาน โดยจัดเก็บข้อมูลให้อยู่ในรูปแบบ array
    "txt_company" => $_POST["txt_r_company"]
  );
  $query = $data['txt_company'];
  $sql2 = "SELECT DISTINCT* From company WHERE c_name = '$query'";
  $result2 = mysqli_query($con, $sql2) or die("Error in query: $sql2 ");
  if ($result2) {
    $fetresult2 = true;
  }
  // print_r($result2);
} else {
  $fetresult2 = false;
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
              <a class="nav-item nav-link" href="/wedpage/afterindex.php">หน้าหลัก</a>
              <a class="nav-item nav-link" href="Company.php">สถานประกอบการ</a>
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
    <div class="row"> // คำสั่งการแบ่งแถวของหน้าเว็บ
      <div class="leftcolumn"> // คำสั่งการแบ่งคอลัมน์ของหน้าเว็บ
        <?php if (!isset($_SESSION['success'])) : ?> // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้าไม่มี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้เป็นจริง true
          <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
            <!-- Login Form -->
            <form action="login_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/login_db.php
              <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="id">
              <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password">

              <dev class="card1leftcolumn">
                <button type="submit" class="btn btn-primary" name="login_user">Login</button> // ปุ่มเข้าสู่ระบบ
                <!-- <button type="submit" class="btn btn-primary" name="login" value="">Primary</button> -->
              </dev>
            </form>
          </div>
        <?php else :; ?>
          <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
            <a href="pageuser.php">
              <img src="../../scr/img/profile.jpg" width="50%">
            </a>
            รหัสนักศึกษา
            <p><?php echo $_SESSION['id']; ?></p> // พิมพ์ _SESSION['id']
            ชื่อ
            <p><?php echo $_SESSION['f_name'], ' ', $_SESSION['l_name']; ?></p>
            สาขา
            <p><?php echo $_SESSION['id']; ?></p> // พิมพ์ _SESSION['id']
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action list-group-item-light">อัพโหลดรายงานประจำสัปดาห์</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-light">แก้ไขข้อมูลประจำตัว</a>
              <a href="#" class="list-group-item list-group-item-action list-group-item-light">ตรวจสอบสถานะ</a>
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
        <div class="card2" style='height:1400px'>
          หน้าแก้ไขข้อมูลผู้ดูแลฝึกงาน
          <form action="/wedpage/user/request-company-edit.php" method="post">
            <div class="form-group" style="width: 600px">
              <label for="exampleFormControlInput1" bootstrap style="margin-top: 50px ">กรอกชื่อสถานประกอบการเพื่อสือค้นสถานประกอบการและกรอกข้อมูลอัตโนมัติ</label>
              <div class="form-group row"> // คำสั่ง css โดยใช้ class ชื่อ form-group และมีคำสั่ง คำสั่งการแบ่งแถวของหน้าเว็บ row
                <input type="text" class="form-control" id="txt_r_company" name="txt_r_company">
                <button type="submit" class="btn btn-light" id="btn_submit" name="query" value="Save...">ค้นหา</button>
              </div>
            </div>
          </form>
          <?php if ($fetresult2 == true) { ?>
            <?php while ($rows = $result2->fetch_assoc()) {
              ($rows); //
            ?>
              <form action="../../process/request-company_db.php" method="post">
                <label for="inputEmail4">ชื่อหน่วยงาน/บริษัท ที่ประสงค์จะฝึกงาน</label>
                <input type="text" class="form-control" id="txt_r_company" name="txt_r_company" value='<?php echo $rows['c_name'] ?>'> // แสดงต่า $row['c_name']
                <label for="inputEmail4">กรอก ตำแหน่งหรือชื่อบุคคคล และ เบอร์โทรที่ติดต่อได้</label>
                <input type="text" class="form-control" id="txt_r_about" name="txt_r_about" value='<?php echo $rows['c_detail'] ?>'>// แสดงต่า $row['c_detail']
                <div class="form-group" style="width: 600px">
                  <label for="exampleFormControlTextarea1">ข้อมูลที่อยู่</label>
                  <input type="text" id="txtc_address" name="txt_r_address" style="height: 200px" value='<?php echo $rows['c_address'] ?>'> // แสดงต่า $row['c_address']
                </div>
                 <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
                  <div class="form-group col-md-4"> 
                    เบอร์โทรศัพท์
                    <input type="text" id="txtc_address" name="txt_r_address" style="height:" value='<?php echo $rows['c_tel'] ?>'> // แสดงต่า $row['c_tel']
                  </div>
                </div>
                 <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
                  <div class="form-group col-md-4" style='margin-top:4px'>
                    <label for="inputState">ปีการศึกษาที่จะทำการฝึกงาน</label>
                    <select id="txt_r_state" name="txt_r_yearnow" class="form-control">
                      <option selected>ปี</option>
                      <option>63</option>
                      <option>64</option> 
                      <option>65</option> 
                      <option>66</option> 
                      <option>67</option> 
                    </select>
                  </div>
                </div>
                 <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">ระยะเวลาเริ่มฝึกงาน กรุณากรอก ในรูปแบบ<br> วันที่ 1 มกราคม พ.ศ.2563</label>
                    <input type="text" class="form-control" id="txt_r_phone" name="txt_r_startTime" placeholder="วันที่ 1 เดือน มกราคม ปี พ.ศ.2563">

                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">สิ้นสุดเมื่อ</label>
                    <input type="text" class="form-control" id="txt_r_fax" name="txt_r_endTime" placeholder="วันที่ 1 เดือน เมษายน ปี พ.ศ.2563" style='margin-top:30px'>
                  </div>
                </div>

                <button type="submit" name="r_seveInfo" value="Save..." class="btn btn-primary">ยื่นเรื่อง</button>
              </form>
            <?php } ?>
          <?php } ?> -->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner"> // คำสั่ง bootstrap เรียกใช้ controls ชื่อ carousel-inner
              <div class="carousel-item active"> // คำสั่ง css โดยใช้ class ชื่อ carousel-item
                <img src="../../scr/img/2.png" class="d-block w-100" alt="..."> // คำสั่ง css เรียกใช้ controls ชื่อ carousel-item
              </div>
              <div class="carousel-item">
                <img src="../../scr/img/1.png" class="d-block w-100" alt="..."> // คำสั่ง css โดยใช้ class ชื่อ carousel-item
              </div>
              <div class="carousel-item">
                <img src="../../scr/img/3.png" class="d-block w-100" alt="..."> // คำสั่ง css โดยใช้ class ชื่อ carousel-item
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> // คำสั่ง css โดยใช้ class ชื่อ carousel-item ให้ทำงาน
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> // คำสั่ง css กำหนดค่าสไลด์โชว์ active 
              <span class="carousel-control-next-icon" aria-hidden="true"></span> // คำสั่ง bootstrap เรียกใช้ controls ชื่อ carousel-inner
              <span class="sr-only">Next</span>
            </a>
          </div>
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
  <?php
  if (isset($_SESSION['success'])) {
    echo $_SESSION['id'];
    echo $_SESSION['f_name'];
    echo $_SESSION['l_name'];
    unset($_SESSION['error']);
  } else {
    echo "Have a good night!";
  }
  ?>
  </div>
</body>

</html>
<?php
include('../../configure/connect.php')
?>