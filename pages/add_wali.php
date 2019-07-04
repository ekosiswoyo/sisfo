<?php
include '../config.php';
include 'header.php';
$nis = $_GET['id'];

?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Tambah Data Wali Murid</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Form Input Data Wali Murid
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                            <form method="POST" action="">
                                            
                                        <div class="col-lg-6">
                                                <input class="form-control" placeholder="NIS" type="hidden" name="nis" value="<?php echo $nis;?>">
                                               
                                                <div class="form-group">
                                                    <label>Nama Bapak</label>
                                                    <input class="form-control" placeholder="Nama Bapak" name="nm_bpk" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Pekerjaan Bapak</label>
                                                    <input class="form-control" placeholder="Pekerjaan Bapak" name="pekerjaan_bpk" required>
                                                </div>

                                                </div>
                                                <div class="col-lg-6">



                                                <div class="form-group">
                                                    <label>Nama Ibu</label>
                                                    <input class="form-control" placeholder="Nama Ibu" name="nm_ibu" required>
                                                </div>

                                                 

                                                 <div class="form-group">
                                                    <label>Pekerjaan Ibu</label>
                                                    <input class="form-control" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" required>
                                                </div>


                                                </div>
                                                <div class="col-lg-12">



                                                <div class="form-group">
                                                    <label>Alamat Orang Tua</label>
                                                    <textarea class="form-control" rows="3" name="alamat_ortu" required></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>No HP</label>
                                                    <input class="form-control" placeholder="No HP" name="no_hp" required>
                                                </div>

<!--                                                 
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-control" placeholder="Username" name="username" type="text" required>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                                </div> -->

                                                <a href="../siswa/edit_siswa.php?id=<?php echo $nis;?>"> <button type="button" class="btn btn-outline btn-primary">Sebelumnya</button></a>
                                               
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
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);

    $sql =  mysqli_query($connect,"INSERT INTO tb_wali_murid (nis,nm_bpk,nm_ibu,pekerjaan_bpk,pekerjaan_ibu,alamat_ortu,no_hp) VALUES ('$nis','$nm_bpk','$nm_ibu','$pekerjaan_bpk','$pekerjaan_ibu','$alamat_ortu','$no_hp')");
   
    // $sql .=  mysqli_query($connect,"INSERT INTO tb_user (username, password, nama, level,nis) VALUES ('$username','$password','$nm_bpk','Wali Murid','$nis')"); 

    if($sql){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='siswa.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>