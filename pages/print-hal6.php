<?php 
session_start();
error_reporting(0);
include "../config.php"; 
include "../fungsi_indotgl.php";
$skp = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tb_nilai_sikap where nis='$_GET[id]'")); 
?>
<html>
<head>
<title>Hal 6 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
</head>
<body onload="window.print()">
<?php
$t = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_tahun_akademik where id_tahun_akademik='$_GET[tahun]'"));
$s = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT a.*, b.*, c.nm_guru as walikelas, c.nip FROM rb_siswa a 
                                      JOIN tb_kelas b ON a.kode_kelas=b.kode_kelas 
                                        LEFT JOIN tb_guru c ON b.nip=c.nip where a.nis='$_GET[id]'"));
if (substr($_GET[tahun],4,5)=='1'){ $semester = 'Ganjil'; }else{ $semester = 'Genap'; }

echo "<table width=100%>
        <tr><td width=140px>Nama Peserta Didik</td> <td> : $s[nm_siswa] </td>       <td width=140px>Kelas </td>   <td>: $s[nm_kelas]</td></tr>
        <tr><td>NIS</td>                   <td> : $s[nis]</td>     <td>Semester </td> <td>: $semester</td></tr>
        <tr><td>Nama Sekolah</td>       <td> : <b>SDN 01 RANDUMUKTIWAREN</b> </td>           
        <tr><td>Alamat Sekolah Induk/NISN</td>            <td> : Desa Randumuktiwaren</td>        <td></td></tr>
      </table><br>
     ";

echo "<b>C. Extrakulikuler</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='40px'>No</th>
            <th width='30%'>Kegiatan Extrakulikuler</th>
            <th>Deskripsi</th>
          </tr>";

          $extra = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tb_nilai_ekskul where AND nis='$_GET[id]'");
          $no = 1;
          while ($ex = mysqli_fetch_array($extra)){
            echo "<tr>
                    <td>$no</td>
                    <td>$ex[kegiatan]</td>
                    <td>$ex[deskripsi]</td>
                  </tr>";
              $no++;
          }
      echo "</table>";
echo "<b>D. Saran - Saran</b>
      <table id='tablemodul1' width=100% height=80px border=1>
        <tr><td></td></tr>
      </table>";

echo "<b>F. Kondisi Kesehatan</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='40px'>No</th>
            <th width='30%'>Aspek Fisik</th>
            <th>Keterangan</th>
          </tr>";

          $prestasi = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tb_kesehatan where nis='$_GET[id]'");
          $no = 1;
          while ($pr = mysqli_fetch_array($prestasi)){
            echo "<tr>
                    <td>$no</td>
                    <td>$pr[aspek]</td>
                    <td>$pr[keterangan]</td>
                  </tr>";
              $no++;
          }
      echo "</table>";

echo "<b>E. Ketidakhadiran</b>
      <table id='tablemodul1' width=85% border=1>
        <tr><td width='70%'>Sakit</td>  <td width='10px'> : </td> <td align=center>0</td> </tr>
        <tr><td>Izin</td>               <td> : </td>              <td align=center>0</td> </tr>
        <tr><td>Tanpa Keterangan</td>   <td> : </td>              <td align=center>0</td> </tr>
      </table>";



echo "<b>G. Tanggapan Orang tua / Wali</b>
      <table id='tablemodul1' width=100% height=80px border=1>
        <tr><td></td></tr>
      </table><br/>";

?>

<table border=0 width=100%>
  <tr>
    <td width="260" align="left">Orang Tua / Wali</td>
    <td width="520"align="center">Mengetahui <br> Kepala SMP Negeri 2 Kajen</td>
    <td width="260" align="left">Pekalongan, <?php echo tgl_raport(date("Y-m-d")); ?> <br> Wali Kelas</td>
  </tr>
  <tr>
    <td align="left"><br /><br /><br />
      ................................... <br /><br /></td>

    <td align="center" valign="top"><br /><br /><br />
      <b>Yusuf, S.Pd., M.Si.<br>
      NIP : 1963031819870310006</b>
    </td>

    <td align="left" valign="top"><br /><br /><br />
      <b><?php echo $s[walikelas]; ?><br />
      NIP : <?php echo $s[nip]; ?></b>
    </td>
  </tr>
</table> 
</body>
</html>