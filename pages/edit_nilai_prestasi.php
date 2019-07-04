<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_nilai_prestasi a, tb_siswa b where a.kd_nilai_prestasi='$id' and a.nis=b.nis");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Prestasi</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Prestasi
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Nama Siswa</label>
                                                    <input class="form-control "name="kd_nilai_prestasi" value="<?php echo $cari['kd_nilai_prestasi']; ?>" type="hidden">
                                                    <input class="form-control" placeholder="Nama Siswa" name="nm_siswa" value="<?php echo $cari['nm_siswa']; ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Jenis Kegiatan</label>
                                                    <input class="form-control" placeholder="Kegiatan" name="kegiatan" value="<?php echo $cari['jns_kegiatan']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <input class="form-control" placeholder="Keterangan" name="keterangan" value="<?php echo $cari['keterangan']; ?>">
                                                </div>

                                                

                                                

                                                
                                                <button type="submit" name="simpan" class="btn btn-outline btn-primary">Simpan</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                     
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>


                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
include 'footer.php';
include '../config.php';

if(isset($_POST['simpan'])){

    $kegiatan   =   $_POST['kegiatan']; 
    $kd_nilai_prestasi   =   $_POST['kd_nilai_prestasi'];

    $keterangan   =   $_POST['keterangan'];

    $sql = "UPDATE tb_nilai_prestasi set jns_kegiatan = '$kegiatan', keterangan = '$keterangan' where kd_nilai_prestasi = '$kd_nilai_prestasi'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='nilai_prestasi.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>