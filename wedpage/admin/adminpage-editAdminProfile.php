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
    $sql = "SELECT * FROM advisor WHERE a_id = ?";

    if($stmt = mysqli_prepare($con, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $param_id);

      $param_id = trim($_GET['id']);

      if(mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);

          $name = $row['a_id'];

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
    <link rel="stylesheet" href="../../scr/css/styles.css">
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand">หน้าเพจสำหรับ ADMIN</a>
      <form class="form-inline">
        <?php if (!isset($_SESSION)) : ?>
      <a class="nav-item nav-link" href="register.php">สมัครสมาชิก</a>
        <?php else : ?>
      <a class="nav-item nav-link" href="../index.php?logout='1'">ออกจากระบบ</a>
        <?php endif ?>
      </form>
    </nav>
    <div class="row">
      <div class="leftcolumn">
        <?php if (!isset($_SESSION ['success'])) { 
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
            <p><?php echo $_SESSION['f_name'];?></p>
            สาขา
            <p><?php echo $_SESSION['major'];?></p>
            <p><?php echo $_SESSION['id'];?></p>
          </div>
        <?php } ?>
      <div class="card3">
        <div class="btn-group-vertical">
          แผงควบคุม
        </div>  
        <div class="list-group">
        <?php
          if ($_SESSION['major'] == "0") {
            echo "<a href='adminpage.php' class='list-group-item list-group-item-action list-group-item-light'>ใบคำร้องขอฝึกงาน</a>";
            echo "<a href='adminpage-users.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการบัญชีสมาชิก</a>";
            echo "<a href='adminpage-admin.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการบัญชีอาจารย์</a>";
            echo "<a href='adminpage-companay.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการข้อมูลสถานประกอบการ</a>";
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
        <div class="form-row">
          <div class="form-group col-md-3">
          </div>
          <div class="form-group col-md-">
            แก้ไขบัญชีอาจารย์
          </div>
        </div>
        <div class="form-row">
            <form action="../../process/editUserProfile_db.php" method="post">
                        คำนำหน้าชื่อ : <input type="text" name="name_titles" id="name_titles" value='<?php echo $row['a_t_position']?>'>
                          ชื่อ : <input type="text" name="txt_fname" id="txt_fname" value='<?php echo $row['a_f_name']?>' >
                        <br> 
                        นามสกุล: <input type="text" name="txt_lname" id="txt_lname"  value='<?php echo $row['a_l_name']?>'>
                        <br>
                        รหัสอาจารย์ : <input type="text" id="txt_id" name="txt_id" pattern="[0-9]{7}"  value='<?php echo $row['a_id']?>'>
                        <br>
                        เบอร์โทร : <input type="text" id="telnum" name="txt_tel" pattern="[0-9]{10}"  value='<?php echo $row['a_tel']?>'> 
                        <br>
                        E-mail : <input type="text" id="txt_mail" name="txt_mail" placeholder="@rsu.ac.th"  value='<?php echo $row['a_email']?>'> 
                        <br>
                        สาขา : <input type="text" id="major" name="major" placeholder="@rsu.ac.th"  value='<?php echo $row['a_major']?>'> 
                          <br>
                        <!-- ?php if ($_SESSION['major'] == 0) {echo "ระหัสผ่าน :" . "<input type='text' id='password' name='password' placeholder='ระหัสผ่านอาจารย์'  value=$row[password]>" ; }?>  -->
                        รหัสผ่าน : <input type="password" class="form-control" id="password" name="password" placeholder="ระหัสผ่านใหม่"  value='<?php echo $row['a_password']?>'>
                          <br>
                          <button type="submit" class="btn btn-light" id="btn_submit" name="regAdmin" value="Save...">บันทึก</button>
              </form>
              </div>
      </div>
    </div>
    <div class="conteiner">
      <div class="footer">
        <div class="fakeimg" >  
        </div>
      </div>
      <?php if (isset($_SESSION ['success'])) {
        // echo $_SESSION['id'];
        echo $_SESSION['f_name'];
        // echo $_SESSION['l_name'];
        unset($_SESSION['error']);
      } else {
        echo "Have a good night!";
      }
      ?>
    </div>
  </body>
</html>



