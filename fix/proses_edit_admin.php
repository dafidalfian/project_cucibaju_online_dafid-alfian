<?php
include "koneksi.php";

$id_admin = $_POST['id_admin'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

		$query = "UPDATE tb_admin SET username_admin='$username', password_admin='$password', nama_admin='$nama' WHERE id_admin='$id_admin'";
	$sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: admin.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='edit_admin.php'>Kembali Ke Form</a>";
	}
?>