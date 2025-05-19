<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "aqi_db";
$conn = "";

try {
  $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

  if ($conn) {
    echo "connected";

  }
}
catch(Exception $e){
  echo "not connected";
}


?>
