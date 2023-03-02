<!DOCTYPE html>
<?php include '../rule/koneksi.php'?>
<?php
$s=mysqli_query($conn, "select * from tbl_pelanggan");
?>

<?php
 
// https://www.malasngoding.com
// menghubungkan dengan koneksi database

 
// mengambil data barang dengan kode paling besar
$query_code = mysqli_query($conn, "SELECT max(id_histori) as kodeTerbesar FROM tbl_histori");

$data = mysqli_fetch_array($query_code);
$kodepesanan = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodepesanan, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "ODR";
$kodepesanan = $huruf . sprintf("%03s", $urutan);




 
?>





<?php $query=mysqli_query($conn,"SELECT * FROM tbl_barang");?>

<?php

if(isset($_GET["cari"])){

  $cari = $_GET["cari"];
  $query=mysqli_query($conn,"SELECT * FROM tbl_barang WHERE nama LIKE '%$cari%'");
}
?>


<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT. Trimitra Agri Duta</title>
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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

      <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
      
        <div class="form-group">
            <label for="sel1">Pilih Nama Pelanggan:</label>
            <select class="form-control" name="id_pelanggan">
                <?php
                include "koneksi.php";
                //Perintah sql untuk menampilkan semua data pada tabel jurusan
                $sql="select id_pelanggan,nama_pelanggan from tbl_pelanggan";

                $hasil=mysqli_query($conn,$sql);
                $no=0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;

                    $ket="";
                    if (isset($_GET['id_pelanggan'])) {
                        $nik = trim($_GET['id_pelanggan']);

                        if ($nik==$data['id_pelanggan'])
                        {
                            $ket="selected";
                        }
                    }
                    ?>
                    <option <?php echo $ket; ?> value="<?php echo $data['id_pelanggan'];?>"><?php echo $data['id_pelanggan'];?> - <?php echo $data['nama_pelanggan'];?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-info" value="Pilih">
        </div>
    </form>
    <h2>Input Data</h2>

    <?php

    if (isset($_GET['id_pelanggan'])) {
        $nik=$_GET["id_pelanggan"];

        $sql="select * from tbl_pelanggan where id_pelanggan=$nik";
        $hasil=mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }
    ?>

       

<form action="proses.php" method = "post">

<div class="row">
           
<div class="col-md-4">

<div class="card">
<div class="card-body">
<!-- <div class="form-group">
            <label>Nama Pelanggan:</label>
            <input type="text" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>" class="form-control" required />
        </div> -->
        <div class="form-group"><label for="company" class=" form-control-label">Nama PIC</label>
<input required name="nama" type="text" class="form-control"></div>

<div class="form-group">
            <label>Nama Pelanggan:</label>
            <!-- <input required name="alamat_pelanggan" value="<?php echo $data['nama_pelanggan']; ?>"  type="text" class="form-control" rows="4"></div> -->
            <input type="text" name="nama_pelanggan"  value="<?php echo $data['nama_pelanggan']; ?>" class="form-control" rows ="2" required/>
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <!-- <input required name="alamat_pelanggan" value="<?php echo $data['alamat_pelanggan']; ?>"  type="text" class="form-control" rows="4"></div> -->
            <input type="text" name="alamat"  value="<?php echo $data['alamat']; ?>" class="form-control" rows="4" required/>
        </div>
</div>
</div>



<div class="card">
<div class="card-body">

<label for="">Detail Orderan <?php echo $kodepesanan;?></label>
<hr>


<?php 
$mytotal = 0;

$query_pesanan=mysqli_query($conn,"SELECT * FROM tbl_pesanan INNER JOIN tbl_barang ON tbl_pesanan.id_barang = tbl_barang.id WHERE id_pesanan = '$kodepesanan'");

foreach( $query_pesanan as $row_pesanan ) : ?>

<div class="card-footer mb-3">

<?php echo$row_pesanan['nama'];?>
<br>
<?php echo $myharga = $row_pesanan['harga'];?> x <?php echo $myqty = $row_pesanan['qty'];?>
<br>
<?php $mytemp = ($myharga * $myqty);?>

<?php $mytotal = $mytotal + $mytemp;?>

</div>



<?php endforeach;?>


</div>


<div class="card-footer">
<h4>Total : <?php echo  $mytotal; ?></h4>

<input hidden type="text"name="total" value = "<?php echo $mytotal;?>">
<input hidden type="text"name="id_pesanan" value = "<?php echo $kodepesanan;?>">

<button name="buat_pesanan" type="submit" class="btn btn-primary btn-block mt-3">Buat Pesanan</button>

</div>

</div>

</form>


</div>

<div class="col-lg-8">

<div class="card">
  <div class="card-body">


<form action = "index.php" method = "GET" class="form-inline">
  <div class="form-group">
    <input name="cari"class="form-control form-control" type="search" placeholder="Search" aria-label="Search" style="
      
    ">
    <div class="input-group-append">
    <button class="btn btn-navbar" type="submit">
    <i class="fas fa-search"></i>
    </button>
    <a href="index.php" class="btn btn-navbar">
    <i class="fas fa-times"></i>
   </a>
    </div>
  </div>
</form>  

<br>


<div class="row">



<br>
<!-- Looping CARD MENU  --><!-- Looping CARD MENU  --><!-- Looping CARD MENU  --><!-- Looping CARD MENU  --><!-- Looping CARD MENU  --><!-- Looping CARD MENU  -->



        <?php foreach( $query as $row ) : ?>

          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
            
                
                    <div class="card-body">

                    <h5 id ="nama_card" class="profile-username text-left mb-3"><b><?php echo $row['nama']; ?></b></h5>
                            <img class="img-fluid" src="../img/<?php echo $row['gambar']; ?>" alt=" Image" style="padding-bottom: 10px;">
                            
                            <p class="card-text">
                            <?php echo $row['nama']; ?>
                            </p>

                     
                          
              
                  </div>
                  <div class="card-footer">
                  <p class="" hidden > <?php echo $row['harga']; ?> </p>

                  Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>


                  <form action="proses.php" method="POST">
                    <input class="form-control mt-2 mb-3" type="number" name="qty" min="1" value="1">
                    <input hidden class="form-control mt-2 mb-3" type="text" name="id_pesanan" min="1" value="<?php echo $kodepesanan; ?>">
                    <input hidden class="form-control mt-2 mb-3" type="text" name="id_barang" min="1" value="<?php echo $row['id']; ?>">
       
                    <button type="submit" name="save" class="mb-3 btn btn-block btn-primary">Tambah</button>

                </form>
                    </div>

                 </div>

            </div>
            <?php endforeach; ?>

<!-- END LOOPING CARD MENU  --><!-- END LOOPING CARD MENU  --><!-- END LOOPING CARD MENU  --><!-- END LOOPING CARD MENU  -->




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