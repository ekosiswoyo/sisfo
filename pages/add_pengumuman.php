<?php
include '../config.php';
include 'header.php';
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Tambah Data Pengumuman</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tambah Data Pengumuman
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="" enctype="multipart/form-data">


                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input class="form-control" placeholder="Judul" name="judul" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Isi</label>
                                                    <textarea class="form-control" rows="3" name="isi" required></textarea>
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

    $judul   =   $_POST['judul'];
    $isi   =   $_POST['isi'];  
    $nama_file1		= $_FILES['file']['name'];
	
	
	$lokasi_file1    = $_FILES['file']['tmp_name'];
    $ekstensi_file = $_FILES["file"]["type"];


    if($ekstensi_file == "application/pdf" or $ekstensi_file == ""){
    $masuk =  mysqli_query($connect,"INSERT INTO tb_nilai (file,judul,isi) VALUES ('$nama_file1','$judul','$isi')");
    
    move_uploaded_file($lokasi_file1,'../files/'.$nama_file1);

    echo"<script>window.alert('Simpan Berhasil..!')</script>";
    echo"<script>document.location='pengumuman.php';</script>"; 
    
    
    }else{
       echo"<script>window.alert('Simpan Gagal..! Ekstensi file hanya diperbolehkan png, jpg, jpeg, dan gif')</script>";
        echo"<script>document.location='add_pengumuman.php';</script>";
    }														
        
    
}
?>