
<?php
session_start();
if(empty($_SESSION['username'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php';

$level =    $_SESSION['level'];
$username =    $_SESSION['username'];

$sql = mysqli_query($connect, "SELECT * FROM tb_user a, tb_kelas b WHERE  a.username='$username' and a.username=b.nip");
$datasql = mysqli_fetch_array($sql);
$walikelas = $datasql['kd_kelas'];
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Input Nilai Ekstrakurikuler Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Semua Data Siswa
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                      
                                        
                                       
                                    <div class="table-responsive col-md-12">
                                    <form method="POST" action="">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Lihat Nilai</th>
                                                    <th>Ekskul</th>
                                                    <th>Kegiatan</th>
                                                    <th>Nilai</th>
                                                    
                                                    <th>Deskripsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                
                                                    $sql = mysqli_query($connect, "SELECT * FROM tb_siswa where kd_kelas='$walikelas'");
                                                    while($sqlcari = mysqli_fetch_array($sql)){
                                                
                                                
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $sqlcari['nis']; ?></td>
                                                    <td><?php echo $sqlcari['nm_siswa']; ?></td>
                                                    <td><a href="input_eks.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Lihat Nilai</button></a></td>
                                                    <td>
                                                    <input class="form-control" placeholder="Kegiatan" name="nis[]" value="<?php echo $sqlcari['nis'];?>" type="hidden">
                                                    <input class="form-control" placeholder="Kegiatan" name="kd_kelas" value="<?php echo $sqlcari['kd_kelas'];?>" type="hidden">
                                                    <select class="form-control" label="aa" name="kd_ekskul[]">
                                                        <?php
                                                        $kelas = mysqli_query($connect,"select * from tb_ekstrakurikuler");
                                                        while($datakelas = mysqli_fetch_array($kelas)){
                                                        ?>
                                                        <option value="<?php echo $datakelas['kd_ekskul'];?>"><?php echo $datakelas['kd_ekskul'];?> - <?php echo $datakelas['nm_ekskul'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </td>
                                                    <td>
                                                    <input class="form-control" placeholder="Kegiatan" name="kegiatan[]" >
                                                    </td>


                                                    <td><input class="form-control" placeholder="Nilai" name="nilai[]" ></td>
                                                    <td><input class="form-control" placeholder="Deskripsi" name="deskripsi[]" ></td>
                                                </tr>
                                                <?php 
                                                    }
                                                    ?>

                                                
                                            </tbody>
                                        </table>
                                        <button type="submit" name="simpan" class="btn btn-outline btn-primary">Simpan</button>
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
    $kd_kelas   =   $_POST['kd_kelas'];
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
       echo "<script>window.location='kls.php?ids=$kd_kelas';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        