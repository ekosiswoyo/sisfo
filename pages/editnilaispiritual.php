<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$nis = $_GET['nis'];
$kelas = $_GET['kelas'];
$sql = mysqli_query($connect,"select * from tb_nilai_sikap  where kd_nilai_sikap='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Nilai Sikap Spiritual</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Nilai Sikap Spiritual
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Positif</label>
                                                    <input class="form-control" placeholder="Positif" name="positif" value="<?php echo $cari['positif']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Negatif</label>
                                                    <input class="form-control" placeholder="Negatif" name="negatif" value="<?php echo $cari['negatif']; ?>">
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

    $positif   =   $_POST['positif'];
    $negatif   =   $_POST['negatif'];
    $keterangan   =   $_POST['keterangan'];

    $sql = "UPDATE tb_nilai_sikap set positif = '$positif', negatif = '$negatif', keterangan = '$keterangan' where kd_nilai_sikap = '$id'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='input_spiritual.php?id=$nis&kelas=$kelas';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>