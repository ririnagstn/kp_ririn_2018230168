<!DOCTYPE html>
<?php include '../rule/koneksi.php'?>

<?php $query=mysqli_query($conn,"SELECT * FROM tbl_user");?>

<?php

if(isset($_GET["cari"])){

  $cari = $_GET["cari"];
  $query=mysqli_query($conn,"SELECT * FROM tbl_user WHERE nama LIKE '%$cari%'");
}
?>


<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT. Trimitra Agri Duta</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">


    

         <?php include('menu.php'); ?>



    
    <!-- Main content -->
    <div class="content">

    
      <div class="container mt-3">



      <div class="card">
        <div class="card-body">


<table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Akses</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>no_hp</th>
                                            <th>email</th>

                                        </tr>
                                    </thead>
                                    <tbody>
 <?php $username = $_SESSION['username'];?>                                                                            
<?php $result_table  = mysqli_query($conn, "SELECT * FROM tbl_user") or die(mysqli_error($conn));?>
<?php $no = 0; foreach( $result_table as $rowdata ) : ?>

                                    <tr>
                                            <td><?php echo $rowdata['username'];?></td>
                                            <td><?php echo $rowdata['password'];?></td>
                                            <td><?php echo $rowdata['akses'];?></td>
                                            <td><?php echo $rowdata['nama'];?></td>
                                            <td><?php echo $rowdata['alamat'];?></td>
                                            <td><?php echo $rowdata['no_hp'];?></td>
                                            <td><?php echo $rowdata['email'];?></td>
<!--                                           
                                            <a class="btn btn-info" href="detail.php?detail=<?php echo $rowdata['username'];?>" role="button">Detail</a></td> -->
                                            <!-- <a href ='edit.php?detail=<?php echo $row['id']; ?>' id="btn_save" class="btn btn-primary" name="detail"><i class="fas fa-edit mr-2"></i> Edit</a>-->
         <!-- <a href ='proses.php?delete=<?php echo $row['id']; ?>' id="btn_save" class="btn btn-danger" name="detail"><i class="fas fa-trash mr-2"></i> Hapus</a> -->

                                        </tr>

<?php endforeach;?>

                                                                              
                                    </tbody>
                                </table>

                                </div>
      </div>                    </div>
                                </div>
                                </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Page specific script -->
</body>
</html>