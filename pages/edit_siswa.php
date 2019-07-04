<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_siswa where nis='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Siswa
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>NIS</label>
                                                    <input class="form-control" placeholder="NIS" name="nis" value="<?php echo $cari['nis'];?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Siswa</label>
                                                    <input class="form-control" placeholder="Nama Siswa" name="nm_siswa" value="<?php echo $cari['nm_siswa'];?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Pilih Kelas</label>
                                                    <select class="form-control" label="aa" name="kd_kelas">
                                                    <option  value="<?php echo $cari['kd_kelas'];?>"><?php echo $cari['kd_kelas'];?></option>
                                                        <?php
                                                        $kelas = mysqli_query($connect,"select * from tb_kelas");
                                                        while($datakelas = mysqli_fetch_array($kelas)){
                                                        ?>
                                                        <option value="<?php echo $datakelas['kd_kelas'];?>"><?php echo $datakelas['kd_kelas'];?> - <?php echo $datakelas['nm_kelas'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input class="form-control" placeholder="Tempat Lahir" name="tmp_lahir"  value="<?php echo $cari['tmp_lahir'];?>">
                                                </div>

                                                 <div class="form-group">
                                                    <label>Pilih Jenis Kelamin</label>
                                                    <select class="form-control" name="jns_kel">
                                                        <option  value="<?php echo $cari['jns_kel'];?>"><?php echo $cari['jns_kel'];?></option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pilih Agama</label>
                                                    <select class="form-control" name="agama">
                                                        <option value="<?php echo $cari['agama'];?>"><?php echo $cari['agama'];?></option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <input class="form-control" placeholder="Pendidikan Terakhir" name="pend_terakhir"  value="<?php echo $cari['pend_terakhir'];?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" name="alamat"><?php echo $cari['alamat'];?></textarea>
                                                </div>

                                                
                                                <button type="submit" name="simpan" class="btn btn-outline btn-primary">Simpan</button>
                                                <a href="edit_wali.php?id=<?php echo $cari['nis'];?>"><button type="button" name="simpan" class="btn btn-outline btn-default">Selanjutnya</button></a>
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

    $nis   =   $_POST['nis'];
    $nm_siswa   =   $_POST['nm_siswa'];
    $kd_kelas   =   $_POST['kd_kelas'];
    $tmp_lahir   =   $_POST['tmp_lahir'];
    $jns_kel   =   $_POST['jns_kel'];
    $agama   =   $_POST['agama'];
    $pend_terakhir   =   $_POST['pend_terakhir'];
    $alamat   =   $_POST['alamat'];

    $sql = "UPDATE tb_siswa SET nm_siswa='$nm_siswa', kd_kelas='$kd_kelas', tmp_lahir='$tmp_lahir', jns_kel='$jns_kel', agama='$agama', pend_terakhir='$pend_terakhir', alamat='$alamat' where nis='$nis'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='edit_wali.php?id=$nis';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>
