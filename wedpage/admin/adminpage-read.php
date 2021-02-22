<?php // เปิดหัวประกาศคำสั่งphp
  session_start(); // ประกาศสร้าง session เพื่อเก็บข้อมูลหรือนำ session ไปใช้งานในหน้า page อื่น

  if (!isset($_SESSION['id'])) { // เงื่อนไข if ถ้า ไม่มี !isset($_SESSION['id'] จะทำให้เงื่อนไขนี้เป็นจริง true 
    $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
  }

  if (isset($_GET['logout'])) { // เงื่อนไข if ถ้า มี $_GET['logout'] จะทำให้เงื่อนไขนี้เป็นจริง true
    session_destroy();
    unset($_SESSION['id']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่า $_SESSION['id']
    unset($_SESSION['type']); // คำสั่งทำให้ $_SESSION ไม่มีการเก็บค่า $_SESSION['type']
    header('location: index.php'); // การ route ไปยัง index.php
  }

  if($_GET['id']){
    include('../../configure/connect.php');
    $sql = "SELECT DISTINCT * 
            From users 
            inner join requestcompany 
            on users.id = requestcompany.r_sid 
            inner join grade
            on requestcompany.r_sid = grade.g_id
            WHERE users.id = ?";

    if($stmt = mysqli_prepare($con, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $param_id);

      $param_id = trim($_GET['id']);

      if(mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);

          $name = $row['id'];

          // print_r($row);
        } else {
          echo "else";
          // header("locatino: index.")
        }
      }
    }
  }


      print_r($_SESSION);


      // require_once __DIR__ . '/vendor/autoload.php';

      // $mpdf = new \Mpdf\Mpdf();
      // ob_start();
  
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
    <div class="row">// คำสั่งการแบ่งแถวของหน้าเว็บ
      <div class="leftcolumn">// คำสั่งการแบ่งคอลัมน์ของหน้าเว็บ          
        <?php if (!isset($_SESSION ['success'])) { // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้าไม่มี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้เป็นจริง true
        "<div class='card1'>";
          "<form action='login_db.php' method='post'>"; // เป็นคำสั่ง php ในการส่งข้อมูลรูปแบบ post ไปที่ login_db.php
            echo "<input type='text' id='txt_id' class='fadeIn second' name='txt_id' placeholder='id'>";
            echo "<input type='text' id='txt_password' class='fadeIn third' name='txt_password' placeholder='password'>";
            "<dev class='card1leftcolumn'>";
            echo "<button type='submit' class='btn btn-primary' name = 'login_user'> . Login . </button>";
            "</dev>";
          "</form>";       
        "</div>";
        } else { ?> // เปิดคำสั่ง php ใน tag html เงื่อนไข if ถ้าไม่มี isset($_SESSION ['success']) จะทำให้เงื่อนไขนี้เป็นจริง false
          <div class="card1"> // คำสั่ง css โดยใช้ class ชื่อ card1
            <a href="adminpage.php">
              <img src="../../scr/img/adminproflie.jpg" width="40%">
            </a>
            ชื่อ Admin
            <p><?php echo $_SESSION['f_name'];?></p> // พิมพ์ _SESSION['f_name']
            สาขา
            <p><?php echo $_SESSION['major'];?></p>
            <p><?php echo $_SESSION['id'];?></p>
          </div>
        <?php } ?>
      <div class="card3"> // คำสั่ง css โดยใช้ class ชื่อ card3
        <div class="btn-group-vertical">
          แผงควบคุม
        </div>  
        <div class="list-group">
        <?php
          if ($_SESSION['major'] == "0") { // เงื่อนไข if ถ้า $_SESSION['major'] มีค่าเท่ากับ "0" จะทำให้เงื่อนไขนี้เป็นจริง true
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
          <div class="form-group col-md-3">
          </div>
          <div class="form-group col-md-">
            ใบอนุมัติฝึกงานสาขาวิชา วิศวกรรมคอมพิวเตอร์(สำหรับ นศ.3ปี)
          </div>
        </div>
        <form action="../../process/admin-update-status_db.php" method="post"> // คำสั่งการส่งข้อมูลด้วยวิธีการ post ไปยัง ../process/admin-update-status_db.php
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
              <div class="form-group col-md-4">
                <br>
                <label for="inputEmail4">ชื่อ-สกุล (นาย/นางสาว)</label>
                <?php echo "<br>" . $row['f_name'] ."  ". $row['l_name'] ; ?> 
              </div>
              <div class="form-group col-md-4">
                <br>
                <label for="inputPassword4" type="text" id="txt_id" name="txt_id">รหัสนักศึกษา</label>
                <?php echo "<br>" . $row['id'] ; ?> 
              </div>
              <div class="form-group col-md-4">
                <br>
                <label for="inputPassword4">ชั้นปีที่</label>
                <?php echo "<br>" . $row['g_class'] ; ?> 
              </div>
            </div>
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
                <div class="form-group col-md-4">
                  <br>
                  <label for="inputEmail4">จำนวนหน่วยกิตสะสม (ถึงก่อนเทอมปัจจุบัน)</label> 
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">หน่วยกิต (ไม่รวม W,F)</label>
                  <?php echo "<br>" . $row['g_credit'] ; ?> 
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">GPA</label>
                  <?php echo "<br>" . $row['g_gpa'] ; ?> 
                </div>
            </div>
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
                <div class="form-group col-md-4">
                  <label for="inputEmail4">จำนวนหน่วยกิตลงทะเบียนเทอมปัจจุบัน</label>
                  <?php echo "<br>" . $row['g_termnow'] . '/' . $row['g_yearnow'] ; ?>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">หน่วยกิต (ต้องไม่ต่ำกว่า 70 หน่วยกิต)</label>
                  <?php echo "<br>" . $row['g_creditnow'] ; ?> 
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">รายวิชาบังคัยก่อน</th>
                    <th scope="col">เทอม/ปีการศึกษา</th>
                    <th scope="col">เกรดที่ได้</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($row['g_subject3'] !== '') {
                    echo "<td>" . $row['g_subject3'] . "</td>"; 
                        echo "<td>" . $row['g_term3'] . '/' . $row['g_year3'] . "</td>"; 
                        echo "<td>" . $row['g_gpa3'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                      echo "<td>" . $row['g_subject2'] . "</td>"; 
                      echo "<td>" . $row['g_term2'] . '/' . $row['g_year2'] . "</td>"; 
                      echo "<td>" . $row['g_gpa2'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                      echo "<td>" . $row['g_subject1'] . "</td>"; 
                      echo "<td>" . $row['g_term1'] . '/' . $row['g_year1'] . "</td>"; 
                      echo "<td>" . $row['g_gpa1'] . "</td>"; 
                  } else if ($row['g_subject2'] !== '') {
                      echo "</tr>";
                      echo "<tr>";
                        echo "<td>" . $row['g_subject2'] . "</td>"; 
                        echo "<td>" . $row['g_term2'] . '/' . $row['g_year2'] . "</td>"; 
                        echo "<td>" . $row['g_gpa2'] . "</td>";
                      echo "</tr>";
                      echo "<tr>";
                        echo "<td>" . $row['g_subject1'] . "</td>"; 
                        echo "<td>" . $row['g_term1'] . '/' . $row['g_year1'] . "</td>"; 
                        echo "<td>" . $row['g_gpa1'] . "</td>";  
                  } else if ($row['g_subject1'] !== '') {
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>" . $row['g_subject1'] . "</td>"; 
                        echo "<td>" . $row['g_term1'] . '/' . $row['g_year1'] . "</td>"; 
                        echo "<td>" . $row['g_gpa1'] . "</td>"; 
                  }
                  ?>
                </tbody>
            </table>
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
              <div class="form-group col-md-4">
                <label for="inputEmail4">ชื่อหน่วยงาน/บริษัท ที่ประสงค์จะฝึกงาน</label>
                <?php echo "<br>" . $row['r_company'] ; ?>
              </div>
            </div>
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
              <div class="form-group col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    สำนักงานวิทยาลัยวิศวกรรมศาตร์จัดหาให้
                  </label>
                </div>
              </div>
              <div class="form-group col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    นักศึกษาจัดหาเอง
                  </label>
                </div>
              </div>
            </div>
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
              <div class="form-group col-md-4">
                <label for="inputEmail4">ตำแหน่งหรือชื่อบุคคลที่ติดต่อ</label>
                <?php echo "<br>" . $row['r_about'] ; ?> 
              </div>

            </div>
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            <div class="form-group col-md-6">
                <label for="inputEmail4">ที่อยู่</label>
                <?php echo "<br>" . $row['r_address'] ; ?> 
              </div>
              <div class="form-group col-md-4">
                <label for="inputEmail4">เบอร์โทรติดต่อ</label>
                <?php echo "<br>" . $row['r_tel'] ; ?> 
              </div>
            </div>
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            </div>
             <div class="form-row"> // คำสั่ง css โดยใช้ class ชื่อ form-row
            </div>
            <!-- <div class="form-row">
              <div class="form-group col-md-1">
              </div>    
              <div class="form-group col-md-4">
                <div class="card" style="width: 18rem;">
                  <img src="../../scr/img/plue.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">ลงลายเซ็นรับรอง</h5>
                    <p class="card-text">คำอธิบายบราๆๆๆ...................................<br>.......................................<br>.......................................<br>.......................................</p>
                    <a href="#" class="btn btn-primary">บันทึก</a>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-2">
              </div> 
              <div class="form-group col-md-4">
                <div class="card" style="width: 18rem;">
                  <img src="../../scr/img/plue.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">ลงลายเซ็นรับรอง</h5>
                    <p class="card-text">คำอธิบายบราๆๆๆ...................................<br>.......................................<br>.......................................<br>.......................................</p>
                    <a href="#" class="btn btn-primary">บันทึก</a>
                  </div>
                </div>
              </div>
            </div>
            <div class='form-row'  style='margin:20px;'> -->
          <?php 
          // if ($_SESSION['major'] == "0") {
            echo "<div class='form-row'>";
            echo "<div class='form-group col-md-2'>";
            echo  "<input type='hidden' id='txt_id' name='id' value='$row[id]'>";
            echo  "<input type='hidden' id='txt_id' name='_id' value='$_SESSION[id]'>";
            echo  "<button type='submit' class='btn btn-success' name='update-status' value='pass'> อนุมัติ </button>";
            echo "</div>";
            echo "<div class='form-group col-md-2'>";
            echo  "<button type='submit' class='btn btn-danger' name='update-status' value='false' > ไม่อนุมัติ </button>";
            echo "</div>";
            echo "<div class='form-group col-md-3'>";
            echo  "<button type='submit' class='btn btn-warning' name='update-status' value='onFixg' >  ให้กลับไปแก้ไขข้อมูลผลการเรียน </button>";
            echo "</div>";
            echo "<div class='form-group col-md-4'>";
            echo  "<button type='submit' class='btn btn-warning' name='update-status' value='onFixc' >  ให้กลับไปแก้ไขข้อมูลผู้ดูแลฝึกงาน </button>";
            echo "</div>";
            // }

            if ($_SESSION['major'] == "0") { // เงื่อนไข if ถ้า $_SESSION['major'] มีค่าเท่ากับ "0" จะทำให้เงื่อนไขนี้เป็นจริง true
              echo "<a href='adminpage-print-mailofher.php?id=" . $row['id'] . "' title='View' class='btn btn-link'>ออกใบขอความอนุเคราะห์</a>";
            }
          ?>
          </div>
        </form>
      </div>
    </div>
    <div class="conteiner">
      <div class="footer">
        <div class="fakeimg" >  
        </div>
      </div>
    </div>
  </body>
</html>



