<?php
include '../config.php';
include 'header.php';
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Tambah Data Ekstrakurikuler</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tambah Data Ekstrakurikuler
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Kode Ekstrakurikuler</label>
                                                    <input class="form-control" placeholder="Kode Ekstrakurikuler" name="kd_ekskul">
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Ekstrakurikuler</label>
                                                    <input class="form-control" placeholder="Nama Ekstrakurikuler" name="nm_ekskul">
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

    $kd_ekskul   =   $_POST['kd_ekskul'];
    $nm_ekskul   =   $_POST['nm_ekskul'];

    $sql = "INSERT INTO tb_ekstrakurikuler (kd_ekskul,nm_ekskul) VALUES ('$kd_ekskul','$nm_ekskul')";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='ekskul.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>