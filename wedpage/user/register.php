<?php 
    session_start();
    include('../../configure/connect.php');
?>
<!DOCTYPE html>
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
                  <a class="nav-item nav-link" href="../user/viewCompanay.php">สถานประกอบการ</a>
                        <a class="nav-item nav-link" href="Doc.html"> Download เอกสารต่างๆ </a>
                        <a class="nav-item nav-link" href="#">ข่าวสาร</a>
                        <a class="nav-item nav-link" href="Fac.html">ติดต่อเรา</a>
                        <a class="nav-item nav-link" href="regis.html">สมัครสมาชิก</a>
                        <!-- <a class="nav-item nav-link" href="login-user.html">เข้าสู่ระบบ</a> -->
                    </div>
                    
                </div>
            </div>
        </nav>
      </div> 

          <div class="row">
              <div class="leftcolumn">
                <!-- <div class="card1"> -->
                <?php if (!isset($_SESSION ['success'])) : ?>
                <div class="card1">
                        <!-- Login Form -->
      <form action="../../process/login_db.php" method="post">
        <input type="text" id="txt_id" class="fadeIn second" name="txt_id" placeholder="id">
        <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password">
        
        <dev class="card1leftcolumn">
        <button type="submit" class="btn btn-primary" name = "login_user">Login</button>
        <!-- <button type="submit" class="btn btn-primary" name="login" value="">Primary</button> -->
        </dev>
      </form>       
                <!-- </div> -->
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
      </div>
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
                
                 
                
                

  
           </div>
              </div>
              <div class="rightcolumn">
                
                <div class="card2_1">
                  <!-- <h3>สไลด์โชว์</h3> -->
                  
                    <div class="card">
                      <h> สมัครสมาชิก </h>
                      <form action="../../process/register_db.php" method="post">
                        <?php include('../errors.php'); ?>
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="error">
                              <h3>
                                  <?php 
                                      echo $_SESSION['error'];
                                      unset($_SESSION['error']);
                                  ?>
                              </h3>
                            </div>
                        <?php endif ?> 
                        คำนำหน้าชื่อ<select name="name_titles" class="form-control">
                          <option value="นาย">นาย</option>
                          <option value="นางสาว">นางสาว</option>
                          <option value="นาง">นาง</option>
                          </select><br>  
                          ชื่อ : <input type="text" name="txt_fname" id="txt_fname">
                        <br> 
                        นามสกุล: <input type="text" name="txt_lname" id="txt_lname">
                        <br>
                        รหัสนักศึกษา : <input type="text" id="txt_id" name="txt_id" pattern="[0-9]{7}">
                        <br>
                        เบอร์โทร : <input type="text" id="telnum" name="txt_tel" pattern="[0-9]{10}"> 
                        <br>
                        E-mail : <input type="text" id="txt_mail" name="txt_mail" placeholder="@rsu.ac.th"> 
                        <br>
                        สาขา<select name="major" class="form-control">
                          <option value="cen">วิศวกรรมโยธา</option>
                          <option value="cpe">วิศวกรรมคอมพิวเตอร์</option>
                          <option value="che">วิศวกรรมเคมี</option>
                          <option value="อุตสาหการ">วิศวกรรมอุตสาหการ</option>
                          <option value="env">วิศวกรรมสิ่งแวดล้อม</option>
                          <option value="aen">วิศวกรรมยานยนต์</option>
                          <option value="een">วิศวกรรมไฟฟ้า</option>
                          <option value="ien">วิศวกรรมอุตสาหการ</option>
                          <option value="men">วิศวกรรมเครื่องกล</option>
                          </select><br>
                          <br>
                        หลักสูตร<select name="course" class="form-control">
                          <option value="100">ปกติ</option>
                          <option value="70">ปวส</option>
                          </select><br>            
                          Password :<input type="text" name="txt_pwd" id="txt_pwd"><br>
                          Confirm Password : <input type="text" name="txt_cpwd" id="txt_cpwd">
                          <br>
                           
                           <button type="submit" class="btn btn-light" id="btn_submit" name="reg" value="Save...">สมัครสมาชิก</button>
                      </form>

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
        <!-- //// -->
    </div>

</body>
</html>






 
 
 
 
 
 
 