<?php


session_start();


$con=mysqli_connect('localhost','root','csec','todoregisteration');
$username='';
if(isset($_POST["uname"])){
$username=$_POST['uname'];
$password=$_POST['psw'];
}

$s="select * from usertable where username ='$username'";

$result= mysqli_query($con,$s) or die( mysqli_error($con));

$num=mysqli_num_rows($result);

if($num>=1){

    
}else{
    $reg="insert into usertable(username,password)values('$username','$password')";
    mysqli_query($con,$reg);
    header("Location:logintodo.php");
   
   }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="todo.css" class="css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Sign Up</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}



/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 35%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
  <div class="header">
    <h1><i class="fa fa-check-circle"style="font-size:50px;" ></i><strong>TODO</strong></h1><a href="signup.php"class="sign">Sign Up</a>&nbsp&nbsp&nbsp<a class="login" href="logintodo.php">Login</a>
  </div>
<h1><strong>Sign Up</strong></h1>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="signup.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container" id="display" action="#" method="POST">
      <script type="text/javascript" src="jquery.js"></script>
      <label for="uname"><b>Username</b></label><br>
      <input type="text" placeholder="Enter Username" name="uname" id="username" required><br><div id="status"></div>
      <script type="text/javascript" src="checkuser.js"></script>
      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="psw" id="password" required><br>
        
      <button type="submit" id="data"><strong>Sign Up</strong></button><br>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    
  </form>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDo you already have an account?<a href="logintodo.php">Login here</a></p>
    </div>

  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');


</script>

<script>
 
</script>
</body>
</html>
