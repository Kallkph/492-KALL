<?php 
    session_start();
    include('server.php');
    
    $errors = array();
    if (isset($_POST['reg_user'])) {
        $data = array(
            "txt_id" => $_POST["txt_id"],
            "txt_fname" => $_POST["txt_fname"],
            "txt_lname" => $_POST["txt_lname"],
            "txt_mail" => $_POST["txt_mail"],
            "txt_pwd" => $_POST["txt_pwd"],
            "txt_cpwd" => $_POST["txt_cpwd"]
        );
    // if (isset($_POST['reg_user'])) {
    //     $s_id = mysqli_real_escape_string($conn, $_POST['username']);
    //     $email = mysqli_real_escape_string($conn, $_POST['email']);
    //     $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    //     $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    //     // "txt_fname" => $_POST["txt_fname"],
    //     // "txt_lname" => $_POST["txt_lname"],
    //     // "txt_mail" => $_POST["txt_mail"],
    //     // "txt_pwd" => $_POST["txt_pwd"],
    //     // "txt_cpwd" => $_POST["txt_cpwd"]
        echo('ข้อมูลเข้า  ');
        // echo( $data );
        print_r($data);
      


///condition txt come && push_error
        // if (empty($username)) {
        //     array_push($errors, "Username is required");
        // }
        // if (empty($email)) {
        //     array_push($errors, "Email is required");
        // }
        // if (empty($password_1)) {
        //     array_push($errors, "Password is required");
        // }
        // if ($password_1 != $password_2) {
        //     array_push($errors, "The two passwords do not match");
        // }

        
        $user_check_query = "SELECT * FROM users WHERE s_id = 'txt_id' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);
        // echo('qwe');4
        echo ($result);
        print_r($result);
        

        if($result){
            echo ('if');
            array_push($errors, "Username already exists");
        }

        print_r($errors);
        
        if (count($errors) == 0 AND $data) {
            // $password = ($password_1);
            $sql =" INSERT INTO users (s_id, s_fname, s_lname, s_email, s_password)
            VALUES
            (?, ?, ?, ?, ?)
            ";
                $qr = $con->prepare($sql);
                if($qr === false){
                  trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
                }
            
                $qr->bind_param("sssss", $data["txt_id"], $data["txt_fname"], $data["txt_lname"], $data["txt_mail"], $data["txt_pwd"]);
                $qr->execute();
                $qr->close();
            // $sql = " INSERT INTO users (s_id, s_fname, s_lname, s_email, s_password) VALUES (?, ?, ?, ?, ?)";
            // $sql = "INSERT INTO user (username, email, password) VALUES ('$s_id', '$email', '$password')";
            mysqli_query($conn, $sql);
            echo('สมัครสมาชิกสำเร็จ');


            // $_SESSION['username'] = $username;
            // $_SESSION['success'] = "You are now logged in";
            // header('location: index.php');
        }
    } 
        // else {
        //     array_push($errors, "Username or Email already exists");
        //     $_SESSION['error'] = "Username or Email already exists";
        //     header("location: register.php");
        // }
    

?>