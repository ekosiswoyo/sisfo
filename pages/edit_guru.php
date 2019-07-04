<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_guru where nip='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Guru</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Guru
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                               <div class="form-group">
                                                    <label>NIP</label>
                                                    <input class="form-control" placeholder="NIP" name="nip" value="<?php echo $cari['nip'];?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Guru</label>
                                                    <input class="form-control" placeholder="Nama Guru" name="nm_guru" value="<?php echo $cari['nm_guru'];?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" name="jns_kel">
                                                        <option  value="<?php echo $cari['jns_kel'];?>"><?php echo $cari['jns_kel'];?></option>
                                                        <option>-- Silahkan Pilih Jenis Kelamin --</option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="3" name="alamat"><?php echo $cari['alamat'];?></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <input class="form-control" placeholder="Pendidikan Terakhir" name="pend_terakhir"  value="<?php echo $cari['pend_terakhir'];?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Jabatan</label>
                                                    <input class="form-control" placeholder="Jabatan" name="jabatan"  value="<?php echo $cari['jabatan'];?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input class="form-control" placeholder="Status" name="status"  value="<?php echo $cari['status'];?>">
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

    $sql = "UPDATE tb_guru SET nm_guru='$nm_guru', jns_kel='$jns_kel', alamat='$alamat', pend_terakhir='$pend_terakhir', jabatan='$jabatan', status='$status' where nip='$nip'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='guru.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>
