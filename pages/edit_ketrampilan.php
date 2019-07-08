<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tbl_nilai_keterampilan where kd_nilai_ketrampilan='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Nilai Keterampilan</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Keterampilan
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                              
                                                <div class="form-group">
                                                    <label>Tema 1</label>
                                                    <input class="form-control" type="hidden" placeholder="KD" name="kd_nilai_ketrampilan" value="<?php echo $cari['kd_nilai_ketrampilan']; ?>">
                                                    <input class="form-control" placeholder="Tema 1" name="tema1" value="<?php echo $cari['tema1']; ?>">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Tema 1</label>
                                                    <input class="form-control" placeholder="Tema 1" name="tema2" value="<?php echo $cari['tema2']; ?>">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Tema 1</label>
                                                    <input class="form-control" placeholder="Tema 1" name="tema3" value="<?php echo $cari['tema3']; ?>">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Tema 1</label>
                                                    <input class="form-control" placeholder="Tema 1" name="tema4" value="<?php echo $cari['tema4']; ?>">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Tema 1</label>
                                                    <input class="form-control" placeholder="Tema 1" name="tema5" value="<?php echo $cari['tema5']; ?>">
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

    // $nis   =   $_POST['nis'];
    $kd_nilai_keterampilan   =   $_POST['kd_nilai_ketrampilan'];
    $tema1 = $_POST['tema1'];
    $tema2 = $_POST['tema2'];
    $tema3 = $_POST['tema3'];
    $tema4 = $_POST['tema4'];
    $tema5 = $_POST['tema5'];
    // $jumlah = count($kd_nilai_keterampilan) - 1;

    // for($i=0;$i<=$jumlah;++$i){
        $sql = "UPDATE tbl_nilai_keterampilan set tema1='$tema1', tema2='$tema2', tema3='$tema3', tema4='$tema4', tema5='$tema5' where kd_nilai_ketrampilan='$kd_nilai_keterampilan'";
         $query = mysqli_query($connect, $sql);
    
       
    
    // }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='ketrampilan.php?ids';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        