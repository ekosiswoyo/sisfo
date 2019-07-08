
<?php
session_start();
if(empty($_SESSION['username'])){
    header('location: ../index.php');
    exit(); 
}
include '../config.php';
include 'header.php';

$level =    $_SESSION['level'];
$username =    $_SESSION['username'];

$sql = mysqli_query($connect, "SELECT * FROM tb_user a, tb_kelas b WHERE  a.username='$username' and a.username=b.nip");
$datasql = mysqli_fetch_array($sql);
$walikelas = $datasql['kd_kelas'];
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
                                      
                                      
                                       
                                    <div class="table-responsive col-md-12">
                                    <form method="POST" action="">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Lihat Ukuran</th>
                                                    <th>Aspek Yang di Nilai</th>
                                                    <th>Smt 1</th>
                                                    <th>Smt 2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;

                                                
                                                    $sql = mysqli_query($connect, "SELECT * FROM tb_siswa where kd_kelas='$walikelas'");
                                                    while($sqlcari = mysqli_fetch_array($sql)){
                                                
                                                
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $sqlcari['nis']; ?></td>
                                                    <td><?php echo $sqlcari['nm_siswa']; ?></td>
                                                    <td><a href="input_ukuran.php?id=<?php echo $sqlcari['nis']; ?>&kelas=<?php echo $sqlcari['kd_kelas']; ?>"><button type="button" class="btn btn-outline btn-primary btn-xs">Lihat TB&BB</button></a></td>
                                                     <td>
                                                        <input class="form-control" name="nis[]" value="<?php echo $sqlcari['nis'];?>" type="hidden">
                                                    <select class="form-control" label="Aspek" name="aspek[]">
                                                      
                                                        <option value="Tinggi (Cm)">Tinggi (Cm)</option>
                                                        <option value="Berat Badan (Kg)">Berat Badan (Kg)</option>
                                                     
                                                    </select>
                                                    </td>
                                                  
                                                    <td>
                                                    
                                                    <input class="form-control" placeholder="Smt 1" name="smt1[]" required>
                                                    </td>
                                                    <td>
                                                    <input class="form-control" placeholder="Smt 2" name="smt2[]" required>
                                                    </td>

                                                </tr>
                                                <?php 
                                                    }
                                             ?>
                                                
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
    $aspek = $_POST['aspek'];
    $smt1 = $_POST['smt1'];
    $smt2 = $_POST['smt2'];
    $jumlah = count($nis) - 1;

    for($i=0;$i<=$jumlah;++$i){
        $sql = "INSERT INTO tb_ukuran (nis,aspek,smt1,smt2) VALUES ('$nis[$i]','$aspek[$i]','$smt1[$i]','$smt2[$i]')";
        $query = mysqli_query($connect, $sql);
    
       
    
    }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='ukuran_walikelas.php?ids';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        