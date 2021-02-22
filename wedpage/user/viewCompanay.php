<?php  // เปิดหัวประกาศคำสั่งphp
session_start();   // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น
include('../../configure/connect.php');   // include คือการเรียกใช้ script จาก ../configure/connect.php

if (!isset($_SESSION['id'])) {   // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true
  $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";  // การเก็บค่าไวใน _SESSION ในตัวแปล msg
}

if (isset($_GET['logout'])) {  // เงื่อนไข if ถ้าหากพบ การออกจากระบบจะทำให้เงื่อนไขนี้เป็นจริง true
  session_destroy();  // คำสั่งการยกเลิกข้อมูลทั้งหมดที่อยู่ใน session
  unset($_SESSION['id']);  // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่าใดๆ
  header('location: index.php'); // การ route ไปยัง index.php
}

$sql = "SELECT DISTINCT * 
            From company 
            WHERE c_id = ?";

if ($stmt = mysqli_prepare($con, $sql)) {
  mysqli_stmt_bind_param($stmt, "i", $param_id);

  if ($_GET['id']) {
    $param_id = trim($_GET['id']);

    if (mysqli_stmt_execute($stmt)) {
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $name = $row['c_id'];

        // print_r($row);
      } else {
        echo "else";
        // header("locatino: index.")
      }
    }
  } else {
    header('location: ../index.php');
  }
}




?>

<html lang="th"> //กำหนดภาษาของหน้าเว็บไซต์
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> //กำหนด stylesheet css ของหน้าเว็บไซต์
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> //การเรียกใช้งาน script jquery ของหน้าเว็บไซต์
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> //การเรียกใช้งาน bootstrap css framework ของหน้าเว็บไซต์
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css"></script>

<head>
  <meta charset="utf-8" /> // กำหนดรูปแบบภาษาไทย
  <title> ระบบฐานข้อมูลนักศึกษาฝึกงาน </title>

  <link rel="stylesheet" href="../../scr/css/styles.css">
</head>


<body>
  <div class="container">
    <img src="../../scr/img/Banner.png" width="100%">
    <div id="mainlink">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="container">


            <div class="navbar-nav">
              <a class="nav-item nav-link" href="../afterindex.php">หน้าหลัก</a>
              <a class="nav-item nav-link" href="Company.php">สถานประกอบการ</a>
              <a class="nav-item nav-link" href="Doc.html"> Download เอกสารต่างๆ </a>
              <a class="nav-item nav-link" href="#">ข่าวสาร</a>
              <a class="nav-item nav-link" href="Fac.html">ติดต่อเรา</a>

              <?php if (isset($_SESSION['success'])) : ?>
                <a class="nav-item nav-link" href="user/request-company.php">ยื่นเรื่องฝึกงาน</a>
                <a class="nav-item nav-link" href="index.php?logout='1'">ออกจากระบบ</a>
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
            <form action="login_db.php" method="post">
              <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="id">
              <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password">

              <dev class="card1leftcolumn">
                <button type="submit" class="btn btn-primary" name="login_user">Login</button>
                <!-- <button type="submit" class="btn btn-primary" name="login" value="">Primary</button> -->
              </dev>
            </form>
          </div>
        <?php else :; ?>
          <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
            <a href="pageuser.php">
              <img src="./scr/img/profile.jpg" width="50%">
            </a>

            รหัสนักศึกษา
            <p><?php echo $_SESSION['id']; ?></p>
            ชื่อ
            <p><?php echo $_SESSION['f_name'], ' ', $_SESSION['l_name']; ?></p>
            สาขา
            <p><?php echo $_SESSION['id']; ?></p>
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

        <div class="card2" style="height:900px;">

          <div class="row row-cols-1 row-cols-md-3">
          </div>
          <!-- <div class="col mb-4">
    <div class="card">
      <img src="../scr/img/01.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h6 class="card-title">คอมพิวเตอร์</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../scr/img/02.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h6 class="card-title">ซ่อมบำรุงอากาศยาน</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../scr/img/03.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h6 class="card-title">ยานยนต์</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../scr/img/04.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h6 class="card-title">Card title</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../scr/img/05.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h6 class="card-title">Card title</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../scr/img/06.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h6 class="card-title">Card title</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../scr/img/07.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h6 class="card-title">Card title</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
    <img src="../scr/img/08.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h6 class="card-title">Card title</h6>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
</div> -->







          <!-- <div id="table_row_filter" class="dataTables_filter">
Search:
<input type="search" class="form-control input-sm" placeholder aria-controls="table_row">
</div> -->

          <form action="../../process/editCompany_db.php" method="post" style="margin-left:90px">

            <div class="form-group" style="width: 600px">
              <label for="exampleFormControlInput1" bootstrap style="margin-top: 50px "></label>
              <!-- <input type="text" class="form-control" id="exampleFormControlInput1" name="txtc_name" placeholder=""> -->
              ข้อมูลสถานประกอบการ : <input type="text" id="txtc_name" name="txtc_name" value='<?php echo $row['c_name'] ?>'>
            </div>

            <div class="form-group" style="width: 600px">
              <label for="exampleFormControlTextarea1">ข้อมูลที่อยู่</label>
              <input type="text" id="txtc_address" name="txtc_address" style="height: 200px" value='<?php echo $row['c_address'] ?>'>
              <!-- <textarea class="form-control" id="exampleFormControlTextarea1" name="txtc_address" rows="3" ></textarea> -->
            </div>
            <div class="form-group" style="width: 600px">
              <label for="exampleFormControlTextarea1">ข้อมูลเพิ่มเติม</label>
              <input type="text" id="txtc_detail" name="txtc_detail" style="height: 200px" value='<?php echo $row['c_detail'] ?>'>
            </div>
            <input type='hidden' id='c_id' name='txtc_id' value='<?php echo $row['c_id'] ?>'>
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
  <!-- //// -->
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

<script>
  $(document).ready(function() {
    $('#table_row').DataTable();
  });
</script>