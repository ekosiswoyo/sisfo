<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_saran WHERE id_saran='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='saran_walikelas.php';</script>";
}else{
	echo "gagal";
}

?>

