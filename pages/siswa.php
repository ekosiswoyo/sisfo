<?php
error_reporting(0);
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
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Aksi</th>
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
                                                    <td><?php echo $sqlcari['kd_kelas']; ?></td>
                                                    <td class="center"><?php echo $sqlcari['jns_kel']; ?></td>
                                                    <?php if($level != 'Kepala Sekolah'){
                                                    echo "<td><a href='edit_siswa.php?id=$sqlcari[nis]'><i class='fa fa-edit' aria-hidden='true' title='Edit'></i></a>&nbsp;<a href='del_siswa.php?id=$sqlcari[nis]'  onclick='javascript: return confirm('Anda yakin hapus ?')'><i class='fa fa-trash-o' aria-hidden='true' title='Delete'></i></a></td>";
                                                }
                                                    ?>
                                                  
                                                </tr>
                                                <?php 
                                                    }
                                            } ?>
                                                
                                            </tbody>
                                        </table>
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

?>

        