<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_mapel where kd_mapel='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Mata Pelajaran</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Mata Pelajaran
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Kode Mata Pelajaran</label>
                                                    <input class="form-control" placeholder="Kode Mata Pelajaran" name="kd_mapel" value="<?php echo $cari['kd_mapel']; ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Mata Pelajaran</label>
                                                    <input class="form-control" placeholder="Nama Mata Pelajaran" name="nm_mapel" value="<?php echo $cari['nm_mapel']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Aktif</label>
                                                    <select class="form-control" name="aktif">
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak">Tidak</option>
                                                    </select>
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

    $kd_mapel   =   $_POST['kd_mapel'];
    $nm_mapel   =   $_POST['nm_mapel'];  
    $aktif   =   $_POST['aktif'];

    $sql = "UPDATE tb_mapel set nm_mapel = '$nm_mapel', aktif = '$aktif' where kd_mapel = '$kd_mapel'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='mapel.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>