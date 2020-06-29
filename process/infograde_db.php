<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php";

  $errors = array();

if(isset($_POST['g_save'])){
  $data = array(
        
    "_id" => $_SESSION['id'],
    "txt_r_major" => $_SESSION['major'],
    "txt_r_company" => $_POST["txt_r_company"],
    "txt_r_set" => $_POST["txt_r_set"],
    "txt_r_address" => $_POST["txt_r_address"],
    "txt_r_address2" => $_POST["txt_r_address2"],
    "txt_r_city" => $_POST["txt_r_city"],
    "txt_r_state" => $_POST["txt_r_state"],
    "txt_r_zip" => $_POST["txt_r_zip"],
    "txt_r_phone" => $_POST["txt_r_phone"],
    "txt_r_fax" => $_POST["txt_r_fax"],
    "input_r_status" => "2"
    
  );


    echo 'txtId >>>';
    echo $data['_id'];
        $user_check_query = "SELECT * FROM requestcompany WHERE id = $data[_id] ";
        
       
        print_r($query = mysqli_query($con, $user_check_query));
        

         if (count($errors) == 0) {
      echo 'error = 0';
      $sql =" INSERT INTO requestcompany (r_id, r_major, r_company, r_set, r_address, r_address2, r_city, r_state, r_zip, r_phone, r_fax, r_status)
      VALUES
      (?,?,?,?,?,?,?,?,?,?,?,?)
      ";

      

      $qr = $con->prepare($sql);
      if($qr === false){
        echo "($qr === false)";
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
      }

    $qr->bind_param("ssssssssssss",$data["_id"],$data["txt_r_major"],$data["txt_r_company"],$data["txt_r_set"], $data["txt_r_address"], $data["txt_r_address2"], $data["txt_r_city"], $data["txt_r_state"],$data["txt_r_zip"],$data["txt_r_phone"],$data["txt_r_fax"],$data["input_r_status"]);
    $qr->execute();

    echo "if";
    $statusMsg = "สำเร็จ";
    echo "<script type='text/javascript'>alert('$statusMsg');window.location ='index.php';</script>";

    $qr->close();
  } else if((!count($errors) == 0)){

    print_r($errors);
      echo "else";
      echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
  }
}

  

?>