<!DOCTYPE html>

<html lang="th">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<head>
    <meta charset="utf-8" />
    <title> ระบบฐานข้อมูลนักศึกษาฝึกงาน </title>

    <link rel="stylesheet" href="style.css">
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

                        <a class="nav-item nav-link" href="Company.html">สถานประกอบการ</a>
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

        


        <!-- <div class="header">
            <h1>MY PROFILE</h1>
            <p>Kalsuda Phochai </p>
          </div>
          
          <div class="topnav">
            <a href="index.html">HOME</a>
            <a href="./Code.zip">code</a>
            <a href="My Interest.html">My Interest</a>
            <a href="My Interest2.html">My Interest2</a>
          </div> -->
        
          
          <div class="row">
              <div class="leftcolumn">
                <div class="card1">
 
                        <!-- Login Form -->
    <form>
        <input type="text" id="email" class="fadeIn second" name="login" placeholder="Email">
        <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
                    
                </div><!-- card-top-left -->
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
    <h2 id="top">Link Download เอกสารต่างๆ </h2>
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
                  
                    <div class="card">
                      <h> สมัครสมาชิก </h>
                   <form id="Regis" method="POST" action="regis.php">
                       ชื่อ : <input type="text" name="txt_fname" id="txt_fname">
                       <br> 
                       นามสกุล: <input type="text" name="txt_lname" id="txt_lname">
                       <br>
                       รหัสนักศึกษา : <input type="text" id="txt_id" name="txt_id" pattern="[0-9]{7}">
                       <br>
                       <!-- เบอร์โทร : <input type="text" id="telnum" pattern="[0-9]{10}"> -->
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
                          <!-- btn -->
                          <button type="submit" class="btn btn-light" id="btn_submit" value="Save...">สมัครสมาชิก</button>
                          <button type="reset" class="btn btn-light" @click="submit">เคลียร์</button>
                          </form>
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

<?php
  echo "<pre>", print_r($_POST, true), "</pre>";

  include "connect.php";
  if(isset($_POST['Regis'])){
    echo "if";
    $data = array(
      $txt_id=>$_POST["txt_id"],
      $txt_fname=>$_POST["txt_fname"],
      $txt_lname=>$_POST["txt_lname"],
      $txt_mail=>$_POST["txt_mail"],
      $txt_pwd=>$_POST["txt_pwd"],
      $txt_cpwd=>$_POST["txt_cpwd"]
);
if($txt_pwd === $txt_cpwd){
$sql =" INSERT INTO users (s_id, s_fname, s_lname, s_email, s_password)
VALUES
($txt_id, $txt_fname, $txt_lname, $txt_mail, $txt_pwd)
";
echo "Insert to DB : ",$qr->affected_rows, "row";
$qr->close();
$qr = $con->prepare($sql);
if($qr === false){
trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
}
  }
  echo "ระหัสไม่ตรงกัน";

 

// $qr->bind_param("sssss", $data["txt_id"], $data["txt_fname"], $data["txt_lname"], $data["txt_mail"], $data["txt_pwd"]);
// $qr->execute();


  }
  echo "out if";
?>


  


 
 
 
 
 
 
 