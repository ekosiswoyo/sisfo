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
                                       
                                       
                                    <div class="table-responsive col-md-12">
                                    <form method="POST" action="">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Lihat Nilai</th>
                                                    <th>Mapel</th>
                                                    <th>Angka Pengetahuan</th>
                                                    <th>Deskripsi Pengetahuan</th>
                                                    <th>Angka Keterampilan</th>
                                                    <th>Deskripsi Keterampilan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                if(isset($_POST['cari'])){

                                                    $kelas=$_POST['kelas'];
                                                
                                                    $sql = mysqli_query($connect, "SELECT * FROM tb_siswa where kd_kelas='$kelas'");
                                                    while($sqlcari = mysqli_fetch_array($sql)){
                                                
                                                
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $sqlcari['nis']; ?></td>
                                                    <td><?php echo $sqlcari['nm_siswa']; ?></td>
                                                    <td><a href="input_nilaiuts.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Lihat Nilai</button></a></td>
                                                    <td>
                                                    <input class="form-control" placeholder="Kegiatan" name="nis[]" value="<?php echo $sqlcari['nis'];?>" type="hidden">
                                                    <select class="form-control" label="aa" name="kd_mapel[]">
                                                        <?php
                                                        $kelas = mysqli_query($connect,"select * from tb_mapel");
                                                        while($datakelas = mysqli_fetch_array($kelas)){
                                                        ?>
                                                        <option value="<?php echo $datakelas['kd_mapel'];?>"><?php echo $datakelas['kd_mapel'];?> - <?php echo $datakelas['nm_mapel'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </td>
                                                    <td>
                                                    <input class="form-control" placeholder="Angka Pengetahuan" name="angka_pengetahuan[]" required>
                                                    </td>


                                                    <td><input class="form-control" placeholder="Deskripsi Pengetahuan" name="deskripsi_pengetahuan[]" required></td>
                                                    <td><input class="form-control" placeholder="Angka Keterampilan" name="angka_keterampilan[]" required></td>
                                                    <td><input class="form-control" placeholder="Deskripsi Keterampilan" name="deskripsi_keterampilan[]" required></td>
                                                </tr>
                                                <?php 
                                                    }
                                            } ?>
                                                
                                            </tbody>
                                        </table>
                                        <button type="submit" name="simpan" class="btn btn-outline btn-primary">Simpan</button>
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

    $nis   =   $_POST['nis'];
    $kd_mapel   =   $_POST['kd_mapel'];
    $angka_pengetahuan   =   $_POST['angka_pengetahuan'];
    $deskripsi_pengetahuan   =   $_POST['deskripsi_pengetahuan'];
    $angka_keterampilan   =   $_POST['angka_keterampilan'];
    $deskripsi_keterampilan   =   $_POST['deskripsi_keterampilan'];
    $jumlah = count($kd_mapel) - 1;

    for($i=0;$i<=$jumlah;++$i){
        $sql = "INSERT INTO tb_nilai_uts (kd_mapel,nis,angka_pengetahuan,deskripsi_pengetahuan,angka_keterampilan,deskripsi_keterampilan) VALUES ('$kd_mapel[$i]','$nis[$i]','$angka_pengetahuan[$i]','$deskripsi_pengetahuan[$i]','$angka_keterampilan[$i]','$deskripsi_keterampilan[$i]')";
        $query = mysqli_query($connect, $sql);
    
       
    
    }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='input_uts.php';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        