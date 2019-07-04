<?php 
session_start();
error_reporting(0);
include "../config.php"; 
include "../fungsi_indotgl.php";
$frt = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM rb_header_print ORDER BY id_header_print DESC LIMIT 1")); 
?>
<head>
<title>Hal 4 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
</head>
<body onload="window.print()">
<?php
$t = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM rb_tahun_akademik where id_tahun_akademik='$_GET[tahun]'"));
$tq = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tb_guru where jabatan='Kepala Sekolah'"));

$s = mysqli_fetch_array(mysqli_query($connect, "SELECT a.*, b.*, c.nm_guru as walikelas, c.nip FROM tb_siswa a 
                                      JOIN tb_kelas b ON a.kd_kelas=b.kd_kelas 
                                        LEFT JOIN tb_guru c ON b.nip=c.nip where a.nis='$_GET[id]'"));
if (substr($_GET[tahun],4,5)=='1'){ $semester = 'Ganjil'; }else{ $semester = 'Genap'; }


echo "<table width=100%>
        <tr><td width=140px>Nama Peserta Didik</td> <td> : $s[nm_siswa] </td>       <td width=140px>Kelas </td>   <td>: $s[nm_kelas]</td></tr>
        <tr><td>NIS</td>                   <td> : $s[nis]</td>     <td>Semester </td> <td>: $semester</td></tr>
        <tr><td>Nama Sekolah</td>       <td> : <b>SDN 01 RANDUMUKTIWAREN</b> </td>           
        <tr><td>Alamat Sekolah Induk/NISN</td>            <td> : Desa Randumuktiwaren</td>        <td></td></tr>
      </table><br>
     ";

echo "<h2>B. Pengetahuan dan Keterampilan</h2>
<p>KKM Satuan Pendidikan : 65,00</p><table id='tablemodul1' width=100% border=1>
          <tr> <th rowspan='2'>No</th>
            <th width='160px' rowspan='2'>Mata Pelajaran</th>
            <th colspan='2' style='text-align:center'>Pengetahuan</th>
            <th colspan='2' style='text-align:center'>Keterampilan</th>
          </tr>
          <tr>
            <th>Nilai</th>
            <th>Predikat</th>
            <th>Nilai</th>
            <th>Predikat</th>
          </tr>";

  
        $mapel = mysqli_query($connect, "SELECT * FROM tb_mapel");
        $no = 1;
        while ($m = mysqli_fetch_array($mapel)){                                
        $rapn = mysqli_fetch_array(mysqli_query($connect, "SELECT sum((tema1+tema2+tema3+tema4+tema5)/5) as raport FROM tbl_nilai_pengetahuan where nis='$s[nis]' and kd_mapel='$m[kd_mapel]'"));
        $cekpredikat = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_predikat "));
            if ($cekpredikat >= 1){
                $grade3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `tb_predikat` where (".number_format($rapn[raport])." >=nilai_a) AND (".number_format($rapn[raport])." <= nilai_b)"));
            }else{
                $grade3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `tb_predikat` where (".number_format($rapn[raport])." >=nilai_a) AND (".number_format($rapn[raport])." <= nilai_b)"));
            }

        $rapnk = mysqli_fetch_array(mysqli_query($connect, "SELECT sum((tema1+tema2+tema3+tema4+tema5)/5) as raport FROM tbl_nilai_keterampilan where  nis='$s[nis]' and kd_mapel='$m[kd_mapel]'"));
        $cekpredikat2 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_predikat"));
            if ($cekpredikat2 >= 1){
                $grade = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `tb_predikat` where (".number_format($rapnk[raport])." >=nilai_a) AND (".number_format($rapnk[raport])." <= nilai_b)"));
            }else{
                $grade = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `tb_predikat` where (".number_format($rapnk[raport])." >=nilai_a) AND (".number_format($rapnk[raport])." <= nilai_b)"));
            }

        echo "<tr>
                <td align=center>$no</td>
                <td>$m[nm_mapel]</td>
                <td align=center>".number_format($rapn[raport])."</td>
                <td align=center>$grade3[grade]</td>
                <td align=center>".number_format($rapnk[raport])."</td>
                <td align=center>$grade[grade]</td>
            </tr>";
        $no++;
        }

        echo "</table><br/>";
        $cekpredikat1 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_predikat where kode_kelas='$_GET[kelas]'"));
        if ($cekpredikat1 >= 1){
          $grade = mysqli_query($connect, "SELECT * FROM tb_predikat where kode_kelas='$_GET[kelas]'");
          $gradea = mysqli_query($connect, "SELECT * FROM tb_predikat where kode_kelas='$_GET[kelas]'");
          $total = mysqli_num_rows($grade);
        }else{
          $grade = mysqli_query($connect, "SELECT * FROM tb_predikat where kode_kelas='0'");
          $gradea = mysqli_query($connect, "SELECT * FROM tb_predikat where kode_kelas='0'");
          $total = mysqli_num_rows($grade);
        }

echo "<b>C. Extrakulikuler</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='40px'>No</th>
            <th width='30%'>Kegiatan Extrakulikuler</th>
            <th>Deskripsi</th>
          </tr>";

          $extra = mysqli_query($connect, "SELECT * FROM tb_nilai_ekskul where nis='$_GET[id]'");
          $no = 1;
          while ($ex = mysqli_fetch_array($extra)){
            echo "<tr>
                    <td>$no</td>
                    <td>$ex[kegiatan]</td>
                    <td>$ex[deskripsi]</td>
                  </tr>";
              $no++;
          }
      echo "</table>
      <br>";
echo "<b>D. Saran - Saran</b>
      <table id='tablemodul1' width=100% height=80px border=1>
        <tr><td></td></tr>
      </table>";
         
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