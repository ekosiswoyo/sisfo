<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$nis = $_GET['nis'];
$kelas = $_GET['kelas'];
$sql = mysqli_query($connect,"select * from tb_nilai_ekskul a, tb_ekstrakurikuler b where kd_nilai_ekskul='$id' and a.kd_ekskul=b.kd_ekskul");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Nilai Ekskul</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Nilai Ekskul
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Nama Ekstrakurikuler</label>
                                                    <input class="form-control" placeholder="Kode Kelas" name="nm_ekskul" value="<?php echo $cari['nm_ekskul']; ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Kegiatan</label>
                                                    <input class="form-control" placeholder="Kegiatan" name="kegiatan" value="<?php echo $cari['kegiatan']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Nilai</label>
                                                    <input class="form-control" placeholder="Nilai" name="nilai" value="<?php echo $cari['nilai']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <input class="form-control" placeholder="Deskripsi" name="deskripsi" value="<?php echo $cari['deskripsi']; ?>">
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
    $nilai   =   $_POST['nilai'];
    $deskripsi   =   $_POST['deskripsi'];

    $sql = "UPDATE tb_nilai_ekskul set kegiatan = '$kegiatan', nilai = '$nilai', deskripsi = '$deskripsi' where kd_nilai_ekskul = '$id'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='input_eks.php?id=$nis&kelas=$kelas';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>