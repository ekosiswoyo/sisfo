<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_deskripsi_raport WHERE id_deskripsi='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='deskripsi_walikelas.php';</script>";
}else{
	echo "gagal";
}

?>

