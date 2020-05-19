<?php 
  session_start();
  include('connect.php');
  $errors = array();

  if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['txt_email']);
    $password = mysqli_real_escape_string($con, $_POST['txt_password']);
    if (empty($email)) {
      array_push($errors, "email is required");
    } else {
    $errors = array();
    }
    print_r($errors);
    if (count($errors) == 0) {
      $user_check_query = "SELECT * FROM users WHERE s_email = '$email' AND s_password = '$password' ";
      $query = mysqli_query($con, $user_check_query);
      $result = mysqli_fetch_assoc($query);
      print_r($result);
      echo('____if have count');
      if ($result) {
        echo('have result');
        echo "<script type='text/javascript'>alert('$statusMsg');window.location ='index.php';</script>";
        header("location: index.php");
      } else {
        array_push($errors, "Wrong username/password combination");
        $_SESSION['error'] = "Wrong username or password try again!";
      }
    }
  }

?>