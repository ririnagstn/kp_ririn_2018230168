

<?php include '../../rule/koneksi.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT. Trimitra Agriduta</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

	  
	   <li class="nav-item">
        <a class="nav-link"  href="../../rule/keluar.php" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
	
    </ul>
  </nav>
  <!-- /.navbar -->


<?php  include('../menu_menu.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper pt-3">


<?php 

$result = $conn->query("SELECT *,tbl_histori.nama as namanya FROM tbl_histori INNER JOIN tbl_user ON tbl_histori.id_sales = tbl_user.username where status = 'Pesanan Dibuat'") or die($conn->error);  

$totalSQL = $conn->query("SELECT SUM(totalharga) as 'total' FROM `tbl_histori`;") or die($conn->error);  
$mytotal = mysqli_fetch_array($totalSQL);

$jumlah = mysqli_num_rows($result);
?>

<section class="content">
<div class="container-fluid">



<div class="card">
  <div class="card-body"><h4>Pemesanan Barang</h4></div>
</div>


<div class="row">
  
<div class="col-md-8">


<div class="card">
<div class="card-body">


<table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th >ID</th>
                                <th >Nama Pelanggan</th>
                                <th >Nama PIC</th>
                                <!-- <th >Nama Pic</th> -->
                                <th>Tanggal</th>
                                <th >Status</th>
                                <th >Action</th>
                              </tr>
                            </thead>
                            <tbody>

                                <?php while($row = $result->fetch_assoc()):?>

             
                                  <tr>
          
          <td><?php echo $row['id_histori']; ?></td>
          <td><?php echo $row['nama_pelanggan']; ?></td>
          <!-- <td><?php echo $row['nama']; ?></td> -->
          <td><?php echo $row['namanya']; ?></td>
          <td><?php echo $row['tanggal']; ?></td>
          <td><?php echo $row['status']; ?></td>
          
    
<td>
          <a href ='detail.php?detail=<?php echo $row['id_histori']; ?>' id="btn_save" class="btn btn-primary" name="detail"><i class="fas fa-info-circle"></i> Detail</a>
  				</td>

				  </tr>
                               
          <?php endwhile; ?>
                  </tbody>
                </table>


</div>
</div>



</div>


<div class="col-md-4">


<div class="card">
<div class="card-body">


<div class="row ">
          <div class="col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-chart-bar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pesanan</span>
                <h4 class="info-box-number"><?php echo $jumlah ?></h4>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


   
          </div>
          <!-- /.col -->
        </div>


</div>
</div>


</div>








              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        <!-- /.row -->

      </div><!-- /.con-->



                             
                          
  <!-- Main footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
</body>
</html>
