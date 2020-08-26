<?php


session_start();


$con=mysqli_connect('localhost','root','csec','todoregisteration');
$uname='';
$psw='';
$username=$_POST['uname'];
$password=$_POST['psw'];


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