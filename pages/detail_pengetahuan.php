<?php
include '../config.php';
include 'header.php';
$nis = $_GET['id'];
$mapel = $_GET['mapel'];

$kls = $_GET['kelas'];
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Detail Nilai Pengetahuan Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                       <form action="" method="POST">
                                       <?php
                                        $siswa = mysqli_query($connect, "SELECT * FROM tbl_nilai_pengetahuan a, tb_siswa b, tb_mapel c where a.nis='$nis' and b.nis=a.nis and a.kd_mapel='$mapel' and a.kd_mapel=c.kd_mapel");
                                        $siswa_d = mysqli_fetch_array($siswa);
                                       ?>
                                       <table>
                                       <tr>
                                        <th>NIS</th>
                                        <th> : </td>
                                        <th><?php echo $siswa_d['nis'];?></td>
                                       </tr>
                                       <tr>
                                        <th>Nama Siswa</td>
                                        <th> : </th>
                                        <th> <?php echo $siswa_d['nm_siswa'];?></th>
                                       </tr>
                                       <tr>
                                        <th>Mapel</td>
                                        <th> : </th>
                                        <th> <?php echo $siswa_d['nm_mapel'];?></th>
                                       </tr>
                                       </table>
                                       <hr>

                                          

                                        </form>

                                        
                                       
                                    <div class="table-responsive col-md-12">
                                    <form method="POST" action="">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tema 1</th>
                                                    <th>Tema 2</th>
                                                    <th>Tema 3</th>
                                                    <th>Tema 4</th>
                                                    <th>Tema 5</th>
                                                    <th>Deskripsi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               

                                                    <?php
                                                    
                                                $no = 1;
                                                        $data = mysqli_query($connect, "SELECT * FROM tbl_nilai_pengetahuan a, tb_siswa b, tb_mapel c where a.nis='$nis' and b.nis=a.nis and a.kd_mapel='$mapel' and a.kd_mapel=c.kd_mapel");
                                                        while($datas = mysqli_fetch_array($data)){

                                                    ?>
                                                    <tr class="odd gradeX">
                                                    
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $datas['tema1']; ?></td>
                                                    <td><?php echo $datas['tema2']; ?></td>
                                                    <td><?php echo $datas['tema3']; ?></td>
                                                    <td><?php echo $datas['tema4']; ?></td>
                                                    <td><?php echo $datas['tema5']; ?></td>
                                                    <td><?php echo $datas['deskripsi']; ?></td>
                                                    <td><a href="edit_pengetahuan.php?id=<?php echo $datas['kd_nilai_pengetahuan'];?>"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>&nbsp;<a href="del_pengetahuan.php?id=<?php echo $datas['kd_nilai_pengetahuan'];?>"  onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a></td>

                                                </tr>
                                                        <?php } 
                                                        ?>
                                                        
                                                    <?php
                                                    
                                                    $data = mysqli_query($connect, "SELECT a.kd_mapel,a.tema1,a.tema2,a.tema3,a.tema4,a.tema5,sum(a.tema1) as jml_tema1, sum(a.tema2) as jml_tema2, sum(a.tema3) as jml_tema3, sum(a.tema4) as jml_tema4, sum(a.tema5) as jml_tema5 FROM tbl_nilai_pengetahuan a, tb_siswa b, tb_mapel c where a.nis='$nis' and b.nis=a.nis and a.kd_mapel='$mapel' and a.kd_mapel=c.kd_mapel");
                                                            while($datas = mysqli_fetch_array($data)){
    
                                                        ?>
                                                        <tr class="odd gradeX">
                                                        <td colspan="6" style="text-align:right;">Rata - Rata</td>
                                                        <td colspan="3"><?php $a = ($datas['jml_tema1']+$datas['jml_tema2']+$datas['jml_tema3']+$datas['jml_tema4']+$datas['jml_tema5'])/5;  echo $a; ?></td>
                                                        <!-- <td colspan="2">a</td> -->
                                                        
                                                        </tr> <?php } 
                                                        ?>
                                                
                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
include 'footer.php';
include '../config.php';

if(isset($_POST['simpan'])){

    $nis   =   $_POST['nis'];
    $kd_ekskul   =   $_POST['kd_ekskul'];
    $kegiatan   =   $_POST['kegiatan'];
    $nilai   =   $_POST['nilai'];
    $deskripsi   =   $_POST['deskripsi'];
    $jumlah = count($kegiatan) - 1;

    for($i=0;$i<=$jumlah;++$i){
        $sql = "INSERT INTO tb_nilai_ekskul (kd_ekskul,nis,kegiatan,nilai,deskripsi) VALUES ('$kd_ekskul[$i]','$nis[$i]','$kegiatan[$i]','$nilai[$i]','$deskripsi[$i]')";
        $query = mysqli_query($connect, $sql);
    
       
    
    }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='siswa.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        