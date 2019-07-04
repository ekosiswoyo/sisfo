<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_nilai_uts where id_nilai_uts='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Nilai UTS</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Nilai UTS
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                              
                                                <div class="form-group">
                                                    <label>Angka Pengetahuan</label>
                                                    <input class="form-control" type="hidden" placeholder="KD" name="id_nilai_uts" value="<?php echo $cari['id_nilai_uts']; ?>">
                                                    <input class="form-control" placeholder="Agnka Pengetahuan" name="angka_pengetahuan" value="<?php echo $cari['angka_pengetahuan']; ?>">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Deskripsi Pengetahuan</label>
                                                    <input class="form-control" placeholder="Deskripsi Pengetahuan" name="deskripsi_pengetahuan" value="<?php echo $cari['deskripsi_pengetahuan']; ?>">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Angka Keterampilan</label>
                                                    <input class="form-control" placeholder="Angka Keterampilan" name="angka_keterampilan" value="<?php echo $cari['angka_keterampilan']; ?>">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Deskripsi Keterampilan</label>
                                                    <input class="form-control" placeholder="Deskripsi Keterampilan" name="deskripsi_keterampilan" value="<?php echo $cari['deskripsi_keterampilan']; ?>">
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
    $id_nilai_uts   =   $_POST['id_nilai_uts'];
    $angka_pengetahuan = $_POST['angka_pengetahuan'];
    $deskripsi_pengetahuan = $_POST['deskripsi_pengetahuan'];
    $angka_keterampilan = $_POST['angka_keterampilan'];
    $deskripsi_keterampilan = $_POST['deskripsi_keterampilan'];
    // $jumlah = count($kd_nilai_keterampilan) - 1;

    // for($i=0;$i<=$jumlah;++$i){
        $sql = "UPDATE tb_nilai_uts set angka_pengetahuan='$angka_pengetahuan', deskripsi_pengetahuan='$deskripsi_pengetahuan', angka_keterampilan='$angka_keterampilan', deskripsi_keterampilan='$deskripsi_keterampilan' where id_nilai_uts='$id_nilai_uts'";
         $query = mysqli_query($connect, $sql);
    
       
    
    // }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='input_utswalikelas.php?ids';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        