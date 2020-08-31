<?php
  session_start();
  
  include('../configure/connect.php');

  if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
  }

  ///Get Status
  if (isset($_SESSION['id'])){
    $query = "SELECT * FROM users WHERE id = '$_SESSION[id]' ";
    $result = mysqli_query($con, $query);
    $userdata = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['status'] = $userdata['status'];
    }
  }

  // if ($_SESSION['type'] = 'admin') {
  //   header('location: /wedpage/admin/adminpage.php');
  // }



  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
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

    <link rel="stylesheet" href="../scr/css/styles.css">
</head>


<body>
    <div class="container">
    <img src="../scr/img/Banner.png" width="100%">
    <div id="mainlink">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="container">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="Company.php">สถานประกอบการ</a>
                        <a class="nav-item nav-link" href="user/news.php">แนะนำ</a>
                        <a class="nav-item nav-link" href="../wedpage/user/about.php">ติดต่อเรา</a>
                       
                       


                   
<?php if (!isset($_SESSION ['success'])) : ?>
  <a class="nav-item nav-link" href="/wedpage/user/register.php">สมัครสมาชิก</a>
  <?php else : ?>
    <a class="nav-item nav-link" href="user/checkstatus.php">ยื่นเรื่องฝึกงาน</a>
    <a class="nav-item nav-link" href="index.php?logout='1'">ออกจากระบบ</a>
   <?php endif ?>


         







                        <!-- <a class="nav-item nav-link" href="login-user.html">เข้าสู่ระบบ</a> -->
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
      <form action="../process/login_db.php" method="post">
        <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="ID">
        <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="Password">
        
        <dev class="card1leftcolumn">
        <button type="submit" class="btn btn-primary" name = "login_user">Login</button>
        <!-- <button type="submit" class="btn btn-primary" name="login" value="">Primary</button> -->
        </dev>
      </form>       
                </div>
  <?php else : ;?>
    <div class="card3">
    <a href="user/pageuser.php">
    <img src="../scr/img/profile.jpg" width="50%">
</a>
    
      รหัสนักศึกษา
      <p><?php echo $_SESSION['id'];?></p>
      ชื่อ
      <p><?php echo $_SESSION['f_name'],' ', $_SESSION['l_name'];?></p>
      สาขา
      <p><?php echo $_SESSION['major'];?></p>
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
                
                <div class="card2_index">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                    <div class="carousel-item">
                        <?php 
                          $query = "SELECT * FROM uploadfile WHERE type = 'news'";
                          $result = mysqli_query($con, $query);
                          while ($row = mysqli_fetch_array($result)) {
                              echo "<img src='../../scr/fileupload/".$row['fileupload']."' width='100%'>";
                            } 
                        ?>
                      </div>
                      <div class="carousel-item">
                        <img src="../scr/img/1.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="../scr/img/3.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item active">
                        <img src="../scr/img/2.png" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
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

        <?php 
if (isset($_SESSION ['success'])) {
  echo $_SESSION['id'];
  echo $_SESSION['f_name'];
  echo $_SESSION['l_name'];
  echo $_SESSION['type'];
  unset($_SESSION['error']);
} else {
  echo "Have a good night!";
}

?>
    </div>

</body>
</html>

<?php
  include('../configure/connect.php')
  
?>
