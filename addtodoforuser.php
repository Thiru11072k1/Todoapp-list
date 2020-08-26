<?php
  $DBSERVER="localhost";
  $DBUSER="root";
  $DBPASS="csec";
  $DBNAME="todoregisteration";

  $con = mysqli_connect($DBSERVER, $DBUSER, $DBPASS, $DBNAME);
  
  if (!$con) {
    echo "failed to connect to database".mysqli_error($con);
  } 
  
?>
