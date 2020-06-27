<?php
include "koneksi.php";

$id_user = $_POST['id_user'];
$status = $_POST['status'];
$id_order = $_POST['id_order'];
		$query = "UPDATE `tb_order` SET `status_cucian` = '$status' WHERE `tb_order`.`id_order` = '$id_order'";
	$sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: pemesanan.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='pemesanan.php'>Kembali Ke Form</a>";
	}
?>