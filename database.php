<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "project_aqi_db";
$conn = "";

try {
  $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

  if ($conn) {

  }
}
catch(Exception $e){
  echo "not connected";
}


?>
