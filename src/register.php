<?php
session_start();
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'helpinghands');
$error=array();
$ename=$_POST['name'];
$mail=$_POST['email'];
$pass=$_POST['password'];
$num=$_POST['phone'];
$q = "SELECT * FROM signin WHERE email = '".$mail."' && fpassword = '".$pass."' ";
$result=mysqli_query($con,$q);
$row=mysqli_num_rows($result);
if(!empty($num)){
    if(!preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10\d$/",$num)){
        $_SESSION['phone']="true";
    }
}

if($row==1){
        $_SESSION['email']="true";
        header('location:signup.php');
}  
else{
    if($_SESSION['phone']=="true"){
        header('location:signup.php');
    }
    else{
        $q1="insert into signin(username,email,fpassword,phone) values ('$ename','$mail','$pass','$num')";
        mysqli_query($con,$q1);
        $_SESSION['pmail']=$mail;
        header('location:login.php');
    }
   
}
?>