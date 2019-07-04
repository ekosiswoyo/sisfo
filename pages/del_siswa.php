<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_siswa WHERE nis='$id'");
$query .= mysqli_query($connect,"DELETE FROM tb_wali_murid WHERE nis='$id'");


if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='siswa.php';</script>";
}else{
	echo "gagal";
}

?>

