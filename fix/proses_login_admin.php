<?php
session_start();
include 'koneksi.php';

$username = $_POST['username_admin'];
$password = $_POST['password_admin'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
 
$sql="SELECT * FROM `tb_admin` WHERE username_admin='$username' and password_admin='$password'";
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
$_SESSION['username_admin']=$username;
header("location:admin.php");
}
else {
header("Location: login_admin.php?error=4");
            exit();
}

?>