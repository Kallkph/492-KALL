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
  
  include('../../configure/connect.php');
  $sql = "SELECT * From users";
  // $result = mysqli_query($con, $sql);
  $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

  // print_r($result);
  //   function pre_r( $array ) {
  //     echo '<pre>';
  //     print_r($array);
  //     echo '</pre>';
  //   }



  
?>

<html lang="th">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css"></script>

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
    <img src="../../scr/img/adminproflie.jpg" width="40%">
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

                <div class="card3-adminpage">
                <div class="btn-group-vertical">
  แผงควบคุม
</div>  


<div class="list-group">
  <?php
  if ($_SESSION['major'] == "0") {
    echo "<a href='adminpage.php' class='list-group-item list-group-item-action list-group-item-light'>ใบคำร้องขอฝึกงาน</a>";
    echo "<a href='adminpage-users.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการบัญชีสมาชิก</a>";
    echo "<a href='adminpage-admin.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการบัญชีอาจารย์</a>";
    echo "<a href='adminpage-companay.php' class='list-group-item list-group-item-action list-group-item-light'>จัดการข้อมูลสถานประกอบการ</a>";
  } else {
    echo "<a href='adminpage.php' class='list-group-item list-group-item-action list-group-item-light'>ใบคำร้องขอฝึกงาน</a>";
  }
  ?>              
</div>



                  <div class="fakeimg" style="height:200px;"></div>  
           </div>
              </div>
              
              <div class="rightcolumn">
                
                <div class="card2fortable">
                  
                จัดการบัญชีแอดมิน
                <!-- <div class="row row-cols-1 row-cols-md-3"> -->
<table class="table" id="table_row" width="1100px">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">ลำดับ</th> -->
      <th scope="col" width="500px">รหัสนักศึกษา</th>
      <th scope="col" >ชื่อ</th>
      <th scope="col"  width="40%">สาขา</th>
      <!-- <th scope="col"  width="30%">สถานะ</th> -->
      <th scope="col"  width="30%"></th>
    </tr>
  </thead>
  
  <tbody>
 
  <?php while($row = $result->fetch_assoc()){
    if (($row['major'] != "0") && ($_SESSION['major'] == $row['major'])) {
    echo "<tr>" ;
      echo "<td>" . $row['id'] . "</td>"; 
      echo "<td>" . $row['f_name'] ." ". $row['l_name'] . "</td>"; 
      echo "<td>" . $row['major'] . "</td>";
      echo "<td>" ;
        if ($row['status'] == 0) {
        echo "<button type='button' class='btn btn-light'>" . 'รอผลการเรียน' . "</button>"; 
        } else if ($row['status'] == 1) {
        echo "<button type='button' class='btn btn-success'>" . 'ยื่นเรื่องสำเร็จ' . "</button>";
         } else if ($row['status'] == 2) {
        echo "<button type='button' class='btn btn-warning'>" . 'รอการตรวจสอบ' . "</button>";
         } else if ($row['status'] == 7) {
        echo "<button type='button' class='btn btn-danger'>" . 'ยังไม่ผ่าน' . "</button>";
         } else {
        echo "<button type='button' class='btn btn-danger'>" . 'ตรวจสอบข้อมูล' . "</button>";
         }
      "</td>";
      echo "<td>";
         echo "<a href='adminpage-read.php?id=" . $row['id'] . "' title='View' class='btn btn-link'>ดูข้อมูล</a>";
         echo "<a href=' ". $row['id'] . " ' title='View' class='btn btn-link'>แก้ไข</a>";
      "</td>";
    "</tr>";
    } else if ($_SESSION['major'] == "0" && $row['type'] == 'admin') {
      echo "<tr>" ;
      echo "<td>" . $row['id'] . "</td>"; 
      echo "<td>" . $row['f_name'] ." ". $row['l_name'] . "</td>"; 
      echo "<td>" . $row['major'] . "</td>";
      // echo "<td>" ;
      //   if ($row['status'] == 0) {
      //   echo "<button type='button' class='btn btn-light'>" . 'รอผลการเรียน' . "</button>"; 
      //   } else if ($row['status'] == 1) {
      //   echo "<button type='button' class='btn btn-success'>" . 'ยื่นเรื่องสำเร็จ' . "</button>";
      //    } else if ($row['status'] == 2) {
      //   echo "<button type='button' class='btn btn-warning'>" . 'รอการตรวจสอบ' . "</button>";
      //    } else if ($row['status'] == 7) {
      //   echo "<button type='button' class='btn btn-danger'>" . 'ยังไม่ผ่าน' . "</button>";
      //    } else {
      //   echo "<button type='button' class='btn btn-danger'>" . 'ตรวจสอบข้อมูล' . "</button>";
      //    }
      // "</td>";
      echo "<td>";
         echo "<a href='adminpage-editAdminProfile.php?id=" . $row['id'] . "' title='View' class='btn btn-link'>ดูข้อมูล</a>";
        //  echo "<a href=' ". $row['id'] . " ' title='View' class='btn btn-link'>แก้ไข</a>";
      "</td>";
    "</tr>";
    }
        } ?>
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
    </div>
</body>
</html>

<script>
  $(document).ready(function(){
    $('#table_row').DataTable();
  });
</script>