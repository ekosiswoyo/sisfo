<?php
include ('../config.php');
$id = $_GET['id'];
$nis = $_GET['nis'];
$kelas = $_GET['kelas'];
$query = mysqli_query($connect,"DELETE FROM tb_nilai_sikap WHERE kd_nilai_sikap='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='input_sosial.php?id=$nis&kelas=$kelas';</script>";
}else{
	echo "gagal";
}

?>

