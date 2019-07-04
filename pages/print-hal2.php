<?php 
session_start();
error_reporting(0);
include "../config.php"; 
include "../fungsi_indotgl.php";
$s = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tb_siswa a, tb_wali_murid b where a.nis='$_GET[id]' and a.nis=b.nis"));
$tq = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tb_guru where jabatan='Kepala Sekolah'"));

?>
<html>
<head>
<title>Hal 2 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
<style type="text/css">
  td { padding:2px; }
</style>
</head>
<body onload="window.print()">
    <h1>IDENTITAS PESERTA DIDIK</h1><br>

    <table style='font-size:15px' width='100%'>
        <tr><td width='25px'>1.</td>  <td width='190px'>Nama Peserta Didik</td>   <td width='10px'> : </td><td> <?php echo "$s[nm_siswa]"; ?></td></tr>
        <tr><td>2.</td>  <td width='190px'>NIS</td>                          <td width='10px'> : </td><td> <?php echo "$s[nis]"; ?></td></tr>
        <tr><td>3.</td>  <td width='190px'>Tempat,Tanggal Lahir</td>                      <td width='10px'> : </td><td> <?php echo "$s[tmp_lahir]"; ?></td></tr>
        <tr><td>4.</td>  <td width='190px'>Jenis Kelamin</td>                             <td width='10px'> : </td><td> <?php echo "$s[jns_kel]"; ?></td></tr>
        <tr><td>5.</td>  <td width='190px'>Agama</td>                                     <td width='10px'> : </td><td> <?php echo "$s[agama]"; ?></td></tr>
        <tr><td>6.</td>  <td width='190px'>Pendidikan Sebelumnya</td>                     <td width='10px'> : </td><td> <?php echo "$s[pend_terakhir]"; ?></td></tr>
        <tr><td>7.</td>  <td width='190px'>Alamat Peserta Didik</td>                      <td width='10px'> : </td><td> <?php echo "$s[alamat]"; ?></td></tr>
        
        <tr><td>8.</td> <td width='190px'>Nama Orang Tua</td>                                 <td width='10px'> : </td><td> <?php echo ""; ?></td></tr>
        <tr><td></td> <td width='190px'>a. Ayah</td>                                 <td width='10px'> : </td><td> <?php echo "$s[nm_bpk]"; ?></td></tr>
        <tr><td></td> <td width='190px'>b. Ibu</td>                                  <td width='10px'> : </td><td> <?php echo "$s[nm_ibu]"; ?></td></tr>
    
        <tr><td>9.</td> <td width='190px'>Pekerjaan Orang Tua</td>                       <td width='10px'> : </td><td> <?php echo ""; ?></td></tr>
        <tr><td></td> <td width='190px'>a. Ayah</td>                                      <td width='10px'> : </td><td> <?php echo "$s[pekerjaan_bpk]"; ?></td></tr>
        <tr><td></td> <td width='190px'>b. Ibu</td>                                       <td width='10px'> : </td><td> <?php echo "$s[pekerjaan_ibu]"; ?></td></tr>
        <tr><td>14.</td> <td width='190px'>Alamat Orang tua</td>                        <td width='10px'> : </td><td> <?php echo "$s[alamat_ortu]"; ?></td></tr>
        
    </table>
    <br><br><br>
    <table width='40%' style='float:right'>
        <tr><td>Randumuktiwaren, <?php echo tgl_raport(date('Y-m-d')); ?> <br>
                Kepala Sekolah,<br><br><br><br>


                <b><?php echo $tq[nm_guru];?><br>
                <?php echo $tq[nip];?></b></td></tr>
    </table>
</body>
</html>