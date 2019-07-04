<?php
include '../config.php';
include 'header.php';
$level =    $_SESSION['level'];
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Ekstrakurikuler</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Semua Data Ekstrakurikuler
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                <?php if($level != 'Kepala Sekolah'){
                                       echo "<div class='form-group col-md-3'>
                                            <a href='add_ekskul.php'><button type='button' class='btn btn-outline btn-success'>Tambah Data</button></a>
                                        </div>";
                                }
                                       ?>
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Ekstrakurikuler</th>
                                                    <th>Nama Ekstrakurikuler</th>
                                                    <?php if($level != 'Kepala Sekolah'){
                                                    echo "<th>Aksi</th>";
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = mysqli_query($connect, "Select * from tb_ekstrakurikuler");
                                                while($data = mysqli_fetch_array($sql)){
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['kd_ekskul']; ?></td>
                                                    <td><?php echo $data['nm_ekskul']; ?></td>
                                                    <?php if($level != 'Kepala Sekolah'){
                                                    echo "<td><a href='edit_ekskul.php?id=$data[kd_ekskul]'><i class='fa fa-edit' aria-hidden='true' title='Edit'></i></a>&nbsp;<a href='del_ekskul.php?id=$data[kd_ekskul]'  onclick='javascript: return confirm('Anda yakin hapus ?')'><i class='fa fa-trash-o' aria-hidden='true' title='Delete'></i></a></td>";
                                                    }
                                                    ?>
                                                </tr>
                                                <?php } ?>
                                                
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
<?php include 'footer.php'; ?>
        