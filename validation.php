<?php


session_start();

$con=mysqli_connect('localhost','root','csec','todoregisteration');

$username=$_POST['uname'];
$password=$_POST['psw'];


$s="select * from usertable where username='$username'&& password='$password'";

$result= mysqli_query($con,$s);

$num=mysqli_num_rows($result);

if($num >=1){

    $_SESSION['uname']=$username;
    header('location:todo.php');
}else{
    
   header("Location:wrongpass.php");
}
?>
