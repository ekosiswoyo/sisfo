<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_wali_murid where nis='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Wali Murid</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Wali Murid
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                               <input class="form-control" placeholder="NIS" type="hidden" name="nis" value="<?php echo $cari['nis'];?>">
                                               

                                               <div class="form-group">
                                                   <label>Nama Bapak</label>
                                                   <input class="form-control" placeholder="Nama Bapak" name="nm_bpk" value="<?php echo $cari['nm_bpk'];?>">
                                               </div>

                                               <div class="form-group">
                                                   <label>Nama Ibu</label>
                                                   <input class="form-control" placeholder="Nama Ibu" name="nm_ibu" value="<?php echo $cari['nm_ibu'];?>">
                                               </div>

                                                <div class="form-group">
                                                   <label>Pekerjaan Bapak</label>
                                                   <input class="form-control" placeholder="Pekerjaan Bapak" name="pekerjaan_bpk" value="<?php echo $cari['pekerjaan_bpk'];?>">
                                               </div>

                                                <div class="form-group">
                                                   <label>Pekerjaan Ibu</label>
                                                   <input class="form-control" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" value="<?php echo $cari['pekerjaan_ibu'];?>">
                                               </div>

                                               <div class="form-group">
                                                   <label>Alamat Orang Tua</label>
                                                   <textarea class="form-control" rows="3" name="alamat_ortu"><?php echo $cari['alamat_ortu'];?></textarea>
                                               </div>

                                               <div class="form-group">
                                                   <label>No HP</label>
                                                   <input class="form-control" placeholder="No HP" name="no_hp" value="<?php echo $cari['no_hp'];?>">
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

    $nis    = $_POST['nis'];
    $nm_bpk   =   $_POST['nm_bpk'];
    $nm_ibu   =   $_POST['nm_ibu'];
    $pekerjaan_bpk   =   $_POST['pekerjaan_bpk'];
    $pekerjaan_ibu   =   $_POST['pekerjaan_ibu'];
    $alamat_ortu   =   $_POST['alamat_ortu'];
    $no_hp   =   $_POST['no_hp'];

    $sql = "UPDATE tb_wali_murid SET nis='$nis', nm_bpk='$nm_bpk', nm_ibu='$nm_ibu', pekerjaan_bpk='$pekerjaan_bpk', pekerjaan_ibu='$pekerjaan_ibu', alamat_ortu='$alamat_ortu', no_hp='$no_hp' where nis='$nis'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='../siswa/siswa.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>
