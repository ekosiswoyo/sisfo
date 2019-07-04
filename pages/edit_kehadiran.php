<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_kehadiran where id_kehadiran='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Kehadiran Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Kehadiran
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Sakit</label>
                                                    <input class="form-control" type="hidden"  name="id_kehadiran" value="<?php echo $cari['id_kehadiran']; ?>">
                                                    <input class="form-control" placeholder="Sakit" name="sakit" value="<?php echo $cari['sakit']; ?>">                                                </div>

                                                <div class="form-group">
                                                    <label>Ijin</label>
                                                    <input class="form-control" placeholder="Ijin" name="ijin" value="<?php echo $cari['ijin']; ?>">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Alpha</label>
                                                    <input class="form-control" placeholder="Alpha" name="alpha" value="<?php echo $cari['alpha']; ?>">
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
    $id_kehadiran   =   $_POST['id_kehadiran'];
    $sakit   =   $_POST['sakit'];
    $ijin = $_POST['ijin'];
    $alpha = $_POST['alpha'];

    // for($i=0;$i<=$jumlah;++$i){
        $sql = "UPDATE tb_kehadiran set sakit='$sakit', ijin='$ijin', alpha='$alpha' where id_kehadiran='$id_kehadiran'";
         $query = mysqli_query($connect, $sql);
    
       
    
    // }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='kehadiran_walikelas.php?ids';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        