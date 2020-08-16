<?php
  session_start();
  include('../../configure/connect.php');

  if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
    heder('location: index.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    heder('location: index.php');
  }


    $sql = "SELECT * FROM users WHERE id = $_SESSION[id]";

    if($stmt = mysqli_prepare($con, $sql)) {

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
    <img src="/scr/img/Banner.png"   href="index.php"  width="100%">
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
    <div class="card3">
    <a href="pageuser.php">
    <img src="../../scr/img/profile.jpg" width="50%">
</a>
    
      รหัสนักศึกษา
      <p><?php echo $_SESSION['id'];?></p>
      ชื่อ
      <p><?php echo $_SESSION['f_name'],' ', $_SESSION['l_name'];?></p>
      สาขา
      <p><?php echo $_SESSION['major'];?></p>

      <div class="list-group">
        <a href="weekstamp.php" class="list-group-item list-group-item-action list-group-item-light">อัพโหลดรายงานประจำสัปดาห์</a>
        <a href="pageuser.php" class="list-group-item list-group-item-action list-group-item-light">แก้ไขข้อมูลประจำตัว</a>
        <a href="checkstatus.php" class="list-group-item list-group-item-action list-group-item-light">ตรวจสอบสถานะ</a>
      </div>
  </div>

   <?php endif ?>
                <div class="card3">
                  <!DOCTYPE html>

<html lang="th">
<head>
    <meta charset="utf-8" />
    <title> เอกสารต่างๆ </title>
    <style>
        a [href$=".doc"]  {
            background-image : url('pdf.gif');
            background-repeat : no-repeat;
            background-position :right;
            padding-right:40px;
            font-size:1.6em;


        }


    </style>
</head>


<body>
    <h3 id="top">Link Download เอกสารต่างๆ </h3>
    <ul>
        <li><a href="เอกสารแนะนำสถานที่ฝึกงาน.doc">เอกสารแนะนำสถานที่ฝึกงาน</a></li>
        <li><a href="รายงานประจำสัปดาห์.doc">รายงานประจำสัปดาห์</a></li>
        <li><a href="แบบประเมินผลฝึกงาน.doc">แบบประเมินผลฝึกงาน</a></li>
            

         
        </ul>



    

</body>
</html>
                  <p>ติดต่อเรา</p>
                  
                <p><b><a href="https://www.facebook.com/kallkph" target="_blank">link.//www.en-rsu.ac.th</a></b>
                <!-- <br><br> <a href="https://www.instagram.com/kkallp" target="_blank">My Instagram</a></p> -->
                  
                  <div class="fakeimg" style="height:200px;"></div>
                  
           </div>
              </div>
              <div class="rightcolumn">
                
                <div class="card2_1">
                  <!-- <h3>สไลด์โชว์</h3> -->

  <div class="form-row">
            <form action="../../process/editUserProfile_byUser_db.php" method="post">
            ชื่อ : <?php echo $row['f_name']?>
                        <br> 
                        นามสกุล: <?php echo $row['l_name']?>
                        <br>
                        <input type="hidden" for="inputEmail4" name="txt_id" value='<?php echo $row['id']?>'>รหัสนักศึกษา :
                        <?php echo $row['id']?>
                        <br>
                        คำนำหน้าชื่อ : <input type="text" name="name_titles" id="name_titles" value='<?php echo $row['name_titles']?>'>
                        เบอร์โทร : <input type="text" id="telnum" name="txt_tel" pattern="[0-9]{10}"  value='<?php echo $row['tel']?>'> 
                        <br>
                        E-mail : <input type="text" id="txt_mail" name="txt_mail" placeholder="@rsu.ac.th"  value='<?php echo $row['email']?>'> 
                        <br>
                        สาขา : <input type="text" id="major" name="major" placeholder="@rsu.ac.th"  value='<?php echo $row['major']?>'> 
                          <br>
                         <?php if ($_SESSION['major'] == 0) {echo "ระหัสผ่าน :" . "<input type='text' id='password' name='password' placeholder='@rsu.ac.th'  value='$row[password]'>" ; }?> 
                          <br>
                          <button type="submit" class="btn btn-light" id="btn_submit" name="reg" value="Save...">บันทึก</button>
              </form>
              </div>
               
                    <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a> -->
                  
                </div>
              
                  <!-- <div class="fakeimg" >
                      <img src="9.jpg" width="100%" height="100%">
                  </div> -->

              
              
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
    </div>
        

</body>
</html>



