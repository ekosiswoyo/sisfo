<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_ukuran WHERE id_ukuran='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='ukuran_walikelas.php';</script>";
}else{
	echo "gagal";
}

?>

