<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_deskripsi_raport where id_deskripsi='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Deskripsi Mapel</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Deskripsi Mapel
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Kode Mapel</label>
                                                    <input class="form-control" type="hidden"  name="id_deskripsi" value="<?php echo $cari['id_deskripsi']; ?>">
                                                      <select class="form-control" label="aa" name="kd_mapel">
                                                        <?php
                                                        $kelas = mysqli_query($connect,"select * from tb_mapel");
                                                        while($datakelas = mysqli_fetch_array($kelas)){
                                                        ?>
                                                        <option value="<?php echo $datakelas['kd_mapel'];?>"><?php echo $datakelas['kd_mapel'];?> - <?php echo $datakelas['nm_mapel'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                                <div class="form-group">
                                                    <label>Aspek</label>
                                                   <select class="form-control" label="aa" name="aspek">
                                                     
                                                        <option value="Pengetahuan">Pengetahuan</option>
                                                        <option value="Keterampilan">Keterampilan</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi Raport</label>
                                                    <textarea class="form-control" placeholder="Deskripsi Raport" name="deskripsi_raport"><?php echo $cari['deskripsi_raport'];?></textarea>
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
    $id_deskripsi   =   $_POST['id_deskripsi'];
    $kd_mapel   =   $_POST['kd_mapel'];    
    $aspek   =   $_POST['aspek'];
    $deskripsi_raport = $_POST['deskripsi_raport'];

    // for($i=0;$i<=$jumlah;++$i){
        $sql = "UPDATE tb_deskripsi_raport set kd_mapel='$kd_mapel',  aspek='$aspek', deskripsi_raport='$deskripsi_raport' where id_deskripsi='$id_deskripsi'";
         $query = mysqli_query($connect, $sql);
    
       
    
    // }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='deskripsi_walikelas.php?ids';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        