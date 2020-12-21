<?php // เปิดหัวประกาศคำสั่งphp
  session_start(); // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
  include('../../configure/connect.php'); // include คือการเรียกใช้ script จาก ../configure/connect.php
  if (!isset($_SESSION['id'])) { // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
    $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!"; // การเก็บค่าไวใน _SESSION ในตัวแปล msg
  }
  if (isset($_GET['logout'])) { // เงื่อนไข if ถ้าหากพบ การออกจากระบบจะทำให้เงื่อนไขนี้เป็นจริง true
    session_destroy(); // คำสั่งการยกเลิกข้อมูลทั้งหมดที่อยู่ใน session
    unset($_SESSION['id']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่าใดๆ
    header('location: index.php'); // การ route ไปยัง index.php
  }
  $major = $_SESSION['major']; // คำสั่ง switch โดยจะเข้าเงื่อนไข case จากตัวแลที่เก็บค่า major
  switch ($major) {
    case "cen":
      $s_value_length = 2;
      break;
    case "che":
      $s_value_length = 3;
      break;
    case "env":
      $s_value_length = 2;
      break;
    case "aen":
      $s_value_length = 0;
      break;
    case "een":
      $s_value_length = 2;
      break;
    case "ien":
      $s_value_length = 3;
      break;
    case "men":
      $s_value_length = 1;
      break;
    case "cpe":
      $s_value_length = 1;
      break;
    default:
      $s_value_length = 0;
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
              <a class="nav-item nav-link" href="../index.php">หน้าหลัก</a> //  คำสั่ง bootstrap ชื่อ nav-link
              <a class="nav-item nav-link" href="Company.php">สถานประกอบการ</a> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ user/news.php
              <a class="nav-item nav-link" href="Doc.html"> Download เอกสารต่างๆ </a> // คำสั่ง bootstrap ชื่อ nav-link
              <a class="nav-item nav-link" href="#">ข่าวสาร</a> // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
              <a class="nav-item nav-link" href="Fac.html">ติดต่อเรา</a> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ /wedpage/user/register.php
              <?php if (isset($_SESSION ['success'])) : ?> // เงื่อนไข if ถ้า มี isset($_SESSION['id'] จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
              <a class="nav-item nav-link" href="request-company.php">ยื่นเรื่องฝึกงาน</a> // คำสั่ง bootstrap ชื่อ nav-link โดย route ไปที่ user/checkstatus.php
              <a class="nav-item nav-link" href="../index.php?logout='1'">ออกจากระบบ</a> // คำสั่ง bootstrap ชื่อ nav-link และส่งค่า logout เท่ากับ 1
              <?php endif ?> // ปิดคำสั่ง php ใน tag html 
            </div> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
          </div> // ปิดคำสั่ง bootstrap container
        </div> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ collapse navbar-collapse
      </nav> // ปิดคำสั่ง bootstrap เรียกใช้ class ชื่อ navbar
    </div> // ปิดการกำหนด div mainlink
    <div class="row"> // คำสั่งการแบ่งแถวของหน้าเว็บ
      <div class="leftcolumn"> // คำสั่งการแบ่งคอลัมน์ของหน้าเว็บ
        <?php if (!isset($_SESSION ['success'])) : ?> // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้าไม่มี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้เป็นจริง true
        <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
          <form action="infograde_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/infograde_db.php
            <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="id"> textbox สำหรับใส่รหัสประจำตัวของผู้ใช้เช่น รหัสนักศึกษา, รหัสอาจารย์
            <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password"> textbox สำหรับใส่ password 
            <dev class="card1leftcolumn"> // คำสั่ง css โดยใช้ class ชื่อ card1leftcolumn
              <button type="submit" class="btn btn-primary" name="login_user">Login</button> // ปุ่มเข้าสู่ระบบ
            </dev> // ปิดคำสั่ง css โดยใช้ class ชื่อ card1leftcolumn
          </form> // ปิดคำสั่งการส่งข้อมูล
        </div> // ปิดคำสั่ง css โดยใช้ class ชื่อ card1
        <?php else : ;?> // ถ้าเงื่อนไข if ถ้ามี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
        <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
          <a href="pageuser.php"> // คำสั่ง route จากรูปภาพไปที่ user/pageuser.php
            <img src="../../scr/img/profile.jpg" width="50%"> // กำหนดขนาดความกว้างของรูปภาพที่นำมาโชว์และให้ภาพนี้แสดงมาจาก ../scr/img/profile.jpg
          </a>
          รหัสนักศึกษา
          <p><?php echo $_SESSION['id'];?></p>
          ชื่อ
          <p><?php echo $_SESSION['f_name'],' ', $_SESSION['l_name'];?></p>
          สาขา
          <p><?php echo $_SESSION['major'];?></p>
          <div class="list-group">
            <a href="weekstamp.php"
              class="list-group-item list-group-item-action list-group-item-light">อัพโหลดรายงานประจำสัปดาห์</a> // พิมพ์ _SESSION['id']
            <a href="pageuser.php"
              class="list-group-item list-group-item-action list-group-item-light">แก้ไขข้อมูลประจำตัว</a> // พิมพ์ $_SESSION['f_name'],' ', $_SESSION['l_name']
            <a href="checkstatus.php"
              class="list-group-item list-group-item-action list-group-item-light">ตรวจสอบสถานะ</a> // พิมพ์ $_SESSION['major']
          </div> // ปิดคำสั่ง css โดยใช้ class ชื่อ card3
        </div> // ปิดคำสั่ง else
        <?php endif ?> // if ถ้า loginAction ไม่มีค่าเป็น true จะทำให้เงื่อนไขนี้ไม่เป็นจริง false
        <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card1
          <!DOCTYPE html>
          <p id="top">Link Download เอกสารต่างๆ </p>
          <ul>
            <li><a href="เอกสารแนะนำสถานที่ฝึกงาน.doc">เอกสารแนะนำสถานที่ฝึกงาน</a></li> // ลิ้งค์ Download จาก เอกสารแนะนำสถานที่ฝึกงาน.doc
            <li><a href="รายงานประจำสัปดาห์.doc">รายงานประจำสัปดาห์</a></li> // ลิ้งค์ Download จาก รายงานประจำสัปดาห์.doc
            <li><a href="แบบประเมินผลฝึกงาน.doc">แบบประเมินผลฝึกงาน</a></li> // ลิ้งค์ Download จาก แบบประเมินผลฝึกงาน.doc
          </ul>
          <p>ติดต่อเรา..</p>
          <p><b><a href="https://www.en-rsu.ac.th" target="_blank">link.//www.en-rsu.ac.th</a></b> ลิ้งค์ Download จาก แบบประเมินผลฝึกงาน.doc
            <div class="fakeimg" style="height:200px;"></div> คำสั่ง css ทำให้มีพื้นที่สูง 200px
        </div>
      </div> // ปิดคำสั่งการแบ่งคอลัมน์ของหน้าเว็บ 
      <div class="rightcolumn"> // คำสั่ง css โดยใช้ class ชื่อ rightcolumn
        <div class="card2infograde"> // คำสั่ง css โดยใช้ class ชื่อ card2_index
          หน้ายื่นเรื่อง
          <form action="../../process/infograde_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../../process/infograde_db.php
            <div class="form-group row"> // คำสั่ง css โดยใช้ class ชื่อ form-group และมีคำสั่ง คำสั่งการแบ่งแถวของหน้าเว็บ row
              <label for="inputEmail3" class="col-sm-4 col-form-label">ชั้นปีที่ </label> // คำสั่ง css โดยใช้ class ชื่อ inputEmail3 และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-sm-4 col-form-label
              <div class="col-sm-2"> // คำสั่ง css โดยใช้ คำสั่งการแบ่งคอลัมน์ col-sm-2
                <input class="form-control" id="input" name="g_class"> textbox สำหรับใส่รหัสประจำตัวของผู้ใช้เช่น รหัสนักศึกษา, รหัสอาจารย์
              </div>
            </div>
            <div class="form-group row"> // คำสั่ง css โดยใช้ class ชื่อ form-group และมีคำสั่ง คำสั่งการแบ่งแถวของหน้าเว็บ row
              <label for="inputEmail3" class="col-sm-4 col-form-label">จำนวนหน่วยกิตสะสม</label> // คำสั่ง css โดยใช้ class ชื่อ inputEmail3 และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-sm-4 col-form-label
              <div class="col-sm-2"> // คำสั่ง css คำสั่งการแบ่งคอลัมน์ col-md-2
                <input class="form-control" id="input" name="g_sumcredit">
              </div>
              <label for="inputEmail3" class="col-sm-3 col-form-label">หน่วยกิต (ไม่รวม W, F)</label> // คำสั่ง css โดยใช้ class ชื่อ inputEmail3 และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-sm-3 col-form-label
              <label for="inputEmail3" class="col-sm-2.5 col-form-label">GPA</label> // คำสั่ง css โดยใช้ class ชื่อ inputEmail3 และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-sm-2.5 col-form-label
              <div class="col-sm-2"> // คำสั่ง css คำสั่งการแบ่งคอลัมน์ col-md-2
                <input class="form-control" id="input" name="g_gpa">
              </div>
            </div>
            <div class="form-group row"> // คำสั่ง css โดยใช้ class ชื่อ form-group คำสั่งการแบ่งแถวของหน้าเว็บ
              <label for="inputEmail3" class="col-sm-4 col-form-label">จำนวนหน่วยกิตลงทะเบียนเทอม(ปัจจุบัน)</label>
              <div class="form-group col-md-2"> // คำสั่ง css โดยใช้ class ชื่อ form-group และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-md-2
                <select id="txt_r_state" name="g_term" class="form-control">  
                  <option selected>เทอม</option> // เปิดคำสั่ง css โดยมี g_term ชื่อ form-control
                  1. <option value="S">S</option> // option ของ select มีการเก็บค่า value = S
                  2. <option value="1">1</option> // option ของ select มีการเก็บค่า value = 1
                  3. <option value="2">2</option> // option ของ select มีการเก็บค่า value = 2
                </select>
              </div>
              <div class="form-group col-md-2"> // คำสั่ง css โดยใช้ class ชื่อ form-group และมีคำสั่ง คำสั่งการแบ่งคอลัมน์ col-md-2
                <select id="txt_r_state" name="g_yearTerm" class="form-control"> 
                  <option selected>ปี</option> // เปิดคำสั่ง css โดยมี selected ชื่อ form-control
                  1. <option value="58">58</option> // option ของ select มีการเก็บค่า value = 58
                  1. <option value="59">59</option> // option ของ select มีการเก็บค่า value = 59
                  1. <option value="60">60</option> // option ของ select มีการเก็บค่า value = 60
                  2. <option value="61">61</option> // option ของ select มีการเก็บค่า value = 61
                  3. <option value="62">62</option> // option ของ select มีการเก็บค่า value = 62
                  3. <option value="63">63</option> // option ของ select มีการเก็บค่า value = 63
                  3. <option value="64">64</option> // option ของ select มีการเก็บค่า value = 64
                  3. <option value="65">65</option> // option ของ select มีการเก็บค่า value = 65
                  3. <option value="66">66</option> // option ของ select มีการเก็บค่า value = 66
                </select>
              </div>
              <div class="col-sm-2"> คำสั่งการแบ่งคอลัมน์ col-md-2
                <input class="form-control" id="input" name="g_creditnow"> textbox สำหรับใส่ หน่วยกิต
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">มากกว่า <?php echo $_SESSION['course'] ?> // พิมพ์ _SESSION['course']
                หน่วยกิต</label>
            </div>
            <?php if ($s_value_length == '3') { ?>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s1_name" class="form-control">
                  <option selected>รายวิชา</option>
                  <?php
              $query = "SELECT * FROM subject WHERE s_key LIKE '$major'";           
              $result = mysqli_query($con, $query);
              while($row = $result->fetch_assoc()) { ?>
                  <option><?php echo $row['s_value']?>
                  </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s1_term" class="form-control">
                  <option selected>เทอม</option>
                  1. <option>S</option>
                  2. <option>1</option> 
                  3. <option>2</option> 
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s1_year" class="form-control">
                  <option selected>ปี</option>
                  1. <option>57</option>
                  1. <option>58</option>
                  1. <option>59</option>
                  1. <option>60</option>
                  2. <option>61</option> 
                  3. <option>62</option>
                  3. <option>63</option>
                  3. <option>64</option>
                  3. <option>65</option>
                  3. <option>66</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s1_grade" class="form-control">
                  <option selected>เกรด</option>
                  1. <option>A</option>
                  2. <option>B+</option> 
                  3. <option>B</option> 
                  4. <option>C+</option> 
                  5. <option>C</option> 
                  6. <option>D+</option> 
                  7. <option>D</option> 
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s2_name" class="form-control">
                  <option selected>รายวิชา</option>
                  <?php
                    $query = "SELECT * FROM subject WHERE s_key LIKE '$major'";
                    $result = mysqli_query($con, $query);
                    while($row = $result->fetch_assoc()) { ?>
                  <option><?php echo $row['s_value']?>
                  </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s2_term" class="form-control">
                  <option selected>เทอม</option>
                  1. <option>S</option>
                  2. <option>1</option> 
                  3. <option>2</option> 
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s2_year" class="form-control">
                  <option selected>ปี</option>
                  1. <option>57</option>
                  1. <option>58</option>
                  1. <option>59</option>
                  1. <option>60</option>
                  2. <option>61</option> 
                  3. <option>62</option>
                  3. <option>63</option>
                  3. <option>64</option>
                  3. <option>65</option>
                  3. <option>66</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s2_grade" class="form-control">
                  <option selected>เกรด</option>
                  1. <option>A</option>
                  2. <option>B+</option> 
                  3. <option>B</option> 
                  4. <option>C+</option> 
                  5. <option>C</option> 
                  6. <option>D+</option> 
                  7. <option>D</option> 
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s3_name" class="form-control">
                  <option selected>รายวิชา</option>
                  <?php
                    $query = "SELECT * FROM subject WHERE s_key LIKE '$major'";
                    $result = mysqli_query($con, $query);
                    while($row = $result->fetch_assoc()) { ?>
                  <option><?php echo $row['s_value']?>
                  </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s3_term" class="form-control">
                  <option selected>เทอม</option>
                  1. <option>S</option>
                  2. <option>1</option> 
                  3. <option>2</option> 
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s3_year" class="form-control">
                  <option selected>ปี</option>
                  1. <option>57</option>
                  1. <option>58</option>
                  1. <option>59</option>
                  1. <option>60</option>
                  2. <option>61</option> 
                  3. <option>62</option>
                  3. <option>63</option>
                  3. <option>64</option>
                  3. <option>65</option>
                  3. <option>66</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="txt_r_state" name="s3_grade" class="form-control">
                  <option selected>เกรด</option>
                  1. <option>A</option>
                  2. <option>B+</option> 
                  3. <option>B</option> 
                  4. <option>C+</option> 
                  5. <option>C</option> 
                  6. <option>D+</option> 
                  7. <option>D</option> 
                </select>
              </div>
            </div>
        </div>
        <button type="submit" name="g_save" value="Save3" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
    </div>
    <?php } else if($s_value_length == '2') {?>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s1_name" class="form-control">
          <option selected>รายวิชา</option>
          <?php
              $query = "SELECT * FROM subject WHERE s_key LIKE '$major'";
              $result = mysqli_query($con, $query);
              while($row = $result->fetch_assoc()) { ?>
          <option><?php echo $row['s_value']?>
          </option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s1_term" class="form-control">
          <option selected>เทอม</option>
          1. <option>S</option>
          2. <option>1</option> 
          3. <option>2</option> 
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s1_year" class="form-control">
          <option selected>ปี</option>

          1. <option>57</option>
          1. <option>58</option>
          1. <option>59</option>
          1. <option>60</option>
          2. <option>61</option> 
          3. <option>62</option>
          3. <option>63</option>
          3. <option>64</option>
          3. <option>65</option>
          3. <option>66</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s1_grade" class="form-control">
          <option selected>เกรต</option>
          1. <option>A</option>
          2. <option>B+</option> 
          3. <option>B</option> 
          4. <option>C+</option> 
          5. <option>C</option> 
          6. <option>D+</option> 
          7. <option>D</option> 
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s2_name" class="form-control">
          <option selected>รายวิชา</option>
          <?php
              $query = "SELECT * FROM subject WHERE s_key LIKE '$major'";
              $result = mysqli_query($con, $query);
              while($row = $result->fetch_assoc()) { ?>
          <option><?php echo $row['s_value']?>
          </option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s2_term" class="form-control">
          <option selected>เทอม</option>
          1. <option>S</option>
          2. <option>1</option> 
          3. <option>2</option> 
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s2_year" class="form-control">
          <option selected>ปี</option>
          1. <option>57</option>
          1. <option>58</option>
          1. <option>59</option>
          1. <option>60</option>
          2. <option>61</option> 
          3. <option>62</option>
          3. <option>63</option>
          3. <option>64</option>
          3. <option>65</option>
          3. <option>66</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s2_grade" class="form-control">
          <option selected>เกรดดดต</option>
          1. <option>A</option>
          2. <option>B+</option> 
          3. <option>B</option> 
          4. <option>C+</option> 
          5. <option>C</option> 
          6. <option>D+</option> 
          7. <option>D</option> 
        </select>
      </div>
      <div class="form-group">
        <button type="submit" name="g_save" value="Save2" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
    </div>
    <?php } else if($s_value_length == '1') {?>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s1_name" class="form-control">
          <option selected>รายวิชา</option>
          <?php
              $query = "SELECT * FROM subject WHERE s_key LIKE '$major'";
              $result = mysqli_query($con, $query);
              while($row = $result->fetch_assoc()) { ?>
          <option value=<?php echo $row['s_value']?>><?php echo $row['s_value']?>
          </option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s1_term" class="form-control">
          <option selected>เทอม</option>
          1. <option value="S">S</option>
          2. <option value="1">1</option> 
          3. <option value="2">2</option> 
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s1_year" class="form-control">
          <option selected>ปี</option>
          1. <option value="58">58</option>
          1. <option value="59">59</option>
          1. <option value="60">60</option>
          2. <option value="61">61</option> 
          3. <option value="62">62</option>
          3. <option value="63">63</option>
          3. <option value="64">64</option>
          3. <option value="65">65</option>
          3. <option value="66">66</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="txt_r_state" name="s1_grade" class="form-control">
          <option selected>เกรต</option>
          1. <option value="A">A</option>
          2. <option value="B+">B+</option> 
          3. <option value="B">B</option> 
          4. <option value="C+">C+</option> 
          5. <option value="C">C</option> 
          6. <option value="D+">D+</option> 
          7. <option value="D">D</option> 
        </select>
      </div>
      <div class="form-group">
        <button type="submit" name="g_save" value="Save1" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
    </div>
    <?php } else {?>
    <div class="form-group">
      <button type="submit" name="g_save" value="Save0" class="btn btn-primary">บันทึกข้อมูล</button>
    </div>
    <?php } ?>
  </div>
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
  <?php 
if (isset($_SESSION ['success'])) {
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