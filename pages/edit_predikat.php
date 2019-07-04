<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_predikat where kd_predikat='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Predikat</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Predikat
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Nilai A</label>
                                                    <input class="form-control" type="hidden" name="kd_predikat" value="<?php echo $cari['kd_predikat']; ?>">
                                                    <input class="form-control" placeholder="Nilai A" name="nilai_a" value="<?php echo $cari['nilai_a']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nilai B</label>
                                                    <input class="form-control" placeholder="Nilai B" name="nilai_b" value="<?php echo $cari['nilai_b']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Grade</label>
                                                    <input class="form-control" placeholder="Grade" name="grade" value="<?php echo $cari['grade']; ?>">
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

    $kd_predikat   =   $_POST['kd_predikat'];
    $nilai_a   =   $_POST['nilai_a'];
    $nilai_b   =   $_POST['nilai_b'];
    $grade   =   $_POST['grade'];
    $keterangan   =   $_POST['keterangan'];

    $sql = "UPDATE tb_predikat set nilai_a = '$nilai_a',nilai_b = '$nilai_b', grade = '$grade', keterangan = '$keterangan' where kd_predikat = '$kd_predikat'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='predikat.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>