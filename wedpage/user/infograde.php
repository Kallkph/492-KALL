<?php
  session_start();
  include('../../configure/connect.php');

  if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
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
                    <a class="nav-item nav-link" href="../index.php">หน้าหลัก</a>
                        <a class="nav-item nav-link" href="Company.php">สถานประกอบการ</a>
                        <a class="nav-item nav-link" href="Doc.html"> Download เอกสารต่างๆ </a>
                        <a class="nav-item nav-link" href="#">ข่าวสาร</a>
                        <a class="nav-item nav-link" href="Fac.html">ติดต่อเรา</a>
                        
                        <?php if (isset($_SESSION ['success'])) : ?>
                          <a class="nav-item nav-link" href="request-company.php">ยื่นเรื่องฝึกงาน</a>
                         <a class="nav-item nav-link" href="index.php?logout='1'">ออกจากระบบ</a>
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
      <p><?php echo $_SESSION['id'];?></p>

      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">อัพโหลดรายงานประจำสัปดาห์</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">แก้ไขข้อมูลประจำตัว</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">ตรวจสอบสถานะ</a>
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
                
                <div class="card2infograde">
                  
                หน้ายื่นเรื่อง
                
               


  <!-- <div class="form-row">  -->
  <form action="request-company_db.php" method="post">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">ชั้นปีที่</label>
    <div class="col-sm-2">
      <input class="form-control" id="input">
    </div>
  </div>

  <!-- </div> -->
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">จำนวนหน่วยกิจสะสม</label>
    <div class="col-sm-2">
      <input class="form-control" id="input">
    </div>
    <label for="inputEmail3" class="col-sm-3 col-form-label">หน่วยกิจ (ไม่รวม W, F)</label>
    <label for="inputEmail3" class="col-sm-2.5 col-form-label">GPA</label>
    <div class="col-sm-2">
      <input class="form-control" id="input">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">จำนวนหน่วยกิจลงทะเบียนเทอม(ปัจจุบัน)</label>
    <div class="form-group col-md-2">
      <!-- <label for="inputState">State</label> -->
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>เทอม</option>
        1. <option>S</option>
        2. <option>1</option> 
        3. <option>2</option> 
      </select>
    </div>
    <div class="form-group col-md-2">
      <!-- <label for="inputState">State</label> -->
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>ปี</option>
        1. <option>57</option>
        1. <option>58</option>
        1. <option>59</option>
        1. <option>60</option>
        2. <option>61</option> 
        3. <option>62</option>
        3. <option>63</option>
        3. <option>64</option>
        3. <option>65</option>
        3. <option>66</option>
      </select>
    </div>
    <div class="col-sm-2">
      <input class="form-control" id="input">
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">หน่วยกิจ</label>
    <!-- ?php if() { ?>
      <label for="inputEmail3" class="col-sm-2.5 col-form-label">(ต้องไม่ต่ำกว่า 70 หน่วยกิจ)</label>
    ?php } else {?>
      <label for="inputEmail3" class="col-sm-2.5 col-form-label">(ต้องไม่ต่ำกว่า 100 หน่วยกิจ)</label>
    ?php }?>   -->
  </div>


  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>รายวิชา</option>
        1. <option>A</option>
        2. <option>B+</option> 
        3. <option>B</option> 
        4. <option>C+</option> 
        5. <option>C</option> 
        6. <option>D+</option> 
        7. <option>D</option> 
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>เทอม</option>
        1. <option>S</option>
        2. <option>1</option> 
        3. <option>2</option> 
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>ปี</option>
        1. <option>57</option>
        1. <option>58</option>
        1. <option>59</option>
        1. <option>60</option>
        2. <option>61</option> 
        3. <option>62</option>
        3. <option>63</option>
        3. <option>64</option>
        3. <option>65</option>
        3. <option>66</option>
      </select>
    </div>
  

    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>เกรต</option>
        1. <option>A</option>
        2. <option>B+</option> 
        3. <option>B</option> 
        4. <option>C+</option> 
        5. <option>C</option> 
        6. <option>D+</option> 
        7. <option>D</option> 
      </select>
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>รายวิชา</option>
        1. <option>A</option>
        2. <option>B+</option> 
        3. <option>B</option> 
        4. <option>C+</option> 
        5. <option>C</option> 
        6. <option>D+</option> 
        7. <option>D</option> 
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>เทอม</option>
        1. <option>S</option>
        2. <option>1</option> 
        3. <option>2</option> 
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>ปี</option>
        1. <option>57</option>
        1. <option>58</option>
        1. <option>59</option>
        1. <option>60</option>
        2. <option>61</option> 
        3. <option>62</option>
        3. <option>63</option>
        3. <option>64</option>
        3. <option>65</option>
        3. <option>66</option>
      </select>
    </div>
  

    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>เกรต</option>
        1. <option>A</option>
        2. <option>B+</option> 
        3. <option>B</option> 
        4. <option>C+</option> 
        5. <option>C</option> 
        6. <option>D+</option> 
        7. <option>D</option> 
      </select>
    </div>
  </div>


  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>รายวิชา</option>
        1. <option>A</option>
        2. <option>B+</option> 
        3. <option>B</option> 
        4. <option>C+</option> 
        5. <option>C</option> 
        6. <option>D+</option> 
        7. <option>D</option> 
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>เทอม</option>
        1. <option>S</option>
        2. <option>1</option> 
        3. <option>2</option> 
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>ปี</option>
        1. <option>57</option>
        1. <option>58</option>
        1. <option>59</option>
        1. <option>60</option>
        2. <option>61</option> 
        3. <option>62</option>
        3. <option>63</option>
        3. <option>64</option>
        3. <option>65</option>
        3. <option>66</option>
      </select>
    </div>
  

    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>เกรต</option>
        1. <option>A</option>
        2. <option>B+</option> 
        3. <option>B</option> 
        4. <option>C+</option> 
        5. <option>C</option> 
        6. <option>D+</option> 
        7. <option>D</option> 
      </select>
    </div>
  </div>


  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        ตรวจสอบความถูกต้อง
      </label>
      
    </div>
    <button type="submit" name="r_submit" value="Save..." class="btn btn-primary">ยื่นเรื่อง</button>
  </div>

  </div>

  
</form>













                  <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
                  </div> -->

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
  echo $_SESSION['id'];
  echo $_SESSION['f_name'];
  echo $_SESSION['l_name'];
  unset($_SESSION['error']);
} else {
  echo "Have a good night!";
}
?>
    </div>

</body>
</html>

<?php
  include('../../configure/connect.php')
  
?>
