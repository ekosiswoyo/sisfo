<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_kehadiran WHERE id_kehadiran='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='kehadiran_walikelas.php';</script>";
}else{
	echo "gagal";
}

?>

