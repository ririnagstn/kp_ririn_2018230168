
<?php  include('../../rule/koneksi.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT. Trimitra Agri Duta</title>

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
$query_laporan=mysqli_query($conn,"SELECT * FROM tbl_histori");

// $result  = mysqli_query($conn, "SELECT * FROM tbl_pesanan INNER JOIN tbl_barang ") or die(mysqli_error($conn));

$totalSQL  = mysqli_query($conn, "SELECT SUM(totalharga) as 'total' FROM `tbl_histori`;") or die(mysqli_error($conn));

$mytotal = mysqli_fetch_array($totalSQL);




$jumlah = mysqli_num_rows($query_laporan);
?>

<section class="content">
<div class="container-fluid">

<div class="row">
  
<div class="col-12">


<div class="card">
<div class="card-body">


<table id="example1" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th >ID</th>
                                <th >Tanggal</th>
                                <th >Nama Pemesanan</th>
                                <th >Total Harga</th>
                              </tr>
                            </thead>
                            <tbody>

<?php while($row = $query_laporan->fetch_assoc()):?>


<tr>
				  <td>    <?php echo $row['id_pesanan']?>
                  <td>    <?php echo $row['tanggal']?>
				  <td>    <?php echo $row['nama_pembeli']?>
                  <td>    <?php echo $row['totalharga']?>
 </td>
</td>
</td>    
  				</td>
				  </tr>
                               
          <?php endwhile; ?>
         
                  </tbody>
                </table>
                <div class="row ">
<div class="col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success">Rp</span>

              <div class="info-box-content">
                <span class="info-box-text">Pendapatan</span>
                <h4 class="info-box-number"><?php echo number_format($mytotal['total'], 0, ',', '.'); ?></h4>
              </div>
              <!-- /.info-box-content -->
          
            <!-- /.info-box -->

          </div>
          <!-- /.col -->
        </div>

</div>
</div>





</div>




</div>
</div>



</div>
</div>






                             
                          
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
