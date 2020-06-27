<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
 
$sql="SELECT * FROM `tb_user` WHERE username_user='$username' and password_user='$password'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
 
if(empty($username) && empty($password)){
            header("Location: login.php?error=3");
            exit();
        } else if(empty($username)){
            header("Location: login.php?error=1");
            exit();
        } else if(empty($password)){
            header("Location: login.php?error=2");
            exit();
        }

if($count==1){
$_SESSION['username']=$username;
header("location:user.php");
}
else {
header("Location: login.php?error=4");
            exit();
}

?>