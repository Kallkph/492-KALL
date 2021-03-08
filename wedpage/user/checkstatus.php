<?php
  session_start();
  include('../../configure/connect.php');

  if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
  }




  ///Get Status
  if (isset($_SESSION['id'])){
    $sql = "SELECT * From users inner join requestcompany on users.id = requestcompany.r_sid AND users.id = '$_SESSION[id]'";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    $userdata = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['status'] = $userdata['status'];
      // print_r($userdata);
    }
  }


  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    header('location: index.php');
  }


  
?>

<html lang="th">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<head>
    <meta charset="utf-8" />
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
                        <a class="nav-item nav-link" href="#">ข่าวสาร</a>
                        <a class="nav-item nav-link" href="Fac.html">ติดต่อเรา</a>
                        
                        <?php if (isset($_SESSION ['success'])) : ?>
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
              <?php if (!isset($_SESSION ['success'])) : ?>
                <div class="card1">
                        <!-- Login Form -->
      <form action="login_db.php" method="post">
        <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="id">
        <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password">
        
        <dev class="card1leftcolumn">
        <button type="submit" class="btn btn-primary" name = "login_user">Login</button>
        <!-- <button type="submit" class="btn btn-primary" name="login" value="">Primary</button> -->
        </dev>
      </form>       
                </div>
  <?php else : ;?>
    <div class="card3" style="height:400px;">
    <a href="pageuser.php">
    <img src="../../scr/img/profile.jpg" width="50%">
</a>
    
      รหัสนักศึกษา
      <p><?php echo $_SESSION['id'];?></p>
      ชื่อ
      <p><?php echo $_SESSION['f_name'],' ', $_SESSION['l_name'];?></p>
      สาขา
      <p>
        <!-- ?php echo $_SESSION['major'];?> -->
        <?php 
                  $major = $_SESSION['major'];
                  ;
                  switch ($major) {
                    case "cen":
                      $majorName = 'วิศวกรรมโยธา';
                      break;
                    case "che":
                      $majorName = 'วิศวกรรมเคมี';
                      break;
                    case "env":
                      $majorName = 'วิศวกรรมสิ่งแวดล้อม';
                      break;
                    case "aen":
                      $majorName = 'วิศวกรรมยานยนต์';
                      break;
                    case "een":
                      $majorName = 'วิศวกรรมไฟฟ้า';
                      break;
                    case "ien":
                      $majorName = 'วิศวกรรมอุตสาหการ';
                      break;
                    case "men":
                      $majorName = 'วิศวกรรมเครื่องกล';
                      break;
                    case "cpe":
                      $majorName = 'วิศวกรรมคอมพิวเตอร์';
                      break;
                    default:
                    $majorName = 0;
                  }
                  echo  $majorName;
               ?>
      </p>

      <div class="list-group">
      <a href="weekstamp.php" class="list-group-item list-group-item-action list-group-item-light">อัพโหลดรายงานประจำสัปดาห์</a>
        <a href="pageuser.php" class="list-group-item list-group-item-action list-group-item-light">แก้ไขข้อมูลประจำตัว</a>
        <a href="checkstatus.php" class="list-group-item list-group-item-action list-group-item-light">ตรวจสอบสถานะ</a>
      </div>

  </div>

   <?php endif ?>

                <div class="card3">
                  <!DOCTYPE html>

    <p id="top">Link Download เอกสารต่างๆ </p>
    <ul>
        <li><a href="เอกสารแนะนำสถานที่ฝึกงาน.doc">เอกสารแนะนำสถานที่ฝึกงาน</a></li>
        <li><a href="รายงานประจำสัปดาห์.doc">รายงานประจำสัปดาห์</a></li>
        <li><a href="แบบประเมินผลฝึกงาน.doc">แบบประเมินผลฝึกงาน</a></li>
        </ul>
                  <p>ติดต่อเรา..</p>
                <p><b><a href="https://www.facebook.com/kallkph" target="_blank">link.//www.en-rsu.ac.th</a></b>
                  <div class="fakeimg" style="height:200px;"></div>  
           </div>
              </div>




        <div class="rightcolumn">  
          <div class="card2">
          
            ตรวจสอบสถานะ
      
                <?php if ($_SESSION['status'] == 0) {?>
                  <figure class="figure">
                  <img src="../../scr/img/status_wait_grade.png" width="100%">
                  </figure>
                  <div style="margin-left: 310px;">
                    <a class="btn btn-light" href="infograde.php" role="button">กรอกผลการศึกษา</a>
                  </div>
                <?php } else if ($_SESSION['status'] == 1) {?>
                  <img src="../../scr/img/status_allow.png" width="100%">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">เข้่ารับการฝึกงาน ณ </label>
                    <div class="col-sm-5" style='margin-top:8px'>
                    <?php echo $userdata['r_company'];?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">วันที่เริ่มฝึกงาน</label>
                    <div class="col-sm-3" style='margin-top:8px'>
                    <?php echo $userdata['r_startTime'];?>
                    </div>
                    <label for="inputEmail3" class="col-sm-3 col-form-label">วันสิ้นสุดการฝึกงาน</label>
                    <div class="col-sm-4" style='margin-top:8px'>
                      <?php echo $userdata['r_endTime'];?>
                    </div>
                  </div>
                <?php } else if ($_SESSION['status'] == 2) {?>
                  <img src="../../scr/img/status_wait.png" width="100%">
                  <!-- <button type="button" class="btn btn-success">ดำเนินการสำเร็จ</button> -->
                <?php } else if ($_SESSION['status'] == 3) {?>
                  <figure class="figure">
                  <img src="../../scr/img/status_save_grade.png" width="100%">
                  </figure>
                  <div style="margin-left: 330px;">
                    <a class="btn btn-success" href="request-company.php" role="button">ยื่นเรื่องฝึกงาน</a>
                  </div>
                <?php } else if ($_SESSION['status'] == 4) {?>
                  <figure class="figure">
                  <img src="../../scr/img/status_edit_grade.jpg" width="100%">
                  </figure>
                  <div style="margin-left: 330px;">
                    <a class="btn btn-success" href="infograde.php" role="button">แก้ไขผลการเรียน</a>
                  </div>
                <?php } else if ($_SESSION['status'] == 5) {?>
                  <figure class="figure">
                  <img src="../../scr/img/status_edit_c.jpg" width="100%">
                  </figure>
                  <div style="margin-left: 230px;">
                    <a class="btn btn-success" href="request-company-edit.php" role="button">แก้ไขข้อมูลติดต่อผู้ดูแลฝึกงานของสถานประกอบการ</a>
                  </div>
                <?php } else {?>
                  <button type="button" class="btn btn-danger">ตรวจสอบข้อมูล!</button>
                <?php } ?>

          </div>
        </div>
        <?php 


if (isset($_SESSION ['success'])) {
  echo $_SESSION['id'];
  echo $_SESSION['f_name'];
  echo $_SESSION['l_name'];
  echo $_SESSION['status'];
  unset($_SESSION['error']);
} else {
  echo "Have a good night!";
}
?>
</body>
</html>

<?php
  include('../../configure/connect.php')
  
?>
