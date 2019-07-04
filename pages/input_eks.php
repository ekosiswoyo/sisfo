<?php
include '../config.php';
include 'header.php';
$nis = $_GET['id'];
$kls = $_GET['kelas'];
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Nilai Ekskul Siswa</h1>
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
                                        $siswa = mysqli_query($connect, "SELECT * FROM tb_nilai_ekskul a, tb_siswa b, tb_ekstrakurikuler c where a.nis='$nis' and b.nis=a.nis and a.kd_ekskul=c.kd_ekskul");
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
                                       </table>
                                       <hr>

                                          

                                        </form>

                                        
                                       
                                    <div class="table-responsive col-md-12">
                                    <form method="POST" action="">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Ekskul</th>
                                                    <th>Kegiatan</th>
                                                    <th>Nilai</th>
                                                    
                                                    <th>Deskripsi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               

                                                    <?php
                                                    
                                                $no = 1;
                                                        $data = mysqli_query($connect, "SELECT * FROM tb_nilai_ekskul a, tb_siswa b, tb_ekstrakurikuler c where a.nis='$nis' and b.nis=a.nis and a.kd_ekskul=c.kd_ekskul");
                                                        while($datas = mysqli_fetch_array($data)){
                                                    ?>
                                                    <tr class="odd gradeX">
                                                    
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $datas['nm_ekskul']; ?></td>
                                                    <td><?php echo $datas['kegiatan']; ?></td>
                                                    <td><?php echo $datas['nilai']; ?></td>
                                                    <td><?php echo $datas['deskripsi']; ?></td>
                                                    <td><a href="editnilaiekskul.php?id=<?php echo $datas['kd_nilai_ekskul'];?>&nis=<?php echo $datas['nis']; ?>&kelas=<?php echo $datas['kd_kelas']; ?>"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>&nbsp;<a href="delnilaiekskul.php?id=<?php echo $datas['kd_nilai_ekskul'];?>&nis=<?php echo $datas['nis']; ?>&kelas=<?php echo $datas['kd_kelas']; ?>"  onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a></td>

                                                </tr>
                                                        <?php } 
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
        