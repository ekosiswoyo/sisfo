<?php
include '../config.php';
include 'header.php';
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Tambah Data Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tambah Data Siswa
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>NIS</label>
                                                    <input class="form-control" placeholder="NIS" name="nis" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Siswa</label>
                                                    <input class="form-control" placeholder="Nama Siswa" name="nm_siswa" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pilih Kelas</label>
                                                    <select class="form-control" label="aa" name="kd_kelas" required>
                                                    <option>-- Silahkan Pilih Kelas --</option>
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
                                                    <input class="form-control" placeholder="Tempat Lahir" name="tmp_lahir" required>
                                                </div>

                                                 <div class="form-group">
                                                    <label>Pilih Jenis Kelamin</label>
                                                    <select class="form-control" name="jns_kel" required>
                                                        <option>-- Silahkan Pilih Jenis Kelamin --</option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pilih Agama</label>
                                                    <select class="form-control" name="agama" required>
                                                        <option>-- Silahkan Pilih Agama --</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <input class="form-control" placeholder="Pendidikan Terakhir" name="pend_terakhir" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" name="alamat" required></textarea>
                                                </div>

                                                
                                                <button type="submit" name="simpan" class="btn btn-outline btn-primary">Selanjutnya</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </form>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
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
    $password = md5($_POST['password']);

   $cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_siswa where nis='$nis'"));
   if($cek > 0){
    echo "<script>window.alert('NIS Sudah Ada!');</script>";
       echo "<script>window.location='add_siswa.php?id=$nis';</script>";

   }else{

    $sql =  mysqli_query($connect,"INSERT INTO tb_siswa (nis,nm_siswa,kd_kelas,tmp_lahir,jns_kel,agama,pend_terakhir,alamat) VALUES ('$nis','$nm_siswa','$kd_kelas','$tmp_lahir','$jns_kel','$agama','$pend_terakhir','$alamat')");
   
    $sql .=  mysqli_query($connect,"INSERT INTO tb_user (username, password, nama, level) VALUES ('$nis','$password','$nm_siswa','Siswa')"); 

    if($sql){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='add_wali.php?id=$nis';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

}
}
?>