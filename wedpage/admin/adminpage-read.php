<?php
  session_start();
  // include('../../configure/connect.php');

  if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['type']);
    header('location: index.php');
  }
  

    // $sql = "SELECT * From users inner join requestcompany on users.id = requestcompany.r_id";
  // $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

  if($_GET['id']){
    include('../../configure/connect.php');
    $sql = "SELECT DISTINCT * 
            From users 
            inner join requestcompany 
            on users.id = requestcompany.r_id 
            inner join grade
            on requestcompany.r_id = grade.g_id
            WHERE users.id = ?";
    // $sql = "SELECT * FROM users WHERE id = ?";

    if($stmt = mysqli_prepare($con, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $param_id);

      $param_id = trim($_GET['id']);

      if(mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);

          $name = $row['id'];

          print_r($row);
        } else {
          echo "else";
          // header("locatino: index.")
        }
      }
    }
    // $result = mysqli_prepare($con, $sql);
    // if($result){
    //   echo "reasfwedgfaerfgsvfc";
    //   print_r($result);
    // }
  }
  // $row = mysqli_fetch_array($result);


  // print_r($row);
    function pre_r( $array ) {
      echo '<pre>';
      print_r($array);
      echo '</pre>';
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
          <a href="pageuser.php">
            <img src="../../scr/img/adminproflie.jpg" width="40%">
          </a>
          ชื่อ Admin
          <p><?php echo $_SESSION['f_name'];?></p>
          สาขา
          <p><?php echo $_SESSION['major'];?></p>
        </div>
      <?php } ?>
    <div class="card3">
      <div class="btn-group-vertical">
        แผงควบคุม
      </div>  
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">ใบคำร้องขอฝึกงาน</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
      </div>
        <div class="fakeimg" style="height:200px;"></div>  
    </div>
  </div>
  <div class="rightcolumn">            
    <div class="card2">  
      หน้า เเอดมินต้องมีตาราง

      ..



    </div>
  </div>
</div>
</div>
          <div class="conteiner">
          <div class="footer">
            <div class="fakeimg" >  
              
            </div>
            
          </div>
          
          </div>
        <!-- //// -->
        <?php 
if (isset($_SESSION ['success'])) {
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


