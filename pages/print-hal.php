<?php 
session_start();
error_reporting(0);
include "../config.php"; 
include "../fungsi_indotgl.php";
$s = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tb_siswa where nis='$_GET[id]'"));
?>
<html>
<head>
<title>Cover Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
</head>
<body onload="window.print()">
    <center>
        <img width='170px' src='logo.png'><br><br><br><br><br><br><br><br>
        
        <h1 align=center>LAPORAN</h1><br>
        <h1 align=center>HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK <br> SEKOLAH DASAR <br> (SD)</h1>

        Nama Peserta Didik :<br>
        <h3 style='border:1px solid #000; width:82%; padding:6px'><?php echo $s[nm_siswa]; ?></h3><br><br>

       NIS<br>
        <h3 style='border:1px solid #000; width:82%; padding:3px'><?php echo "$s[nis]"; ?></h3><br><br><br><br><br><br>

        <p style='font-size:22px'>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>REPUBLIK INDONESIA</p>
    </center>
</body>
</html>