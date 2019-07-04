<?php 
session_start();
error_reporting(0);
include "../config.php"; 
include "../fungsi_indotgl.php";
?>
<head>
<title>Hal 5 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
</head>
<body onload="window.print()">
<?php
$tq = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tb_guru where jabatan='Kepala Sekolah'"));

// $t = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_tahun_akademik where id_tahun_akademik='$_GET[tahun]'"));
$s = mysqli_fetch_array(mysqli_query($connect, "SELECT a.*, b.*, c.nm_guru as walikelas, c.nip FROM tb_siswa a 
JOIN tb_kelas b ON a.kd_kelas=b.kd_kelas 
  LEFT JOIN tb_guru c ON b.nip=c.nip where a.nis='$_GET[id]'"));

echo "<table width=100%>
        <tr><td width=140px>Nama Peserta Didik</td> <td> : $s[nm_siswa] </td>       <td width=140px>Kelas </td>   <td>: $s[nm_kelas]</td></tr>
        <tr><td>NIS</td>                   <td> : $s[nis]</td>     <td>Semester </td> <td>: $semester</td></tr>
        <tr><td>Nama Sekolah</td>       <td> : <b>SDN 01 RANDUMUKTIWAREN</b> </td>           
        <tr><td>Alamat Sekolah Induk/NISN</td>            <td> : Desa Randumuktiwaren</td>        <td></td></tr>
      </table><br>
     ";

     
echo "<b>E. Kondisi Kesehatan</b>
     <table id='tablemodul1' width=100% border=1>
         <tr>
           <th width='40px'>No</th>
           <th width='30%'>Aspek Fisik</th>
           <th>Keterangan</th>
           </tr>";
     
         $extra = mysqli_query($connect, "SELECT * FROM tb_kesehatan where nis='$_GET[id]'");
    $no = 1;
    while ($ex = mysqli_fetch_array($extra)){
      echo "<tr>
              <td>$no</td>
              <td>$ex[aspek]</td>
              <td>$ex[keterangan]</td>
            </tr>";
        $no++;
    }
echo "</table>
<br>";
echo "<b>F. Prestasi</b>
     <table id='tablemodul1' width=100% border=1>
         <tr>
           <th width='40px'>No</th>
           <th width='30%'>Jenis Prestasi</th>
           <th>Keterangan</th>
           </tr>";
     
         $extra = mysqli_query($connect, "SELECT * FROM tb_nilai_prestasi where nis='$_GET[id]'");
    $no = 1;
    while ($ex = mysqli_fetch_array($extra)){
      echo "<tr>
              <td>$no</td>
              <td>$ex[jns_kegiatan]</td>
              <td>$ex[keterangan]</td>
            </tr>";
        $no++;
    }
echo "</table>
<br>";
?>

<table border=0 width=100%>
  <tr>
    <td width="260" align="left">Orang Tua / Wali</td>
    <td width="520"align="center">Mengetahui <br> Kepala SMP Negeri 2 Kajen</td>
    <td width="260" align="left">Pekalongan, <?php echo tgl_raport(date("Y-m-d")); ?> <br> Wali Kelas</td>
  </tr>
  <tr>
    <td align="left"><br /><br /><br /><br /><br />
      ................................... <br /><br /></td>

    <td align="center" valign="top"><br /><br /><br /><br /><br />
      <b><?php echo $tq[nm_guru];?><br>
      NIP : <?php echo $tq[nip];?></b>
    </td>

    <td align="left" valign="top"><br /><br /><br /><br /><br />
      <b><?php echo $s[walikelas]; ?><br />
      NIP : <?php echo $s[nip]; ?></b>
    </td>
  </tr>
</table> 
</body>