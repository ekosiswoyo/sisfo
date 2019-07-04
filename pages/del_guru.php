<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_guru WHERE nip='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='guru.php';</script>";
}else{
	echo "gagal";
}

?>

