<?php

$config = array(
  "host"=>"127.0.0.1",
  "user"=>"root",
  "pass"=>"",
  "dbname"=>"dbinternship",
  "charset"=>"utf8",
);

$con = new mysqli($config["host"], $config["user"], $config["pass"], $config["dbname"]);
$con->set_charset($config["charset"]);

if($con->connect_error) {
  trigger_error("Database connect failed".$con->connect_error, E_USER_ERROR);
} else {
  // echo console.log("OK")
  // echo "Connect OK..12345";
}

?>