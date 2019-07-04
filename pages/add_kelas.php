<?php
include '../config.php';
include 'header.php';
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Tambah Data Kelas</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tambah Data Kelas
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Kode Kelas</label>
                                                    <input class="form-control" placeholder="Kode Kelas" name="kd_kelas" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Kelas</label>
                                                    <input class="form-control" placeholder="Nama Kelas" name="nm_kelas" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pilih Wali Kelas</label>
                                                    <select class="form-control" label="aa" name="wali_kelas" required>
                                                    <option>-- Silahkan Pilih Wali Kelas --</option>
                                                        <?php
                                                        $kelas = mysqli_query($connect,"select * from tb_guru");
                                                        while($datakelas = mysqli_fetch_array($kelas)){
                                                        ?>
                                                        <option value="<?php echo $datakelas['nip'];?>"><?php echo $datakelas['nip'];?> - <?php echo $datakelas['nm_guru'];?></option>
                                                        <?php } ?>
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

    $kd_kelas   =   $_POST['kd_kelas'];
    $nm_kelas   =   $_POST['nm_kelas'];
    $wali_kelas =   $_POST['wali_kelas'];

    $sql = "INSERT INTO tb_kelas (kd_kelas,nm_kelas,nip) VALUES ('$kd_kelas','$nm_kelas','$wali_kelas')";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='kelas.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>