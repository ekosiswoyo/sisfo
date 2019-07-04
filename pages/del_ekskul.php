<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_ekstrakurikuler WHERE kd_ekskul='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='ekskul.php';</script>";
}else{
	echo "gagal";
}

?>

