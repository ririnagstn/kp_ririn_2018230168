<!DOCTYPE html>
<?php include '../rule/koneksi.php'?>
<?php
 
// https://www.malasngoding.com
// menghubungkan dengan koneksi database

 
// mengambil data barang dengan kode paling besar
$query_code = mysqli_query($conn, "SELECT max(id_pelanggan) as kodeTerbesar FROM tbl_pelanggan");

$data = mysqli_fetch_array($query_code);
$kodepelanggan = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodepelanggan, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "PLG-";
$kodepelanggan = $huruf . sprintf("%03s", $urutan);




 
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

         <?php 
$result = $conn->query("SELECT * FROM tbl_pelanggan") or die($conn->error);
?>


<!-- Content Wrapper. Contains page content --> 
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">



<div class="card  mt-3">
  <div class="card-body"><h4>Data Barang</h4></div>
</div>


<div class="card">
<div class="card-body">




              <a href="addpelanggan.php"><button type="button" class="btn btn-primary">
                  <i class="far fa-plus-square"></i> Tambah Data Barang
            </button></a>
            <br><br>


              <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                              <!-- <th >ID Pelanggan</th> -->
                      <th >Nama Pelanggan</th>
                      <!-- <th >PIC</th> -->
                      <th  >Alamat Pelanggan</th>
                      <th  >No Telepon</th>
                      <th> Email</th>
                      <!-- <th>Action</th> -->
                              </tr>
                            </thead>
                            <tbody>

                                <?php 
                                
                                while($row = $result->fetch_assoc()):?>

             
                                  <tr>
                      
                                  <!-- <td><?php echo $row['id_pelanggan']; ?></td> -->
                                  <!-- <td><?php echo $kodepelanggan;?></td> -->
				  <td><?php echo $row['nama_pelanggan']; ?> </td>
				  <!-- <td><?php echo $row['pic']; ?> </td> -->
				  <td><?php echo $row['alamat']; ?> </td>
          <td><?php echo $row['no_tlp']; ?> </td>
          <td><?php echo $row['email']; ?> </td>
      
    
<!-- <td>
          <a href ='edit.php?detail=<?php echo $row['id']; ?>' id="btn_save" class="btn btn-primary" name="detail"><i class="fas fa-edit mr-2"></i> Edit</a>
          <a href ='proses.php?delete=<?php echo $row['id']; ?>' id="btn_save" class="btn btn-danger" name="detail"><i class="fas fa-trash mr-2"></i> Hapus</a>
  				
        </td> -->
				  </tr>
                               
          <?php endwhile; ?>
                  </tbody>
                </table>
             
                </div>
                </div>
                </div>
                </div>
                
                                </section>


    
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