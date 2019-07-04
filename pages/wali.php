<?php
include '../config.php';
include 'header.php';
?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Wali Murid</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Semua Data Wali Murid
                                </div>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">

                                        <!-- <div class="form-group col-md-3">
                                            <a href="add_wali.php" ><button type="button" class="btn btn-outline btn-success">Tambah Data</button></a>
                                        </div> -->
                                       
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama Bapak</th>
                                                    <th>Nama Ibu</th>
                                                    <th>Jabatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = mysqli_query($connect, "Select * from tb_guru");
                                                while($data = mysqli_fetch_array($sql)){
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['nip']; ?></td>
                                                    <td><?php echo $data['nm_guru']; ?></td>
                                                    <td><?php echo $data['jns_kel']; ?></td>
                                                    <td><?php echo $data['jabatan']; ?></td>
                                                    <td><a href="det_guru.php?id=<?php echo $data['nip'];?>"><i class="fa fa-eye" aria-hidden="true" title="Detail"></i></a>&nbsp;<a href="edit_guru.php?id=<?php echo $data['nip'];?>"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>&nbsp;<a href="del_guru.php?id=<?php echo $data['nip'];?>"  onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a></td>
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
        