<?php
include ('../config.php');
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM tb_nilai WHERE id_pengumuman='$id'");

if($query){
        echo "<script>window.alert('Data Berhasil di Hapus!!');</script>";
        echo "<script>window.location='pengumuman.php';</script>";
}else{
	echo "gagal";
}

?>

