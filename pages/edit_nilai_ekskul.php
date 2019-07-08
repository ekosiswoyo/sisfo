<?php
include '../config.php';
include 'header.php';
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Semua Data Siswa
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                       <form action="" method="POST">
                                           <p><i>**Silahkan Pilih Kelas terlebih dahulu!</i></p>
                                        <div class="form-group col-md-3">
                                            <select class="form-control" name="kelas">
                                                <option>-- Silahkan Pilih Kelas --</option>
                                                <?php
                                                $sqlkelas = mysqli_query($connect, "SELECT * FROM tb_kelas");
                                                while($kelas = mysqli_fetch_array($sqlkelas)){
                                                ?>
                                                <option value="<?php echo $kelas['kd_kelas'];?>"><?php echo $kelas['kd_kelas'];?> - <?php echo $kelas['nm_kelas'];?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <button type="submit" name="cari" class="btn btn-outline btn-primary">Cari</button>
                                        </div>

                                        </form>
                                        <div class="form-group col-md-3">
                                            <a href="add_siswa.php" ><button type="button" class="btn btn-outline btn-success">Tambah Data</button></a>
                                        </div>
                                       
                                    <div class="table-responsive col-md-12">
                                    <form method="POST" action="">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Aksi</th>
                                                    
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                if(isset($_POST['cari'])){

                                                    $kelas=$_POST['kelas'];
                                                
                                                    $sql = mysqli_query($connect, "SELECT * FROM tb_siswa a, tb_nilai_ekskul b where a.nis=b.nis and a.kd_kelas='$kelas' ");
                                                    while($sqlcari = mysqli_fetch_array($sql)){
                                                
                                                
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $sqlcari['nis']; ?></td>
                                                    <td><?php echo $sqlcari['nm_siswa']; ?></td>
                                                    <td>
                                                    <input class="form-control" placeholder="Kegiatan" name="kd_nilai_ekskul[]" value="<?php echo $sqlcari['kd_nilai_ekskul'];?>" type="hidden">
                                                    <select class="form-control" label="aa" name="kd_ekskul[]">
                                                        <?php
                                                        $kelas = mysqli_query($connect,"select * from tb_ekstrakurikuler");
                                                        while($datakelas = mysqli_fetch_array($kelas)){
                                                        ?>
                                                        <option value="<?php echo $datakelas['kd_ekskul'];?>"><?php echo $datakelas['kd_ekskul'];?> - <?php echo $datakelas['nm_ekskul'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </td>
                                                    <td><input class="form-control" placeholder="Deskripsi" name="deskripsi[]" value="<?php echo $sqlcari['deskripsi'];?>"></td>
                                                </tr>
                                                <?php 
                                                    }
                                            } ?>
                                                
                                            </tbody>
                                        </table>
                                        <button type="submit" name="simpan" class="btn btn-outline btn-primary">Selanjutnya</button>
                                        </form>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
include 'footer.php';
include '../config.php';

if(isset($_POST['simpan'])){

    $kd_nilai_ekskul   =   $_POST['kd_nilai_ekskul'];
    $kd_ekskul   =   $_POST['kd_ekskul'];
    $deskripsi   =   $_POST['deskripsi'];
    $jumlah = count($kegiatan) - 1;

    for($i=0;$i<=$jumlah;++$i){
        $sql = "UPDATE tb_nilai_ekskul SET deskripsi = '$deskripsi[$i]' where kd_nilai_ekskul = $kd_nilai_ekskul[$i]";
        $query = mysqli_query($connect, $sql);
    
       
    
    }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='siswa.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        