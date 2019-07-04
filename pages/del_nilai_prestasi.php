<?php
include ('../config.php');
$id = $_GET['id'];
$nis = $_GET['nis'];
$kelas = $_GET['kelas'];
$query = mysqli_query($connect,"DELETE FROM tb_nilai_prestasi WHERE kd_nilai_prestasi='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='input_pres.php?id=$nis&kelas=$kelas';</script>";
}else{
	echo "gagal";
}

?>

