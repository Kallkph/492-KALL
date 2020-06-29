<?php
  session_start();
  // include('../configure/connect.php');

  if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "ไปล๊อกอินก่อนไป!!!!";
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['type']);
    header('location: index.php');
  }
  
  include('../../configure/connect.php');
  $sql = "SELECT * From users inner join requestcompany on users.id = requestcompany._id";
  $result = mysqli_query($con, $sql);

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
    <div class="card1">
    <a href="pageuser.php">
    <img src="../../scr/img/adminproflie.jpg" width="50%">
</a>
    

      ชื่อ Admin
      <p><?php echo $_SESSION['f_name'];
      // ' ', $_SESSION['l_name'];
      ?>
      </p>
      สาขา
      <p><?php echo $_SESSION['major'];?></p>
  </div>

   <?php endif ?>

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
                

                <!-- <div class="row row-cols-1 row-cols-md-3"> -->
                <table class="table">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">ลำดับ</th> -->
      <th scope="col">รหัสนักศึกษา</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">สาขา</th>
      <th scope="col">สถานะ</th>
    </tr>
  </thead>
  
  <tbody>
 
  <!-- <?php while($row = $result->fetch_assoc()): ?> -->
    <tr>
      <!-- <th scope="row">1</th> -->
      <td><?php echo $row['_id']?>
    </td>
      

      <td>
        <?php
          //  $query = "SELECT * FROM users WHERE id = $row['_id'] ";
          //  $result = mysqli_query($con, $query);
          // //  $userdata = mysqli_fetch_assoc($result);
          // //  pre_r($userdata);
          echo $row['f_name'];
          echo ' ';
          echo $row['l_name'];
        ?>
      </td>
      <td><?php echo $row['r_major']?></td>
      <td>
        <!-- <php echo $row['r_status']?> -->
        <?php if ($row['status'] == 0) {?>
          <button type="button" class="btn btn-danger">ยังไม่ผ่าน</button>
        <?php } else if ($row['status'] == 2) {?>
          <button type="button" class="btn btn-light">กำลังดำเนินการ</button>
          <?php } else if ($row['status'] == 1) {?>
          <button type="button" class="btn btn-success">ดำเนินการสำเร็จ</button>
          <?php } else {?>
            <button type="button" class="btn btn-danger">ตรวจสอบข้อมูล!</button>
<?php } ?>
    </td>
      <!-- <td><button type="button" class="btn btn-success">อนุมัติแล้ว</button></td> -->
        <!-- <td>
          <a href="adminpage_db.php?awite=<?php echo $row['_id']; ?>"
            class="btn btn-info">กำลังดำเนินการ</a>
            <a href="adminpage_db.php?success=<?php echo '4534545345'; ?>"
            class="btn btn-info">ดำเนินการสำเร็จ</a>
            <a href="adminpage_db.php?failed=<?php echo $row['_id']; ?>"
            class="btn btn-info">ยังไม่ผ่าน</a>
        </td> -->
    
    </tr>
    <?php endwhile; ?>
    <tr>
      <!-- <th scope="row">2</th> -->
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td><button type="button" class="btn btn-danger">ยังไม่ผ่าน</button></td>
    </tr>
    <tr>
      <!-- <th scope="row">3</th> -->
      <td>Larry</td>
      <td>the Bird</td>
      <td>the Bird</td>
      <td><button type="button" class="btn btn-light">กำลังดำเนินการ</button></td>
    </tr>
  </tbody>
</table>


<!-- </div> -->











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
  // echo $_SESSION['l_name'];
  unset($_SESSION['error']);
} else {
  echo "Have a good night!";
}
?>
    </div>

</body>
</html>


