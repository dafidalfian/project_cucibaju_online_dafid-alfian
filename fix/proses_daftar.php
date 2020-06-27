<?php
	include "koneksi.php";

$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['nama'];
$alamat=$_POST['alamat'];

if($foto=$_FILES['foto']['name'])
	{
		$foto = "FOTO-".date('His')."-".rand(1,1000).".".$foto;
		$tmp=$_FILES['foto']['tmp_name'];
		$path="images/".$foto;

		if(move_uploaded_file($tmp, $path))
		{
			echo "";
		}
		else
		{
			echo "error";
		}

	}
	else
	{
		echo "error";
	}

	if($ktp=$_FILES['ktp']['name'])
	{
		$ktp = "KTP-".date('His')."-".rand(1,1000).".".$ktp;
		$tmp2 = $_FILES['ktp']['tmp_name'];
		$path2="images/".$ktp;

		if(move_uploaded_file($tmp2, $path2))
		{
			echo "";
		}
		else
		{
			echo "error";
		}

	}
	else
	{
		echo "error";
	}

	$query="INSERT INTO `tb_user` (`id_username`, `username_user`, `password_user`, `email_user`, `nama_user`, `alamat_user`, `ktp_user`, `profil_user`) VALUES (NULL, '$username', '$password', '$email', '$name', '$alamat', '$ktp', '$foto');";
	$sql = mysql_query($query);
	if ($sql) {
			header('location:login.php');
	}else {
			echo "Maaf Terjadi Keslahan Saat Menyimpan Data Ke Database";
			echo "<br><a href='login.php'>Kembali ke Form</a>";
	}


?>