<?php
  session_start();
  include('connect.php');

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
                    <a class="nav-item nav-link" href="index.php">หน้าหลัก</a>
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
    <img src="./scr/img/profile.jpg" width="50%">
</a>
    
      รหัสนักศึกษา
      <p><?php echo $_SESSION['id'];?></p>
      ชื่อ
      <p><?php echo $_SESSION['f_name'],' ', $_SESSION['l_name'];?></p>
      สาขา
      <p><?php echo $_SESSION['id'];?></p>
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
                  
                หน้ายื่นเรื่อง
                
               


  <!-- <div class="form-row">  -->
  <form action="request-company_db.php" method="post">
    <div class="form-group">
      
      <label for="inputEmail4">ชื่อหน่วยงาน/บริษัท ที่ประสงค์จะฝึกงาน</label>
      <input type="text" class="form-control" id="txt_r_company" name="txt_r_company">
      
    </div>

  <!-- </div> -->
  <div class="form-check">
  <input class="form-check-input" type="radio" name="txt_r_set" id="exampleRadios1" value="1" checked>
  <label class="form-check-label" for="exampleRadios1">
    สำนักงาน(วิทยาลัยวิศวกรรมศาสตร์) จัดหาให้
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="txt_r_set" id="exampleRadios2" value="2">
  <label class="form-check-label" for="exampleRadios2">
    นักศึกษาจัดหาเอง
  </label>
</div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="txt_r_address" name="txt_r_address" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="txt_r_address2" name="txt_r_address2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="txt_r_city" name="txt_r_city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="txt_r_state" name="txt_r_state" class="form-control">
        <option selected>เลือก...</option>
1. <option>กรุงเทพมหานคร </option>
2. <option>กระบี่</option> 
3. <option>กาญจนบุรี</option> 
4. <option>กาฬสินธุ์</option> 
5. <option>กำแพงเพชร</option> 
6. <option>ขอนแก่น</option> 
7. <option>จันทบุรี</option> 
8. <option>ฉะเชิงเทรา</option> 
9. <option>ชลบุรี</option> 
10. <option>ชัยนาท</option> 
11. <option>ชัยภูมิ</option> 
12. <option>ชุมพร</option> 
13. <option>เชียงราย</option> 
14. <option>เชียงใหม่</option> 
15. <option>ตรัง</option> 
16. <option>ตราด</option> 
17. <option>ตาก</option> 
18. <option>นครนายก</option> 
19. <option>นครปฐม</option> 
20. <option>นครพนม</option> 
21. <option>นครราชสีมา</option> 
22. <option>นครศรีธรรมราช</option> 
23. <option>นครสวรรค์</option> 
24. <option>นนทบุรี</option> 
25. <option>นราธิวาส</option> 
26. <option>น่าน</option> 
27. <option>บึงกาฬ</option> 
28. <option>บุรีรัมย์</option> 
29. <option>ปทุมธานี</option> 
30. <option>ประจวบคีรีขันธ์</option> 
31. <option>ปราจีนบุรี</option> 
32. <option>ปัตตานี</option> 
33. <option>พระนครศรีอยุธยา</option>
34. <option>พังงา</option>
35. <option>พัทลุง</option>
36. <option>พิจิตร</option>
37. <option>พิษณุโลก</option>
38. <option>เพชรบุรี</option>
39. <option>เพชรบูรณ์</option>
40. <option>แพร่</option>
41. <option>พะเยา</option>
42. <option>ภูเก็ต</option>
43. <option>มหาสารคาม</option>
44. <option>มุกดาหาร</option>
45. <option>แม่ฮ่องสอน</option>
46. <option>ยะลา</option>
47. <option>ยโสธร</option>
48. <option>ร้อยเอ็ด</option>
49. <option>ระนอง</option>
50. <option>ระยอง</option>
51. <option>ราชบุรี</option>
52. <option>ลพบุรี</option>
53. <option>ลำปาง</option>
54. <option>ลำพูน</option>
55. <option>เลย</option>
56. <option>ศรีสะเกษ</option>
57. <option>สกลนคร</option>
58. <option>สงขลา</option>
59. <option>สตูล</option>
60. <option>สมุทรปราการ</option>
61. <option>สมุทรสงคราม</option>
62. <option>สมุทรสาคร</option>
63. <option>สระแก้ว</option>
64. <option>สระบุรี</option>
65. <option>สิงห์บุรี</option>
66. <option>สุโขทัย</option>
67. <option>สุพรรณบุรี</option>
68. <option>สุราษฎร์ธานี</option>
69. <option>สุรินทร์</option>
70. <option>หนองคาย</option>
71. <option>หนองบัวลำภู</option>
72. <option>อ่างทอง</option>
73. <option>อุดรธานี</option>
74. <option>อุทัยธานี</option>
75. <option>อุตรดิตถ์</option>
76. <option>อุบลราชธานี</option>
77. <option>อำนาจเจริญ</option>

      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="txt_r_zip" name="txt_r_zip">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">เบอร์โทรศัพท์</label>
      <input type="text" class="form-control" id="txt_r_phone" name="txt_r_phone">
      
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">เบอร์โทรสาร</label>
      <input type="text" class="form-control" id="txt_r_fax" name="txt_r_fax">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        ตรวจสอบความถูกต้อง
      </label>
    </div>
  </div>
  <button type="submit" name="r_submit" value="Save..." class="btn btn-primary">ยื่นเรื่อง</button>
</form>













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
  include('connect.php')
  
?>
