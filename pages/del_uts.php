<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_nilai_uts WHERE id_nilai_uts='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='input_uts.php';</script>";
}else{
	echo "gagal";
}

?>

