<?php
ob_start();
include "koneksi.php";

mysql_query("DELETE FROM `tb_order` WHERE `tb_order`.`id_order` ='$_GET[id_order]'");
header('location:pemesanan.php');
?>