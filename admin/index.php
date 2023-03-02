<!DOCTYPE html>
<?php include '../rule/koneksi.php'?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT. Trimitra Agri Duta</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
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



<form action="proses.php" method = "post">

<div class="row">
           
<div class="col-md-12">

<div class="card">
<div class="card-body">

<div class="form-group"><label for="company" class=" form-control-label">Username</label>
<input required name="username" type="text" class="form-control" rows="1"></div>

<div class="form-group"><label for="company" class=" form-control-label">Password</label>
<input required name="password" type="text" class="form-control" row="2"></div>

<div class="form-group">
<label>Akses</label>
<select required name="akses" type="text" class ="form-control" row="3">
<option>Manager</option>
<option>Kasir</option>
<option>Sales</option>
<option>Admin</option>
<!-- <input required name="akses" type="text" class="form-control" row="3"></div> -->
</select>
</div>

<div class="form-group"><label for="company" class=" form-control-label">Nama</label>
<input required name="nama" type="text" class="form-control" row="4"></div>


<div class="form-group"><label for="company" class=" form-control-label">Alamat</label>
<textarea required name="alamat" id="" class="form-control" rows="5"></textarea></div> 

<div class="form-group"><label for="company" class=" form-control-label">No Hp</label>
<input required name="no_hp" type="text" class="form-control" row="7"></div>

<div class="form-group"><label for="company" class=" form-control-label">Email</label>
<input required name="email" type="text" class="form-control" row="7"></div>

            <div class="modal-footer justify-content-between">
			
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>      -->
				 	
		<button type="submit" id="" class="btn btn-primary" name="save">Simpan Data Karyawan</button>
		   
		   	
	

</div>
</div>




  </div>
</div>


</div>



</div>









          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cara  Memesan Makanan Disistem ini :</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <img class="img-fluid" src="img/alur.png" alt=" Image" style="padding-bottom: 10px;">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>
 $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Result',
        autohide: true,
        delay: 4050,
        class: 'bg-info mr-5 mt-5 pb-4 pl-4 pr-4',
        body: 'Product Berhasil Ditambahkan Ke Daftar Pesanan'
        
      })
    });
  </script>
<!-- Page specific script -->
</body>
</html>