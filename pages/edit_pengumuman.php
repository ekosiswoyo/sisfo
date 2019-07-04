<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_nilai where id_pengumuman='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Data Pengumuman</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Pengumuman
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="" enctype="multipart/form-data">

                                            <div class="form-group">
                                                    <label>Judul</label>
                                                    <input class="form-control" type="hidden" name="id_pengumuman" value="<?php echo $cari['id_pengumuman'];?>">
                                                    <input class="form-control" placeholder="Judul" name="judul" value="<?php echo $cari['judul'];?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Isi</label>
                                                    <textarea class="form-control" rows="3" name="isi" required><?php echo $cari['isi'];?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>File</label>
                                                    <input type="file" name="file">
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
    $id_pengumuman   =   $_POST['id_pengumuman'];
    $judul   =   $_POST['judul'];
    $isi   =   $_POST['isi'];  
    $nama_file1		= $_FILES['file']['name'];
	
	
	$lokasi_file1    = $_FILES['file']['tmp_name'];
    $ekstensi_file = $_FILES["file"]["type"];

    $sql = "UPDATE tb_nilai set judul='$judul', isi='$isi', file='$nama_file1' where id_pengumuman = '$id_pengumuman'";
    $query = mysqli_query($connect, $sql);

    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='pengumuman.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }


}
?>