<!DOCTYPE html>
<?php include '../rule/koneksi.php'?>


<?php

if(isset($_GET['detail'])){

    $id = $_GET['detail'];

    $result_table = $conn->query("SELECT * FROM tbl_pesanan INNER JOIN tbl_barang ON tbl_pesanan.id_barang = tbl_barang.id  where id_pesanan = '$id' ") or die($conn->error);  
   
    // $result_table  = mysqli_query($conn, "SELECT * FROM tbl_histori WHERE id_histori ='$id'") or die(mysqli_error($conn));
    if (!$result_table) {
      die('Query Error : '.mysqli_errno($conn). 
      ' - '.mysqli_error($conn));
    }


}else{
    echo "Akses Ditolak";
    die;
}

?>


<?php

if(isset($_GET['detail'])){

    $id = $_GET['detail'];


    $result_table  = mysqli_query($conn, "SELECT * FROM tbl_histori WHERE id_histori ='$id'") or die(mysqli_error($conn));

    if (!$result_table) {
      die('Query Error : '.mysqli_errno($conn). 
      ' - '.mysqli_error($conn));
    }

    $row2 = mysqli_fetch_array($result_table);

}else{
    echo "Akses Ditolak";
    die;
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




         <?php 

$result = $conn->query("SELECT * FROM tbl_pesanan INNER JOIN tbl_barang ON tbl_pesanan.id_barang = tbl_barang.id  where id_pesanan = '$id' ") or die($conn->error);  


?>

<section class="content">
<div class="container-fluid">



<div class="card">
  <div class="card-body"><h4>Detail Barang</h4></div>
</div>


<div class="row">
  
<div class="col-md-8">


<div class="card">
<div class="card-body">


<table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th >ID</th>
                                <th >Nama Barang</th>
                                <th >Qty</th>
                                <th >Harga</th>
                              </tr>
                            </thead>
                            <tbody>

                                <?php while($row = $result->fetch_assoc()):?>

             
                                  <tr>
          
          <td><?php echo $row['id_barang']; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td><?php echo $row['qty']; ?></td>

          <td><?php echo $row['harga']; ?></td>
    


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

<div class="info-box-content">
  <span class="info-box-text">Status</span>
  <h4 class="info-box-number"><?php echo $row2['status']; ?></h4>
  <p>Dipesan : <?php echo $row2['tanggal']; ?></p>
  <p>Dikirim :<?php echo $row2['tgl_dikirim']; ?> </p>
  <p>Diterima : <?php echo $row2['tgl_diterima']; ?></p>
</div>
<!-- /.info-box-content -->
</div>

<div class="info-box">

<div class="info-box-content">
  <span class="info-box-text">Nama Pelanggan</span>
  <h4 class="info-box-number"><?php echo $row2['nama_pelanggan']; ?></h4>
</div>
<!-- /.info-box-content -->
</div>
          <div class="info-box">

              <div class="info-box-content">
                <span class="info-box-text">Nama PIC</span>
                <h4 class="info-box-number"><?php echo $row2['nama']; ?></h4>
              </div>
              <!-- /.info-box-content -->
            </div>

            <div class="info-box">

<div class="info-box-content">
  <span class="info-box-text">Alamat Pemesan</span>
  <h4 class="info-box-number"><?php echo $row2['alamat']; ?></h4>
</div>
<!-- /.info-box-content -->
</div>


<div class="info-box">

<div class="info-box-content">
  <span class="info-box-text">Total Pemesanan</span>
  <h4 class="info-box-number"><?php echo $row2['totalharga']; ?></h4>
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
      "buttons": ["pdf", "print"]
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