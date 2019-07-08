<?php
include '../config.php';
include 'header.php';
$id = $_GET['id'];
$sql = mysqli_query($connect,"select * from tb_ukuran where id_ukuran='$id'");
$cari = mysqli_fetch_array($sql);
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Edit Ukuran Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Ukuran
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" action="">

                                                <div class="form-group">
                                                    <label>Aspek</label>
                                                    <input class="form-control" type="hidden"  name="id_ukuran" value="<?php echo $cari['id_ukuran']; ?>">
                                                      <select class="form-control" label="Aspek" name="aspek[]">
                                                      
                                                        <option value="Tinggi (Cm)">Tinggi (Cm)</option>
                                                        <option value="Berat Badan (Kg)">Berat Badan (Kg)</option>
                                                     
                                                    </select>
                                                    </div>

                                                <div class="form-group">
                                                    <label>Smt 1</label>
                                                    <input class="form-control" placeholder="Smt 1" name="smt1" value="<?php echo $cari['smt1']; ?>">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Smt 2</label>
                                                    <input class="form-control" placeholder="Smt 2" name="smt2" value="<?php echo $cari['smt2']; ?>">
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

    // $nis   =   $_POST['nis'];
    $id_ukuran   =   $_POST['id_ukuran'];
    $aspek   =   $_POST['aspek'];
    $smt1 = $_POST['smt1'];
    $smt2 = $_POST['smt2'];

    // for($i=0;$i<=$jumlah;++$i){
        $sql = "UPDATE tb_ukuran set aspek='$aspek', smt1='$smt1', smt2='$smt2' where id_ukuran='$id_ukuran'";
         $query = mysqli_query($connect, $sql);
    
       
    
    // }
    if($query){
        echo "<script>window.alert('Data Berhasil di Simpan!');</script>";
       echo "<script>window.location='ukuran_walikelas.php?ids';</script>";
    }else{
        echo 'Update Data Gagal!';
    }

  

}
?>
        