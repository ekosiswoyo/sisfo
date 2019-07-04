<?php 
session_start();
error_reporting(0);
include "../config.php"; 
include "../fungsi_indotgl.php";

?>
<html>
<head>
<title>Hal 1 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
<style type="text/css">
  td { padding:9px; }
</style>
</head>
<body onload="window.print()">
    <h1 align=center>LAPORAN <br>HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK <br> SEKOLAH DASAR <br> (SD)</h1><br>

    <table style='font-size:23px' width='100%'>
        <tr><td width='180px'>Nama Sekolah</td>   <td width='10px'> : </td><td> SDN 01 RANDUMUKTIWAREN</td></tr>
        <tr><td width='180px'>NIS/NSS/NDS</td>       <td width='10px'> : </td><td> 100140/101032611014/20323365</td></tr>
        <tr><td width='180px'>Alamat Sekolah</td> <td width='10px'> : </td><td> Desa Randumuktiwaren</td></tr>
        <tr><td width='180px'>Kode Pos</td> <td width='10px'> : </td><td> 51156</td></tr>
        <tr><td width='180px'>Telp</td> <td width='10px'> : </td><td> -</td></tr>
        <tr><td width='180px'>Kelurahan/Desa</td>      <td width='10px'> : </td><td> Randumuktiwaren</td></tr>
        <tr><td width='180px'>Kecamatan</td>      <td width='10px'> : </td><td> Bojong</td></tr>
        <tr><td width='180px'>Kabupaten/Kota</td> <td width='10px'> : </td><td> Pekalongan</td></tr>
        <tr><td width='180px'>Provinsi</td>       <td width='10px'> : </td><td> Jawa Tengah</td></tr>
        <tr><td width='180px'>Website</td>       <td width='10px'> : </td><td> -</td></tr>
        <tr><td width='180px'>Email</td>       <td width='10px'> : </td><td> -</td></tr>
    </table>
</body>
</html>