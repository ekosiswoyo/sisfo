<?php
include '../config.php';
include 'header.php';
$nis = $_GET['id'];
$mapel = $_GET['mapel'];

$kls = $_GET['kelas'];
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Detail Ukuran Siswa</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                       <form action="" method="POST">
                                       <?php
                                        $siswa = mysqli_query($connect, "SELECT * FROM tb_ukuran a, tb_siswa b where a.nis='$nis' and b.nis=a.nis");
                                        $siswa_d = mysqli_fetch_array($siswa);
                                       ?>
                                       <table>
                                       <tr>
                                        <th>NIS</th>
                                        <th> : </td>
                                        <th><?php echo $siswa_d['nis'];?></td>
                                       </tr>
                                       <tr>
                                        <th>Nama Siswa</td>
                                        <th> : </th>
                                        <th> <?php echo $siswa_d['nm_siswa'];?></th>
                                       </tr>
                                      
                                       </table>
                                       <hr>

                                          

                                        </form>

                                        
                                       
                                    <div class="table-responsive col-md-12">
                                    <form method="POST" action="">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Aspek</th>
                                                    <th>Smt 1</th>
                                                    <th>Smt 2</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               

                                                    <?php
                                                    
                                                $no = 1;
                                                        $data = mysqli_query($connect, "SELECT * FROM tb_ukuran a, tb_siswa b where a.nis='$nis' and b.nis=a.nis");
                                                        while($datas = mysqli_fetch_array($data)){

                                                    ?>
                                                    <tr class="odd gradeX">
                                                    
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $datas['aspek']; ?> </td>
                                                    <td><?php echo $datas['smt1']; ?></td>
                                                    <td><?php echo $datas['smt2']; ?></td>
                                                    <td><a href="edit_ukuran.php?id=<?php echo $datas['id_ukuran'];?>"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>&nbsp;<a href="del_ukuran.php?id=<?php echo $datas['id_ukuran'];?>"  onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a></td>

                                                </tr>
                                                        <?php } 
                                                        ?>
                                                        
                                                  
                                                
                                            </tbody>
                                        </table>
                                       
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
?>
        