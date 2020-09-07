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
  
  if($_GET['id']){
    include('../../configure/connect.php');
    $sql = "SELECT DISTINCT * From company WHERE c_id = ?";

    if($stmt = mysqli_prepare($con, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $param_id);

      $param_id = trim($_GET['id']);

      if(mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);

          $name = $row['c_id'];

          // print_r($row);
        } else {
          echo "else";
          // header("locatino: index.")
        }
      }
    }
    $sql2 = "SELECT DISTINCT* From company inner join requestcompany on company.c_name = requestcompany.r_company inner join users on users.id = requestcompany.r_sid WHERE c_name = '$row[c_name]'";
    $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
    print_r($result2);
    // while($rows = $result2->fetch_assoc()){
    //   print_r($rows);
    // }
  }


  
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
    echo "<a href='adminpage-companay.php' class='list-group-item list-group-item-action list-group-item-light'>ดูข้อมูลสถานประกอบการ</a>";
  }
  ?>              
</div>



                  <div class="fakeimg" style="height:200px;"></div>  
           </div>
              </div>
              
              <div class="rightcolumn">
                
                <div class="card2fortable">
                  
                แก้ไขข้อมูลสถานประกอบการใหม่
               
<form action="../../process/editCompany_db.php" method="post">

  <div class="form-group"  style="width: 600px">
    <label for="exampleFormControlInput1" bootstrap style="margin-top: 50px " >แก้ไขข้อมูลสถานประกอบการใหม่</label>
    <!-- <input type="text" class="form-control" id="exampleFormControlInput1" name="txtc_name" placeholder=""> -->
    ชื้อ สถานประกอบการ : <input type="text" id="txtc_name" name="txtc_name" value='<?php echo $row['c_name']?>'> 
  </div>
  <div class="form-group"  style="width: 600px">
  <!-- สาขา : <input type="text" id="" name="" value='?php echo $row['']?>'>  -->
  </div>
  <div class="form-group" style="width: 600px">
    <label for="exampleFormControlTextarea1">ข้อมูลที่อยู่</label>
    <input type="text" id="txtc_address" name="txtc_address" style="height: 200px"  value='<?php echo $row['c_address']?>'> 
    <!-- <textarea class="form-control" id="exampleFormControlTextarea1" name="txtc_address" rows="3" ></textarea> -->
  </div>
  <div class="form-group"  style="width: 600px">
    <label for="exampleFormControlTextarea1" >ข้อมูลผู้ดูแลฝึกงาน</label>
    <input type="text" id="txtc_detail" name="txtc_detail" style="height: 200px"  value='<?php echo $row['c_detail']?>'>
  </div>

  <div class="form-group"  style="width: 600px">
    <label for="exampleFormControlInput1" bootstrap style="margin-top: 0px " >เบอร์โทรติดต่อ</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="txtc_tel" placeholder="เบอร์โทรติดต่อ" value='<?php echo $row['c_tel']?>'>
  </div>
  
  <input type='hidden' id='c_id' name='txtc_id' value='<?php echo $row['c_id'] ?>'>
  <?php if ($_SESSION['major'] == '0') { ?>
  <button type="submit" class="btn btn-light" id="btn_submit" name="reg" value="Save...">เพิ่ม</button>
<?php } ?>
</form>

ตารางแสดง ข้อมูลผู้ฝึกงาน ณ สถานประกอบการแห่งนี้

<table class="table" id="table_row" width="1100px">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">ลำดับ</th> -->
      <th scope="col" width="20%">รหัสนักศึกษา</th>
      <th scope="col" width="11%">ชื่อ</th>
      <th scope="col"  width="10%">สาขา</th>
      <th scope="col"  width="30%">เริ่มฝึกเมื่อ</th>
      <th scope="col"  width="30%">สิ้นสุดการฝึก</th>
      <th scope="col"  width="30%">สถานะ</th>
      <th scope="col"  width="30%"></th>
    </tr>
  </thead>
  
  <tbody>
 
  <!-- ?php while($row = $result->fetch_assoc()){ -->
    <?php while($rows = $result2->fetch_assoc()){
      // print_r($rows);
    echo "<tr>" ;
      echo "<td>" . $rows['r_sid'] . "</td>"; 
      echo "<td>" . $rows['f_name'] ." ". $rows['l_name'] . "</td>"; 

      $major = $rows['r_major'];
                  switch ($major) {
                    case "cen":
                      $majorName = 'วิศวกรรมโยธา';
                      break;
                    case "che":
                      $majorName = 'วิศวกรรมเคมี';
                      break;
                    case "env":
                      $majorName = 'วิศวกรรมสิ่งแวดล้อม';
                      break;
                    case "aen":
                      $majorName = 'วิศวกรรมยานยนต์';
                      break;
                    case "een":
                      $majorName = 'วิศวกรรมไฟฟ้า';
                      break;
                    case "ien":
                      $majorName = 'วิศวกรรมอุตสาหการ';
                      break;
                    case "men":
                      $majorName = 'วิศวกรรมเครื่องกล';
                      break;
                    case "cpe":
                      $majorName = 'วิศวกรรมคอมพิวเตอร์';
                      break;
                    default:
                    $majorName = 0;
                  }
                  // echo  $majorName;

      echo "<td>" . $majorName . "</td>";
      echo "<td>" . $rows['r_startTime'] . "</td>";
      echo "<td>" . $rows['r_endTime'] . "</td>";
      echo "<td>" ;
        if ($rows['status'] == 0) {
        echo "<button type='button' class='btn btn-light'>" . 'รอผลการเรียน' . "</button>"; 
        } else if ($rows['status'] == 1) {
        echo "<button type='button' class='btn btn-success'>" . 'ยื่นเรื่องสำเร็จ' . "</button>";
         } else if ($rows['status'] == 2) {
        echo "<button type='button' class='btn btn-warning'>" . 'รอการตรวจสอบ' . "</button>";
         } else if ($rows['status'] == 7) {
        echo "<button type='button' class='btn btn-danger'>" . 'ยังไม่ผ่าน' . "</button>";
         } else {
        echo "<button type='button' class='btn btn-danger'>" . 'ตรวจสอบข้อมูล' . "</button>";
         }
      "</td>";
      echo "<td>";
        //  echo "<a href='adminpage-read.php?id=" . $row['id'] . "' title='View' class='btn btn-link'>ดูข้อมูล</a>";
        //  echo "<a href=' ". $row['id'] . " ' title='View' class='btn btn-link'>แก้ไข</a>";
      "</td>";
    "</tr>";
        }?>
  </tbody>
</table>
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