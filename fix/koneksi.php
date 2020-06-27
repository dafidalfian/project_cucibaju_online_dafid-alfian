<?php
$host='localhost';
$user='root';
$pass='';
$database='laundry';

$sql=mysql_connect("$host","$user","$pass");
mysql_select_db("$database",$sql) or die ("Maaf Database Tidak Ditemukan".mysql_error());

?>