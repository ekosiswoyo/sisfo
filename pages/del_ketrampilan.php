<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tbl_nilai_keterampilan WHERE kd_nilai_ketrampilan=$id");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='ketrampilan.php?ids';</script>";
}else{
	echo "gagal";
}

?>

