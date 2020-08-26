<?php
  $DB_SERVER="localhost";
  $DB_USER="root";
  $DB_PASS="csec";
  $DB_NAME="ytbtodo";

  $connection = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
  
  if (!$connection) {
    echo "failed to connect to database".mysqli_error($connection);
  } 
  
?>
