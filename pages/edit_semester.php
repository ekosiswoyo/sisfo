<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_semester where kd_semester='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Semester</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Semester
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Kode Semester</label>
                                                    <input class="form-control" placeholder="Kode Semester" name="kd_semester" value="<?php echo $cari['kd_semester']; ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Semester</label>
                                                   <select class="form-control" name="semester">
                                                       <option >-- Silahkan Pilih Semester --</option>
                                                       <option value="Ganjil">Ganjil</option>
                                                       <option value="Genap">Genap</option>
                                                   </select>

                                                </div>

                                                <div class="form-group">
                                                    <label>Tahun Pelajaran</label>
                                                    <input class="form-control" placeholder="Tahun Pelajaran" name="th_pelajaran" value="<?php echo $cari['th_pelajaran']; ?>">
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

    $kd_semester   =   $_POST['kd_semester'];
    $semester   =   $_POST['semester'];
    $th_pelajaran   =   $_POST['th_pelajaran'];

    $sql = "UPDATE tb_semester set semester = '$semester', th_pelajaran = '$th_pelajaran' where kd_semester = '$kd_semester'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='semester.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>