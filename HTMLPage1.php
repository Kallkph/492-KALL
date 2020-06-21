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

                        <a class="nav-item nav-link" href="Company.php">สถานประกอบการ</a>
                        <a class="nav-item nav-link" href="Doc.html"> Download เอกสารต่างๆ </a>
                        <a class="nav-item nav-link" href="#">ข่าวสาร</a>
                        <a class="nav-item nav-link" href="Fac.html">ติดต่อเรา</a>
                        <a class="nav-item nav-link" href="register.php">สมัครสมาชิก</a>
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
      <form action="login.php" method="post">
        <input type="text" id="txt_email" class="fadeIn second" name="txt_email" placeholder="email">
        <input type="text" id="txt_password" class="fadeIn third" name="txt_password" placeholder="password">
        <input type="submit" class="fadeIn fourth" name="login" value="">
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
                
                <div class="card2">
                  <!-- <h3>สไลด์โชว์</h3> -->
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="./scr/img/2.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="./scr/img/1.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="./scr/img/3.png" class="d-block w-100" alt="...">
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
  include "connect.php"
  
?>
