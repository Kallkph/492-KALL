<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include('connect.php');

//   $sql = "SELECT * From users inner join requestcompany on users.id = requestcompany._id";
//   $result = mysqli_query($con, $sql);

//   $id = '';
//   $updata = false;



  $errors = array();

  if (isset($_GET['success'])){
      
    $id = '5804722';
    // $id = $_GET['_id'];
    echo "if", $id;
    // $status = 1
    // $updata = true;
    // mysql_select_db(requestcompany);
    $con = "UPDATE users SET email= 1 WHERE _id=$id");
    // $sql->query("UPDATE requestcompany SET ='$status', WHERE _id=$id") or die($mysqli->error());

//   } else {
//     echo "else";
    header('location: adminpage.php');
  }

  
?>

<!-- <a href="adminpage_db.php?awite=
          class="btn btn-info">กำลังดำเนินการ</a>
          <a href="adminpage_db.php?success=
          class="btn btn-info">ดำเนินการสำเร็จ</a>
          <a href="adminpage_db.php?failed=