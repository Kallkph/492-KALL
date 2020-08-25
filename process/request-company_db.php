<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php";

  $errors = array();

if(isset($_POST['r_submit'])){
  $data = array(
        
    "_id" => $_SESSION['id'],
    "txt_r_major" => $_SESSION['major'],
    "txt_r_company" => $_POST["txt_r_company"],
    "txt_r_about" => $_POST["txt_r_about"],
    "txt_r_set" => $_POST["txt_r_set"],
    "txt_r_address" => $_POST["txt_r_address"],
    "txt_r_mu" => $_POST["txt_r_mu"],
    "txt_r_road" => $_POST["txt_r_road"],
    "txt_r_address2" => $_POST["txt_r_address2"],
    "txt_r_city" => $_POST["txt_r_city"],
    "txt_r_state" => $_POST["txt_r_state"],
    "txt_r_zip" => $_POST["txt_r_zip"],
    "txt_r_phone" => $_POST["txt_r_phone"],
    "txt_r_fax" => $_POST["txt_r_fax"],
    "txt_r_yearnow" => $_POST["txt_r_yearnow"],
    "txt_r_startTime" => $_POST["txt_r_startTime"],
    "txt_r_endTime" => $_POST["txt_r_endTime"]
    
  );


    echo 'txtId >>>';
    echo $data['_id'];
        $user_check_query = "SELECT * FROM requestcompany WHERE id = $data[_id] ";
        
       
        print_r($query = mysqli_query($con, $user_check_query));
        

         if (count($errors) == 0) {
      echo 'error = 0';
      $sql =" INSERT INTO requestcompany (r_id, r_sid, r_major, r_yearnow, r_company, r_about, r_set, r_address, r_mu, r_road, r_address2, r_city, r_state, r_zip, r_phone, r_fax, r_startTime, r_endTime)
      VALUES
      (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
      ";
        $sql2 = "UPDATE users SET
        status = 2
        WHERE id = $_SESSION[id] ";
        $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());

        $uuid = generateRandomString(); 
        
        function generateRandomString($length = 15) {
          $characters = '0123456789';
          $charactersLength = strlen($characters);
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
          }
          return $randomString;
        }

      $qr = $con->prepare($sql);
      if($qr === false){
        echo "($qr === false)";
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
      }

    $qr->bind_param("ssssssssssssssssss",$uuid,$data["_id"],$data["txt_r_major"],$data["txt_r_yearnow"],$data["txt_r_company"], $data["txt_r_about"],$data["txt_r_set"], $data["txt_r_address"], $data["txt_r_mu"], $data["txt_r_road"], $data["txt_r_address2"], $data["txt_r_city"], $data["txt_r_state"],$data["txt_r_zip"],$data["txt_r_phone"],$data["txt_r_fax"],$data["txt_r_startTime"],$data["txt_r_endTime"]);
    $qr->execute();

    echo "if";
    $statusMsg = "สำเร็จ";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/afterindex.php';</script>";

    $qr->close();
  } else if((!count($errors) == 0)){

    print_r($errors);
      echo "else";
      echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
  }
} else {
  $data = array(
        
    "_id" => $_SESSION['id'],
    "txt_r_major" => $_SESSION['major'],
    "txt_r_company" => $_POST["txt_r_company"],
    "txt_r_about" => $_POST["txt_r_about"],
    "txt_r_address" => $_POST["txt_r_address"],
    "txt_r_yearnow" => $_POST["txt_r_yearnow"],
    "txt_r_startTime" => $_POST["txt_r_startTime"],
    "txt_r_endTime" => $_POST["txt_r_endTime"]
    
  );


    echo 'txtId >>>';
    echo $data['_id'];
        $user_check_query = "SELECT * FROM requestcompany WHERE id = $data[_id] ";
        
       
        print_r($query = mysqli_query($con, $user_check_query));
        

         if (count($errors) == 0) {
      echo 'error = 0';
      $sql =" INSERT INTO requestcompany (r_sid, r_major, r_yearnow, r_company, r_about, r_address, r_startTime, r_endTime)
      VALUES
      (?,?,?,?,?,?,?,?)
      ";
        $sql2 = "UPDATE users SET
        status = 2
        WHERE id = $_SESSION[id] ";
        $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());

      

      $qr = $con->prepare($sql);
      if($qr === false){
        echo "($qr === false)";
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
      }

    $qr->bind_param("ssssssss",$data["_id"],$data["txt_r_major"],$data["txt_r_yearnow"],$data["txt_r_company"], $data["txt_r_about"], $data["txt_r_address"], $data["txt_r_startTime"],$data["txt_r_endTime"]);
    $qr->execute();

    echo "if";
    $statusMsg = "สำเร็จ";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/afterindex.php';</script>";

    $qr->close();
  } else if((!count($errors) == 0)){

    print_r($errors);
      echo "else";
      echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
  }
}

  

?>