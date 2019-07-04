<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_kesehatan WHERE id_aspek='$id'");


if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='kesehatan.php';</script>";
}else{
	echo "gagal";
}

?>

