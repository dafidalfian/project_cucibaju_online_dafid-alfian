<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$foto = $_POST['foto'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];

	// Set path folder tempat menyimpan fotonya
	$path = "images/".$foto;

	// Proses upload
	if(move_uploaded_file($tmp, $path)){ 
		$query = "SELECT * FROM id_user WHERE id_username='$id_user'";
		$sql = mysql_query($query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysql_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		// Hapus file foto sebelumnya yang ada di folder images
		unlink("images/".$data['foto']);
		
		// Proses ubah data ke Database
		$query = "UPDATE tb_user SET username_user='$username', password_user='$password', email_user='$email',nama_user='$nama',alamat='$alamat', profil_user='$foto' WHERE id_username='$id_user'";
		$sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: user.php"); // Redirect ke halaman index.php
		}else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='edit_akun.php'>Kembali Ke Form</a>";
		}
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='edit_akun.php'>Kembali Ke Form</a>";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
		$query = "UPDATE tb_user SET username_user='$username', password_user='$password', email_user='$email', nama_user='$nama',alamat_user='$alamat' WHERE id_username='$id_user'";
	$sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: user.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='edit_akun.php'>Kembali Ke Form</a>";
	}
}
?>
