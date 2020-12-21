<?php
  session_start();

  echo "<pre>", print_r($_POST, true), "</pre>";

  include "../configure/connect.php";

  $errors = array();

  if($_POST['g_save'] == 'Save1'){
    $data = array(
          
      "_id" => $_SESSION['id'],
      "class" => $_POST['g_class'],
      "sumcredit" => $_POST["g_sumcredit"],
      "gpa" => $_POST["g_gpa"],
      "term" => $_POST["g_term"],
      "yearTerm" => $_POST["g_yearTerm"],
      "creditnow" => $_POST["g_creditnow"],
      "s1_name" => $_POST["s1_name"],
      "s1_term" => $_POST["s1_term"],
      "s1_year" => $_POST["s1_year"],
      "s1_grade" => $_POST["s1_grade"]

    );

    print_r($data);

    echo $_SESSION['id'];

    $user_check_query = "SELECT * FROM grade WHERE g_id = $data[_id] ";
    print_r($query = mysqli_query($con, $user_check_query));
  
    if (count($errors) == 0) {
      echo 'error = 0';
      $sql =" INSERT INTO grade (g_id, g_class, g_credit, g_gpa, g_termnow, g_yearnow, g_creditnow, g_subject1, g_term1, g_year1, g_gpa1)

      VALUES
      (?,?,?,?,?,?,?,?,?,?,?)
      ";
      $sql2 = "UPDATE users SET
        status = 3
        WHERE id = $_SESSION[id] ";
        $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());

    
      $qr = $con->prepare($sql);
      if($qr === false){
        echo "($qr === false)";
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
      }

      $qr->bind_param("sssssssssss",$data["_id"],$data["class"],$data["sumcredit"],$data["gpa"], $data["term"], $data["yearTerm"], $data["creditnow"], $data["s1_name"],$data["s1_term"],$data["s1_year"],$data["s1_grade"]);
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

  } else if($_POST['g_save'] == 'Save2'){
      $data = array(
            
        "_id" => $_SESSION['id'],
        "class" => $_POST['g_class'],
        "sumcredit" => $_POST["g_sumcredit"],
        "gpa" => $_POST["g_gpa"],
        "term" => $_POST["g_term"],
        "yearTerm" => $_POST["g_yearTerm"],
        "creditnow" => $_POST["g_creditnow"],
        "s1_name" => $_POST["s1_name"],
        "s1_term" => $_POST["s1_term"],
        "s1_year" => $_POST["s1_year"],
        "s1_grade" => $_POST["s1_grade"],
        "s2_name" => $_POST["s2_name"],
        "s2_term" => $_POST["s2_term"],
        "s2_year" => $_POST["s2_year"],
        "s2_grade" => $_POST["s2_grade"]
  
      );
  
      print_r($data);
  
      echo $_SESSION['id'];
  
      $user_check_query = "SELECT * FROM grade WHERE g_id = $data[_id] ";
      print_r($query = mysqli_query($con, $user_check_query));
    
      if (count($errors) == 0) {
        echo 'error = 0';
        $sql =" INSERT INTO grade (g_id, g_class, g_credit, g_gpa, g_termnow, g_yearnow, g_creditnow, g_subject1, g_term1, g_year1, g_gpa1, g_subject2, g_term2, g_year2, g_gpa2)
        
        VALUES
        (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ";
        $sql2 = "UPDATE users SET
        status = 3
        WHERE id = $_SESSION[id] ";
        $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
  
      
        $qr = $con->prepare($sql);
        if($qr === false){
          echo "($qr === false)";
          trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
        }
  
        $qr->bind_param("sssssssssssssss",$data["_id"],$data["class"],$data["sumcredit"],$data["gpa"], $data["term"], $data["yearTerm"], $data["creditnow"],
          $data["s1_name"],$data["s1_term"],$data["s1_year"],$data["s1_grade"],
          $data["s2_name"],$data["s2_term"],$data["s2_year"],$data["s2_grade"]);
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
  } else if($_POST['g_save'] == 'Save3'){
    $data = array(
            
      "_id" => $_SESSION['id'],
      "class" => $_POST['g_class'],
      "sumcredit" => $_POST["g_sumcredit"],
      "gpa" => $_POST["g_gpa"],
      "term" => $_POST["g_term"],
      "yearTerm" => $_POST["g_yearTerm"],
      "creditnow" => $_POST["g_creditnow"],
      "s1_name" => $_POST["s1_name"],
      "s1_term" => $_POST["s1_term"],
      "s1_year" => $_POST["s1_year"],
      "s1_grade" => $_POST["s1_grade"],
      "s2_name" => $_POST["s2_name"],
      "s2_term" => $_POST["s2_term"],
      "s2_year" => $_POST["s2_year"],
      "s2_grade" => $_POST["s2_grade"],
      "s3_name" => $_POST["s3_name"],
      "s3_term" => $_POST["s3_term"],
      "s3_year" => $_POST["s3_year"],
      "s3_grade" => $_POST["s3_grade"]

    );

    print_r($data);

    echo $_SESSION['id'];

    $user_check_query = "SELECT * FROM grade WHERE g_id = $data[_id] ";
    print_r($query = mysqli_query($con, $user_check_query));
  
    if (count($errors) == 0) {
      echo 'error = 0';
      $sql =" INSERT INTO grade (g_id, g_class, g_credit, g_gpa, g_termnow, g_yearnow, g_creditnow,
        g_subject1, g_term1, g_year1, g_gpa1,
        g_subject2, g_term2, g_year2, g_gpa2,
        g_subject3, g_term3, g_year3, g_gpa3)
      VALUES
      (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
      ";
      $sql2 = "UPDATE users SET
        status = 3
        WHERE id = $_SESSION[id] ";
        $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());


    
      $qr = $con->prepare($sql);
      if($qr === false){
        echo "($qr === false)";
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
      }

      $qr->bind_param("sssssssssssssssssss",$data["_id"],$data["class"],$data["sumcredit"],$data["gpa"], $data["term"], $data["yearTerm"], $data["creditnow"],
        $data["s1_name"],$data["s1_term"],$data["s1_year"],$data["s1_grade"],
        $data["s2_name"],$data["s2_term"],$data["s2_year"],$data["s2_grade"],
        $data["s3_name"],$data["s3_term"],$data["s3_year"],$data["s3_grade"]);
      $qr->execute();

      echo "if";
      $statusMsg = "สำเร็จ";
      updateStatus(true);
      echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/afterindex.php';</script>";

      $qr->close();
    } else if((!count($errors) == 0)){

      print_r($errors);
        echo "else";
        echo "<script type='text/javascript'>alert('$statusMsg');window.location ='register.php';</script>";
    }
  } else {
    print_r($errors);
    echo "else";
  }

  function updateStatus($data){
    echo $data;
  }
?>