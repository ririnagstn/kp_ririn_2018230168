<?php include '../../rule/koneksi.php'?>

<?php 

 
?>

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
          <a href="index.html" class="nav-link">Home</a>
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

<?php 
$result = $conn->query("SELECT * FROM tbl_barang") or die($conn->error);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">



<div class="card  mt-3">
  <div class="card-body"><h4>Tambah Barang</h4></div>
</div>


<div class="card">
<div class="card-body">




<form action="proses.php" method= "POST" enctype = "multipart/form-data">
														  
															<div class="card-body">
															  <div class="form-group">
																<label>Nama Makanan</label>
																<input type="hidden" id ="myid" class="form-control" name="myid" value="<?php echo $id; ?>">
																<input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Makanan">
															  </div>
											 
															 <div class="form-group">
																<label>File Gambar</label>
											<br>  
																	<input type="file" name="gambar">
																 
															  </div>
															  
                                <div class="form-group"><label for="company" class=" form-control-label">Satuan</label>
<input name="satuan" id="" class="form-control" rows="4"></input></div>
															  
<div class="form-group"><label for="company" class=" form-control-label">Kategori</label>
<input name="kategori" id="" class="form-control" rows="4"></input></div>
															  
															  <div class="form-group">
																<label>Harga</label>
																<input type="text" class="form-control" name="harga" id="harga" ]placeholder="Harga">
															  </div>		

												
															
															</div>
                <!-- /.card-body -->

          
              
            </div>
            <div class="modal-footer justify-content-between">
			
            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>     
				 	
		<button type="submit" id="" class="btn btn-primary" name="save">Simpan</button>
		   
		   	
			</div>
			</form>












             
                </div>
                </div>
                </div>
                
                                </section>

                             
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