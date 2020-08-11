<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php";

  $errors = array();

if(isset($_POST['reg'])){
  $data = array(
    "c_name" => $_POST["txtc_name"],
    "c_major" => $_POST["txtc_major"],
    // "c_address" => $_POST["txtc_address"],
    // "c_detail" => $_POST["txtc_detail"],
  );



    // echo 'txtId >>>';
    // echo $data['txt_id'];
    //     $user_check_query = "SELECT * FROM users WHERE id = $data[txt_id] ";
    //     $query = mysqli_query($con, $user_check_query);
    //     $result = mysqli_fetch_assoc($query);
    //     // echo('qwe');4
       
    //     print_r($result);
        

    //     if($result){
    //       echo ($result);
    //       if($result['id'] === $data['txt_id']){
    //         array_push($errors, "Username already exists or email");
    //         echo 'มี id นี้ในระบบแล้ว';
    //       }
    //       if($result['email'] === $data['txt_mail']){
    //           array_push($errors, "Username already exists or email");
    //         echo 'มี id นี้ในระบบแล้ว';
    //       }
    //       // $statusMsg = "โปรดระบุรหัสผ่านและรหัสยืนยัน ให้ตรงกัน";
    //       // echo "<script type='text/javascript'>alert('$statusMsg')";
    //       // print_r($errors);
    //       //   echo ('if (have result(มีอยู่แล้ว))');
    //       //   array_push($errors, "Username already exists");
    //     }

        // print_r($errors);
    
    if (count($errors) == 0) {
      echo 'error = 0';
      $sql =" INSERT INTO company (c_id, c_name, c_major) 	
      VALUES
      (?, ?, ?)
      ";

      $qr = $con->prepare($sql);
      if($qr === false){
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
      }


      $uuid = generateRandomString(); 

    $qr->bind_param("sss",$uuid , $data["c_name"], $data["c_major"]);
    $qr->execute();

  

    $statusMsg = "เพิ่มข้อมูลเรียบร้อย";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/admin/adminpage-companay.php';</script>";

    $qr->close();
  } else if((!count($errors) == 0)){
    echo $errors;
    print_r($errors);
      $statusMsg = "else";
      echo "else";
      // echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
  }
}
  
// echo ;

function generateRandomString($length = 8) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
?>


