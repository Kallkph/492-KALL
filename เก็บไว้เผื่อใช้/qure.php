<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "dbinternship";

    // Create Connection
    $mysqli = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Perform query
if ($result = $mysqli -> query("SELECT * FROM users")) {
  echo "Returned rows are: " . $result -> num_rows;
  // Free result set
  $result -> free_result();
}

$result = mysqli_query "SELECT id, name FROM mytable" ;

while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
    printf("ID: %s  Name: %s", $row[0], $row[1]);  
}

mysqli_free_result($result);


$mysqli -> close();
?>


        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

