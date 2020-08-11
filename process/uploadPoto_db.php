<meta charset="UTF-8">
<?php 

include "../configure/connect.php";
session_start();




if ($_POST['btn_upload'] == 'upload_weekstamp') {
    echo "<pre>", print_r($_POST, true), "</pre>";
    $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');

        date_default_timezone_get('Asia/Bangkok');
        $date = date("Ymd");

    $upload = $_FILES["fileupload"];
    if ($upload != '') {
        $path = "../scr/fileupload/";
        $type = strrchr($_FILES['fileupload']['name'],".");
        $numrand = (mt_rand());
        $newname = $date.$numrand.$type;
        $path_copy = $path.$newname;
        $path_link = "fileupload/".$newname;
        $week = "week".$_POST['weekstamp'];

        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);


        $sql = "INSERT INTO uploadfile (fileupload, u_id, type)
        VALUES(?, ?, ?)
        ";

        $qr = $con->prepare($sql);
        if($qr === false){
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
        }

        $qr->bind_param("sss", $newname, $_POST['upload_id'], $week);
        $qr->execute();



        $statusMsg = "upload $week สำเร็จ";
        echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/user/weekstamp.php';</script>";

        $qr->close();
    }
} else if ($_POST['btn_upload'] == 'upload_map')  {
    echo "<pre>", print_r($_POST, true), "</pre>";
    $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');

        date_default_timezone_get('Asia/Bangkok');
        $date = date("Ymd");

    $upload = $_FILES["fileupload"];
    if ($upload != '') {
        $path = "../scr/fileupload/";
        $type = strrchr($_FILES['fileupload']['name'],".");
        $numrand = (mt_rand());
        $newname = $date.$numrand.$type;
        $path_copy = $path.$newname;
        $path_link = "fileupload/".$newname;
        $maps = $_POST['weekstamp'];

        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);


        $sql = "INSERT INTO uploadfile (fileupload, u_id, type)
        VALUES(?, ?, ?)
        ";

        $qr = $con->prepare($sql);
        if($qr === false){
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
        }

        $qr->bind_param("sss", $newname, $_POST['upload_id'], $maps);
        $qr->execute();



        $statusMsg = "upload map สำเร็จ";
        echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/user/weekstamp.php';</script>";

        $qr->close();
    }
}  else if ($_POST['btn_upload'] == 'upload_c')  {
    echo "<pre>", print_r($_POST, true), "</pre>";
    $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');

        date_default_timezone_get('Asia/Bangkok');
        $date = date("Ymd");

    $upload = $_FILES["fileupload"];
    if ($upload != '') {
        $path = "../scr/fileupload/";
        $type = strrchr($_FILES['fileupload']['name'],".");
        $numrand = (mt_rand());
        $newname = $date.$numrand.$type;
        $path_copy = $path.$newname;
        $path_link = "fileupload/".$newname;
        $c_id = $_POST['weekstamp'];

        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);


        $sql = "INSERT INTO uploadfile (fileupload, u_id, type)
        VALUES(?, ?, ?)
        ";

        $qr = $con->prepare($sql);
        if($qr === false){
        trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
        }

        $qr->bind_param("sss", $newname, $_POST['upload_id'], $c_id);
        $qr->execute();



        $statusMsg = "upload map สำเร็จ";
        echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/user/weekstamp.php';</script>";

        
        $qr->close();
        


    }
}




// $sql =" INSERT INTO users (id, f_name, l_name, email, major, tel, type, password)
// VALUES
// (?, ?, ?, ?, ?, ?, ?, ?)
// ";

// $qr = $con->prepare($sql);
// if($qr === false){
//   trigger_error("Wrong SQL : ".$sql."Error :".$son->erro, E_USER_ERROR);
// }

// $qr->bind_param("ssssssss", $data["txt_id"], $data["txt_fname"], $data["txt_lname"], $data["txt_mail"], $data["major"],  $data["txt_tel"], $data["type"], $data["txt_pwd"]);
// $qr->execute();



// $statusMsg = "สมัครสมาชิกเรียบร้อย";
// echo "<script type='text/javascript'>alert('$statusMsg');window.location ='../wedpage/index.php';</script>";

// $qr->close();
// }



?>