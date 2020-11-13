<?php
session_start();
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'helpinghands');
$error=array();
$mail=$_POST['email'];
$pass=$_POST['password'];
$_SESSION['pmail']=$mail;
$q = "SELECT * FROM signin WHERE email = '".$mail."' && fpassword = '".$pass."' ";
$result=mysqli_query($con,$q);
$row=mysqli_num_rows($result);
if($row==1){
        header('location:accounthome.php');
}  
else{
    $_SESSION['mail']="true";
  
    header('location:login.php');
}
?>