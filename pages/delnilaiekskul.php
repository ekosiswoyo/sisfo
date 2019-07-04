<?php
include ('../config.php');
$id = $_GET['id'];
$nis = $_GET['nis'];
$kelas = $_GET['kelas'];
$query = mysqli_query($connect,"DELETE FROM tb_nilai_ekskul WHERE kd_nilai_ekskul='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='input_eks.php?id=$nis&kelas=$kelas';</script>";
}else{
	echo "gagal";
}

?>

