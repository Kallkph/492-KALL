<?php
  session_start();

  if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['type']);
    header('location: index.php');
  }

  if($_GET['id']){
    include('../../configure/connect.php');
    $sql = "SELECT DISTINCT * 
            From users 
            inner join requestcompany 
            on users.id = requestcompany.r_id 
            inner join grade
            on requestcompany.r_id = grade.g_id
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


      // print_r($_SESSION);


      // require_once __DIR__ . '/vendor/autoload.php';

      // $mpdf = new \Mpdf\Mpdf();
      // ob_start();
  
?>

<html lang="th">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <head>
    <meta charset="utf-8" />
    <title> ระบบฐานข้อมูลนักศึกษาฝึกงาน </title>
    <!-- <link rel="stylesheet" href="../../scr/css/styles.css"> -->
    <link rel="stylesheet" type="test/css" href="../../scr/css/print.css" media="print">
  </head>
  <body>
    <!-- <nav class="navbar navbar-light bg-light"> -->
      <!-- <a class="navbar-brand">หน้าเพจสำหรับ ADMIN</a> -->
      <!-- <form class="form-inline">
        ?php if (!isset($_SESSION)) : ?>
      <a class="nav-item nav-link" href="register.php">สมัครสมาชิก</a>
        ?php else : ?>
      <a class="nav-item nav-link" href="../index.php?logout='1'">ออกจากระบบ</a>
        ?php endif ?>
      </form> -->
    <!-- </nav> -->
    <div class="row">
      <!-- <div class="leftcolumn">
        ?php if (!isset($_SESSION ['success'])) { 
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
          <div class="card1">
            <a href="adminpage.php">
              <img src="../../scr/img/adminproflie.jpg" width="40%">
            </a>
            ชื่อ Admin
            <p>?php echo $_SESSION['f_name'];?></p>
            สาขา
            <p>?php echo $_SESSION['major'];?></p>
            <p>?php echo $_SESSION['id'];?></p>
          </div>
        ?php } ?>
      <div class="card3">
        <div class="btn-group-vertical">
          แผงควบคุม
        </div>  
        <div class="list-group">
        ?php
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
    </div> -->
    <div class="rightcolumn">            
      <div class="card2-from-admin-read" style='padding:0px';>
      <div class="form-row">
      <a href="adminpage.php">
              <img src="../../scr/img/rsuhead.jpg" width="100%" style='padding: 10px;'>
            </a>
      </div>
        <div class="form-row">
          <div class="form-group col-md-3">
          </div>
          <div class="form-group col-md-5" style='margin-top:60px';>
          </div>
        </div>
        <form action="../../process/admin-update-status_db.php" method="post">
        <div class="form-row">
          <div class="form-group col-md-1">
          </div>
          <div class="form-group col-md-3">
            ที่ วศ.130/2562
          </div>
          <div class="form-group col-md-4">
          </div>
          <div class="form-group col-md-3">
            วิทยาลัยวิศวกรรมศาสตร์
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
        </div>
          <div class="form-group col-md-2">
          <input class="form-control" id="input" name="g_class" style='border: none'; width="10px" placeholder="กรอก">
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-1">
        </div>
          <div class="form-group"  style='margin-right: 20px;'>
            เรื่อง
          </div>
          <div class="form-group col-md-4">
            ขอส่งตัวนักศึกษาเข้ารับการฝึกงาน
          </div>
          
        </div>
        <div class="form-row">
        <div class="form-group col-md-1">
        </div>
          <div class="form-group"  style='margin-right: 20px; margin-top:25px';>
            เรียน
          </div>
          <div class="form-group col-md-2" style='margin-top:20px';>
          <input class="form-control" id="input" name="g_class" style='border: none'; width="10px" placeholder="กรอก">
          </div>
          <div class="form-group col-md-4" >
          <?php echo "<br>" . $row['r_company'] ; ?> 
          </div>
        </div>
        <div class="form-row" style='margin-top:0px'>
        <div class="form-group col-md-1">
        </div>
        สิ่งที่ส่งมาด้วย    ใบตอบรับ
        </div>
        <div class="form-row" style='margin-top:40px'>
        <div class="form-group col-md-2">
        </div>
          <div class="form-group";>
          เนื่องด้วย   วิทยาลัยวิศวกรรมศาสตร์ มหาวิทยาลัยรังสิต  มีความจำเป็นในการจัดหาสถานที่ฝึกงาน  ให้แก่นักศึกษาชั้นปีที่ 4  ขึ้นไป โดยมีช่วงเวลาฝึกงานระหว่าง
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-1">
        </div>
          <div class="form-group";>
          วันที่   1  มิถุนายน  – 31  กรกฎาคม  2563  การฝึกงานถือเป็นวิชาหนึ่งในหลักสูตรของวิทยาลัยฯ ฯ   เพื่อเปิดโอกาสให้นักศึกษา หาประสบการณ์และทักษะในการทำงาน เตรียมตัวที่จะเป็นวิศวกร
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-1">
        </div>
          <div class="form-group";>
          และนักเทคโนโลยีที่ดีต่อไป    วิทยาลัยฯ  ได้พิจารณาเห็นว่าองค์กรของท่านดำเนินกิจการ ทางด้านวิศวกรรมและเทคโนโลยีที่มีศักยภาพ   วิทยาลัยฯ จึงใคร่ขอความอนุเคราะห์พิจารณานักศึกษา
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-1">
        </div>
          <div class="form-group";>
          เพื่อเข้ารับการฝึกงาน ดังนี้
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-1">
        </div>
          <!-- <div class="form-group" style='margin-right:5px;'>
            วันที่
          </div> -->
          <div class="form-group col-md-1" style='margin-top:-10px';>
          <!-- <input class="form-control" id="input" name="g_class"  width="10px" width="10px" style='border: none'; width="10px" placeholder="กรอก"> -->
          </div>
          <!-- ถึง -->
          <div class="form-group col-md-1" style='margin-top:-10px';>
          <!-- <input class="form-control" id="input" name="g_class"  width="10px" style='border: none'; width="10px" placeholder="กรอก"> -->
          </div>
          <div class="form-group" style='margin-right:5px;'>
          <!-- พ.ศ. -->
          </div>
          <div class="form-group col-md-1" style='margin-top:-10px';>
          <!-- <input class="form-control" id="input" name="g_class"  width="10px" style='border: none'; width="10px" placeholder="กรอก"> -->
          </div>
          <div class="form-group col-md-1" style='margin-top:-10px';>
          <!-- <input class="form-control" id="input" name="g_class"> -->
          </div>
          <div class="form-group" style='margin-right:5px;'>
            
          </div>
          <div class="form-group col-md-1" style='margin-top:-10px';>
          <input class="form-control" style='border: none'; id="input" name="g_class"  width="10px" placeholder="">
          </div>
        </div>
            <div class="form-row" style='margin-top:0px';>
              <div class="form-group col-md-2">
              </div>
              <div class="form-group" style='margin-right:10px;'>
              <?php echo $row['name_titles']; ?> 
              </div>
              <div class="form-group" style='margin-right:30px;'>
              <?php echo $row['f_name']; ?> 
              </div>
              <div class="form-group" style='margin-right:30px;'>
              <?php echo $row['l_name']; ?> 
              </div>
              <div class="form-group" style='margin-right:30px;'>
              รหัส
              </div>
              <div class="form-group" style='margin-right:30px;'>
              <?php echo $row['id']; ?> 
              </div>
              <div class="form-group" style='margin-right:30px;'>
              ภาควิชา 
              </div>
        </div>
        
        <div class="form-row" style='margin-top:40px'>
        <div class="form-group col-md-2">
        </div>
          <div class="form-group";>
          อนึ่ง หากท่านสามารถรับนักศึกษาเข้าฝึกงานได้ หรือขัดข้องประการใด  โปรดแจ้งกลับตามเอกสารใบตอบรับ
ที่แนบมา  จักเป็นพระคุณอย่างสูง

          </div>
        </div>
        <div class="form-row" style='margin-top:40px'>
        <div class="form-group col-md-2">
        </div>
          <div class="form-group";>
          วิทยาลัยวิศวกรรมศาสตร์    มหาวิทยาลัยรังสิต    หวังในความอนุเคราะห์จากท่านเป็นอย่างยิ่งและขอขอบพระคุณ
มา  ณ โอกาสนี้  


          </div>
        </div>


              <div class="form-row" style='margin-top:50px';>
        <div class="form-group col-md-1" style='margin-right:80px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:30px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:30px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:30px;'>
        จึงเรียนมาเพื่อโปรดทราบ
              </div>
              </div>

              <div class="form-row" style='margin-top:50px';>
              <div class="form-group col-md-1" style='margin-right:80px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:30px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:30px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:60px;'>
              <div style='margin-right:60px;'>
        จึงเรียนมาเพื่อโปรดทราบ
        </div>
              </div>
              </div>

              <div class="form-row" style='margin-top:0px';>
              <div class="form-group col-md-1" style='margin-right:80px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:30px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:20px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:10px;'>
              <input class="form-control" style='border: none'; id="input" name="g_class"  width="10px" placeholder="ชื่อ นาม-สกุล">
              </div>
              </div>

              
              <div class="form-row" style='margin-top:0px';>
              <div class="form-group col-md-1" style='margin-right:80px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:30px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:20px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:10px;'>
              <input class="form-control" style='border: none'; id="input" name="g_class"  width="10px" placeholder="ตำแหน่ง">
              </div>
              </div>


              <div class="form-row" style='margin-top:300px ';>
              <div class="form-group col-md-1" style='margin-right:ถ0px;'>
              </div>
              <div class="form-group col-md--" style='margin-right:30px;'>
              สำนักงานวิทยาลัยวิศวกรรมศาสตร์
              </div>
              <div class="form-group col-md-2" style='margin-right:20px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:10px;'>
              </div>
              </div>

              <div class="form-row" style='margin-top:0px';>
              <div class="form-group col-md-1" style='margin-right:ถ0px;'>
              </div>
              <div class="form-group col-md--" style='margin-right:30px;'>
              โทรศัพท์ 0-29972222-30 ต่อ 3221 โทรสาร 02-9972222-30 ต่อ 3230
              </div>
              <div class="form-group col-md-2" style='margin-right:20px;'>
              </div>
              <div class="form-group col-md-2" style='margin-right:10px;'>
              </div>
              </div>

            <!-- <div class="form-row">
              <div class="form-group col-md-4">
                <br>
                <label for="inputEmail4">ชื่อ-สกุล (นาย/นางสาว)</label>
                ?php echo "<br>" . $row['f_name'] ."  ". $row['l_name'] ; ?> 
              </div>
              <div class="form-group col-md-4">
                <br>
                <label for="inputPassword4" type="text" id="txt_id" name="txt_id">รหัสนักศึกษา</label>
                ?php echo "<br>" . $row['id'] ; ?> 
              </div>
              <div class="form-group col-md-4">
                <br>
                <label for="inputPassword4">ชั้นปีที่</label>
                ?php echo "<br>" . $row['g_class'] ; ?> 
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <br>
                  <label for="inputEmail4">จำนวนหน่วยกิตสะสม (ถึงก่อนเทอมปัจจุบัน)</label> 
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">หน่วยกิต (ไม่รวม W,F)</label>
                  ?php echo "<br>" . $row['g_credit'] ; ?> 
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">GPA</label>
                  ?php echo "<br>" . $row['g_gpa'] ; ?> 
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputEmail4">จำนวนหน่วยกิตลงทะเบียนเทอมปัจจุบัน</label>
                  ?php echo "<br>" . $row['g_termnow'] . '/' . $row['g_yearnow'] ; ?>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputPassword4">หน่วยกิต (ต้องไม่ต่ำกว่า 70 หน่วยกิต)</label>
                  ?php echo "<br>" . $row['g_creditnow'] ; ?> 
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
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">ชื่อหน่วยงาน/บริษัท ที่ประสงค์จะฝึกงาน</label>
                ?php echo "<br>" . $row['r_company'] ; ?>
              </div>
            </div>
            <div class="form-row">
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
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">ตำแหน่งหรือชื่อบุคคลที่ติดต่อ</label>
                ?php echo "<br>" . $row['r_about'] ; ?> 
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputEmail4">เลขที่</label>
                ?php echo "<br>" . $row['r_address'] ; ?> 
              </div>
              <div class="form-group col-md-2">
                <label for="inputPassword4">หมู่</label>
                ?php echo "<br>" . $row['r_mu'] ; ?> 
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">ถนน</label>
                ?php echo "<br>" . $row['r_road'] ; ?> 
              </div>
              <div class="form-group col-md-3">
                <label for="inputPassword4">แขวง/ตำบล</label>
                ?php echo "<br>" . $row['r_address2'] ; ?> 
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">เขต/อำเภอ</label>
                ?php echo "<br>" . $row['r_city']  ; ?> 
              </div>
              <div class="form-group col-md-4">
                <label for="inputEmail4">จังหวัด</label>
                ?php echo "<br>" . $row['r_state'] ; ?> 
              </div>
              <div class="form-group col-md-4">
                <label for="inputEmail4">รหัสไปรษณีย์</label>
                ?php echo "<br>" . $row['r_zip'] ; ?> 
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputEmail4">โทรศัพท์</label>
                ?php echo "<br>" . $row['r_phone']  ; ?> 
              </div>
              <div class="form-group col-md-4">
                <label for="inputEmail4">โทรสาร</label>
                ?php echo "<br>" . $row['r_fax'] ; ?> 
              </div>
            </div> -->
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
          <!-- ?php 
          // if ($_SESSION['major'] == "0") {
            echo "<div class='form-row'>";
            echo "<div class='form-group col-md-4'>";
            echo  "<input type='hidden' id='txt_id' name='id' value='$row[id]'>";
            echo  "<input type='hidden' id='txt_id' name='_id' value='$_SESSION[id]'>";
            echo  "<button type='submit' class='btn btn-success' name='update-status' value='pass'> อนุมัติ </button>";
            echo "</div>";
            echo "<div class='form-group col-md-4'>";
            echo  "<button type='submit' class='btn btn-danger' name='update-status' value='false' > ไม่อนุมัติ </button>";
            echo "</div>";
            echo "<div class='form-group col-md-4'>";
            echo  "<button type='submit' class='btn btn-warning' name='update-status' value='onFix' >  ให้กลับไปแก้เขข้อมูล </button>";
            echo "</div>";
            // }

            if ($_SESSION['major'] == "0") {
              echo "<a href='adminpage-print.php?id=" . $row['id'] . "' title='View' class='btn btn-link'>ออกใบขอความอนุเคราะห์</a>";
            }
          ?> -->
          </div>
        </form>
      </div>
    </div>
    <div class="conteiner">
      <div class="footer">
        <div class="fakeimg" >  
        </div>
      </div>
      <!-- ?php if (isset($_SESSION ['success'])) {
        // echo $_SESSION['id'];
        echo $_SESSION['f_name'];
        // echo $_SESSION['l_name'];
        unset($_SESSION['error']);
      } else {
        echo "Have a good night!";
      }
      ?> -->
      <!-- <button type='submit' class='btn btn-warning' name='update-status' value='onFix' @click="window.print()" >  พิมพ์ </button> -->
      <input type="button" value="Print" style='margin-top:100px;'
               onclick="window.print()" id="print-btn"/> 
    </div>
  </body>
</html>


