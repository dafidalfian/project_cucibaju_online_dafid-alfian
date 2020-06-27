<?php
    include "koneksi.php";
        $username=$_POST['username'];
        $kategori=$_POST['paket'];
        $jenis=$_POST['jenis'];
        $pewangi=$_POST['pewangi'];
        $total=$_POST['total'];
        $berat=$_POST['berat'];

        $sql="INSERT INTO `tb_order` (`id_order`, `id_username`, `id_kategori`, `id_jenis`, `id_pewangi`, `total_harga`, `berat_cucian`, `tanggal`, `status_cucian`) VALUES (NULL, '$username', '$kategori', '$jenis', '$pewangi', '$total', '$berat', NOW(), 'Pending'); ";
        $result=mysql_query($sql);
        if($result)
        {   
        header ("Location:history_order.php");
        }
        else
        {
            echo "Gagal";
        }

?>