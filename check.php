<?php

$con=mysqli_connect('localhost','root','csec','todoregisteration');

if(isset($_POST['username']))
{
    $s="select * from usertable where username ='".$_POST["username"]."'";
    $result= mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    if($num>=1){
        echo '<span class="text-danger">Username already taken</span>';
    }else{
        echo '<span class="text-danger">Username already taken</span>';
    }
}
?>