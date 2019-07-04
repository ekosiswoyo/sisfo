<?php
include '../config.php';
include 'header.php';
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Tambah Data Guru</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tambah Data Guru
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>NIP</label>
                                                    <input class="form-control" placeholder="NIP" name="nip" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <p><i>**Silahkan diisi jika menjadi seorang Wali Kelas</i></p>
                                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Guru</label>
                                                    <input class="form-control" placeholder="Nama Guru" name="nm_guru" required>
                                                </div>

                                                 <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" name="jns_kel" required>
                                                        <option>-- Silahkan Pilih Jenis Kelamin --</option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" name="alamat" required></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <input class="form-control" placeholder="Pendidikan Terakhir" name="pend_terakhir" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Jabatan</label>
                                                    <input class="form-control" placeholder="Jabatan" name="jabatan" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input class="form-control" placeholder="Status" name="status" required>
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

    $nip   =   $_POST['nip'];
    $nm_guru   =   $_POST['nm_guru'];
    $jns_kel   =   $_POST['jns_kel'];
    $alamat   =   $_POST['alamat'];
    $pend_terakhir   =   $_POST['pend_terakhir'];
    $jabatan   =   $_POST['jabatan'];
    $status   =   $_POST['status'];
    $pass = $_POST['password'];
    $password = md5($_POST['password']);
     $cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_guru where nip='$nip'"));
   if($cek > 0){
    echo "<script>window.alert('NIP Sudah Ada!');</script>";
       echo "<script>window.location='add_guru.php?id=$nis';</script>";

   }else{

    if($pass == NULL){
        $query = mysqli_query($connect,"INSERT INTO tb_guru (nip,nm_guru,jns_kel,alamat,pend_terakhir,jabatan,status) VALUES ('$nip','$nm_guru','$jns_kel','$alamat','$pend_terakhir','$jabatan','$status')");
       
        if($query){
            echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
           echo "<script>window.location='guru.php';</script>";
        }else{
            echo 'Update Data Gagal!';
        }
    

    }else{
        $querys = mysqli_query($connect,"INSERT INTO tb_guru (nip,nm_guru,jns_kel,alamat,pend_terakhir,jabatan,status) VALUES ('$nip','$nm_guru','$jns_kel','$alamat','$pend_terakhir','$jabatan','$status')");
        $querys .= mysqli_query($connect,"INSERT INTO tb_user (username,password,nama,level) VALUES ('$nip','$password','$nm_guru','Wali Kelas')");
       
        if($querys){
            echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
           echo "<script>window.location='guru.php';</script>";
        }else{
            echo 'Update Data Gagal!';
        }
    
    }

}
   

}
?>