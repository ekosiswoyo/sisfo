<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_saran where id_saran='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Saran Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Saran
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Saran</label>
                                                    <input class="form-control" type="hidden"  name="id_saran" value="<?php echo $cari['id_saran']; ?>">
                                                       <textarea class="form-control" placeholder="Saran" name="saran" ><?php echo $cari['saran']; ?></textarea>
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
    $id_saran   =   $_POST['id_saran'];
    $saran   =   $_POST['saran'];
   

    // for($i=0;$i<=$jumlah;++$i){
        $sql = "UPDATE tb_saran set saran='$saran' where id_saran='$id_saran'";
         $query = mysqli_query($connect, $sql);
    
       
    
    // }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='saran_walikelas.php?ids';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        