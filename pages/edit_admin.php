<?php
include '../config.php';
include 'header.php';
// $id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_guru where jabatan = 'Tata Usaha'");
$cari = mysqli_fetch_array($sql);

$sqluser = mysqli_query($connect,"select * from tb_user where level = 'Tata Usaha'");
$cariuser = mysqli_fetch_array($sqluser);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Detail Data Administrator</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail Data Administrator
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>NIP</label>
                                                    <input class="form-control" placeholder="NIP" name="nip" value="<?php echo $cari['nip'];?>" >
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Guru</label>
                                                    <input class="form-control" placeholder="Nama Guru" name="nm_guru" value="<?php echo $cari['nm_guru'];?>" >
                                                </div>

                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" name="jns_kel" required>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                    
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" name="alamat" ><?php echo $cari['alamat'];?></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                        <input class="form-control" placeholder="Pendidikan Terakhir" name="pend_terakhir"  value="<?php echo $cari['pend_terakhir'];?>" >
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <input class="form-control" placeholder="Status" name="status"  value="<?php echo $cari['status'];?>" >
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

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail User
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-control" placeholder="Username" name="username" value="<?php echo $cariuser['username'];?>" >
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo $cariuser['password'];?>" >
                                                </div>

                                              
                                                     <button type="submit" name="simpan2" class="btn btn-outline btn-primary">Simpan</button>
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

    $nip   =   $_POST['nip'];
    $nm_guru   =   $_POST['nm_guru'];
    $jns_kel   =   $_POST['jns_kel'];
    $alamat   =   $_POST['alamat'];
    $pend_terakhir   =   $_POST['pend_terakhir'];
    $status   =   $_POST['status'];

    $sql = "UPDATE tb_guru SET nm_guru='$nm_guru', jns_kel='$jns_kel', alamat='$alamat', pend_terakhir='$pend_terakhir',  status='$status' where jabatan='Tata Usaha'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='edit_admin.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}else if(isset($_POST['simpan2'])){
     $username   =   $_POST['username'];
    $password   =   md5($_POST['password']);

    $sql = "UPDATE tb_user SET username='$username', password='$password' where jabatan='Kepala Sekolah'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='edit_kepsek.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}
?>
