<?php 
session_start();
error_reporting(0);
include "../config.php"; 
include "../fungsi_indotgl.php";
$skp = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tb_nilai_sikap where nis='$_GET[id]' and status='spiritual' order by kd_nilai_sikap desc limit 1")); 

$skpp = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tb_nilai_sikap where nis='$_GET[id]' and status='sosial' order by kd_nilai_sikap desc limit 1")); 
?>
<html>
<head>
<title>Hal 3 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
</head>
<body onload="window.print()">
<?php
$t = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM rb_tahun_akademik where id_tahun_akademik='$_GET[tahun]'"));
$s = mysqli_fetch_array(mysqli_query($connect, "SELECT a.*, b.*, c.nm_guru as walikelas, c.nip FROM tb_siswa a 
                                      JOIN tb_kelas b ON a.kd_kelas=b.kd_kelas 
                                        LEFT JOIN tb_guru c ON b.nip=c.nip where a.nis='$_GET[id]'"));
if (substr($_GET[tahun],4,5)=='1'){ $semester = 'Ganjil'; }else{ $semester = 'Genap'; }

echo "<h1 align=center>RAPORT PESERTA DIDIK DAN PROFIL PESERTA DIDIK</h1><table width=100%>
        <tr><td width=140px>Nama Peserta Didik</td> <td> : $s[nm_siswa] </td>       <td width=140px>Kelas </td>   <td>: $s[nm_kelas]</td></tr>
        <tr><td>NIS</td>                   <td> : $s[nis]</td>     <td>Semester </td> <td>: $semester</td></tr>
        <tr><td>Nama Sekolah</td>       <td> : <b>SDN 01 RANDUMUKTIWAREN</b> </td>           
        <tr><td>Alamat Sekolah Induk/NISN</td>            <td> : Desa Randumuktiwaren</td>        <td></td></tr>
      </table><br>
     ";
echo "
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='190px'>ASPEK</th>
            <th>DESKRIPSI</th>
          </tr>
          <tr>
            <th style='padding:30px'>1.$skp[status]</th>
            <th>$skp[keterangan]</th>
          </tr>
          <tr>
            <th style='padding:30px'>2.$skpp[status]</th>
            <th>$skpp[keterangan]</th>
          </tr>
      </table><br/>";

?>

</body>
</html>