
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
                                                    <th>KD Semester</th>
                                                    <th>Tema 1</th>
                                                    <th>Tema 2</th>
                                                    <th>Tema 3</th>
                                                    <th>Tema 4</th>
                                                    <th>Tema 5</th>
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
                                                    <td><a href="input_pengetahuan.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Lihat Nilai</button></a></td>
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
                                                    <input class="form-control" placeholder="KD Semester" name="kd_semester[]" required>
                                                    </td>


                                                    <td><input class="form-control" placeholder="Tema 1" name="tema1[]" required></td>
                                                    <td><input class="form-control" placeholder="Tema 2" name="tema2[]" required></td>
                                                    <td><input class="form-control" placeholder="Tema 3" name="tema3[]" required></td>
                                                    <td><input class="form-control" placeholder="Tema 4" name="tema4[]" required></td>
                                                    <td><input class="form-control" placeholder="Tema 5" name="tema5[]" required></td>
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
    $kd_semester   =   $_POST['kd_semester'];
    $tema1 = $_POST['tema1'];
    $tema2 = $_POST['tema2'];
    $tema3 = $_POST['tema3'];
    $tema4 = $_POST['tema4'];
    $tema5 = $_POST['tema5'];
    $jumlah = count($kd_mapel) - 1;

    for($i=0;$i<=$jumlah;++$i){
        $sql = "INSERT INTO tbl_nilai_pengetahuan (kd_mapel,nis,kd_semester,tema1,tema2,tema3,tema4,tema5,deskripsi) VALUES ('$kd_mapel[$i]','$nis[$i]','$kd_semester[$i]','$tema1[$i]','$tema2[$i]','$tema3[$i]','$tema4[$i]','$tema5[$i]')";
        $query = mysqli_query($connect, $sql);
    
       
    
    }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='pengetahuan.php?ids';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        