<?php 
    session_start();
    include('connect.php'); 
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

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <img src="./scr/img/Banner.png" width="100%">
    <div id="mainlink">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="container">
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="Company.php">สถานประกอบการ</a>
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
                <div class="card1">
 
                        <!-- Login Form -->
    <form>
        <input type="text" id="email" class="fadeIn second" name="login" placeholder="Email">
        <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
                    
                             
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
                      <form action="register_db.php" method="post">
                        <?php include('errors.php'); ?>
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
                        ชื่อ : <input type="text" name="txt_fname" id="txt_fname">
                       <br> 
                       นามสกุล: <input type="text" name="txt_lname" id="txt_lname">
                       <br>
                       รหัสนักศึกษา : <input type="text" id="txt_id" name="txt_id" pattern="[0-9]{7}">
                       <br> -->
                       เบอร์โทร : <input type="text" id="telnum" pattern="[0-9]{10}"> 
                       <br>
                       E-mail : <input type="text" id="txt_mail" name="txt_mail" placeholder="@rsu.ac.th"> 
                       <br>
                       สาขา   <select name="major">
                           <option value="คอมพิวเตอร์">คอมพิวเตอร์</option>
                           <option value="เคมี">เคมี</option>
                           <option value="อุตสาหการ">อุตสาหการ</option>
                          </select><br>      
                
                          Password :<input type="text" name="txt_pwd" id="txt_pwd"><br>
                          Confirm Password : <input type="text" name="txt_cpwd" id="txt_cpwd">
                          <br>
                           btn -->
                           <button type="submit" class="btn btn-light" id="btn_submit" name="reg" value="Save...">สมัครสมาชิก</button>
                        <!-- <div class="input-group"> 
                          <label for="username">Username</label>
                          <input type="text" name="username">
                        </div>
                        <div class="input-group">
                          <label for="email">Email</label>
                          <input type="text" name="email">
                        </div>
                        <div class="input-group">
                          <label for="password_1">Password</label>
                          <input type="text" name="password_1">
                        </div>
                        <div class="input-group">
                            <label for="password_2">Confirm Password</label>
                            <input type="text" name="password_2">
                        </div>
                        <div class="input-group">
                            <button  class="btn btn-light" type="submit" name="reg_user" class="btn">สมัครสมาชิก</button>
                        </div>
                        <p>Already a member? <a href="login.php">Sign in</a></p> -->
                      </form>

                   <!-- <form id="Regis" method="POST" action="register.php">
                       ชื่อ : <input type="text" name="txt_fname" id="txt_fname">
                       <br> 
                       นามสกุล: <input type="text" name="txt_lname" id="txt_lname">
                       <br>
                       รหัสนักศึกษา : <input type="text" id="txt_id" name="txt_id" pattern="[0-9]{7}">
                       <br> -->
                       <!-- เบอร์โทร : <input type="text" id="telnum" pattern="[0-9]{10}"> -->
                       <!-- <br>
                       E-mail : <input type="text" id="txt_mail" name="txt_mail" placeholder="@rsu.ac.th"> 
                       <br>
                       สาขา   <select name="major">
                           <option value="คอมพิวเตอร์">คอมพิวเตอร์</option>
                           <option value="เคมี">เคมี</option>
                           <option value="อุตสาหการ">อุตสาหการ</option>
                          </select><br>      
                
                          Password :<input type="text" name="txt_pwd" id="txt_pwd"><br>
                          Confirm Password : <input type="text" name="txt_cpwd" id="txt_cpwd">
                          <br>
                           btn -->
                          <!-- <button type="submit" class="btn btn-light" id="btn_submit" name="reg" value="Save...">สมัครสมาชิก</button> -->
                          <button type="reset" class="btn btn-light" @click="submit">เคลียร์</button>
                          </form> -->
                      </div>
<!--                
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a> -->
                    <!-- <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a> -->
                  
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



<?php
  echo "<pre>", print_r($_POST, true), "</pre>";

  include "connect.php";

  $errors = array();

if(isset($_POST['reg'])){
  $data = array(
    "txt_id" => $_POST["txt_id"],
    "txt_fname" => $_POST["txt_fname"],
    "txt_lname" => $_POST["txt_lname"],
    "txt_mail" => $_POST["txt_mail"],
    "txt_pwd" => $_POST["txt_pwd"],
    "txt_cpwd" => $_POST["txt_cpwd"]
  );
  if ($_POST["txt_fname"] == "") {
    $statusMsg = "โปรดระบุชื่อจริง";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  else if ($_POST["txt_lname"] == "") {
      $statusMsg = "โปรดระบุนามสกุล";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  } 
  // else if (!filter_var($_POST["txt_mail"], FILTER_VALIDATE_EMAIL)) {
  //     $statusMsg = "โปรดใช้อีเมลอื่น อีเมล์นี้มีผู้ใช้แล้ว!";
  //     echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
  else if ($_POST["txt_pwd"] == "") {
      $statusMsg = "โปรดระบุรหัสผ่าน!";
      echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }
  else if ($_POST["txt_cpwd"] == "") {
    $statusMsg = "โปรดระบุรหัสผ่านยืนยัน!";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }

  else if ($_POST["txt_pwd"] != $_POST["txt_cpwd"]) {
    $statusMsg = "โปรดระบุรหัสผ่านและรหัสยืนยัน ให้ตรงกัน";
    echo "<script type='text/javascript'>alert('$statusMsg');</script>";
  }

  if($_POST["txt_pwd"] != "" && $_POST["txt_cpwd"] != "" && ($_POST["txt_pwd"] == $_POST["txt_cpwd"])){
    echo "if";

            $user_check_query = "SELECT * FROM users WHERE s_id = 'txt_id' ";
        $query = mysqli_query($con, $user_check_query);
        $result = mysqli_fetch_assoc($query);
        // echo('qwe');4
        echo ($result);
        print_r($result);
        

        if($result){
          $statusMsg = "โปรดระบุรหัสผ่านและรหัสยืนยัน ให้ตรงกัน";
          echo "<script type='text/javascript'>alert('$statusMsg')";
          print_r($errors);
            echo ('if (have result(มีอยู่แล้ว))');
            array_push($errors, "Username already exists");
        }

        print_r($errors);
        
        if (count($errors) == 0) {

    $sql =" INSERT INTO users (s_id, s_fname, s_lname, s_email, s_password)
    VALUES
    (?, ?, ?, ?, ?)
    ";

    $qr = $con->prepare($sql);
    if($qr === false){
      trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
    }

    $qr->bind_param("sssss", $data["txt_id"], $data["txt_fname"], $data["txt_lname"], $data["txt_mail"], $data["txt_pwd"]);
    $qr->execute();

    // echo 5
    // $statusMsg = "สมัครสมาชิกเรียบร้อย";
    // echo "<script type='text/javascript'>alert('$statusMsg');window.location ='HTMLPage1.php';</script>";

    $qr->close();
  } else {
    print_r($errors);
      $statusMsg = "else";
      echo "else";
      // echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
  }
}
}
  

?>
  


 
 
 
 
 
 
 