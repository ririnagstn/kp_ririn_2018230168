<?php
include '../../rule/koneksi.php';

// Set the new timezone
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d h:i:s');
echo $date;


if (isset($_POST['update_pengiriman'])) {


    $id = $_POST['id'];
  
  
    $query=mysqli_query($conn,"UPDATE tbl_histori 
    SET status = 'Barang Diterima' , tgl_diterima = '$date'
    where id_histori = '$id'");
  
    
    if (!$query) {
        die('Query Error : '.mysqli_errno($conn). 
        ' - '.mysqli_error($conn));
      }
  
      header("location:index.php?sukses");

  }





  if (isset($_POST['cancel'])) {


    $id = $_POST['id'];
    $alasan = $_POST['alasan'];
  
  
    $query=mysqli_query($conn,"UPDATE tbl_histori 
    SET status = 'Dibatalkan',alasan = '$alasan'
    where id_histori = '$id'");
  
    
    if (!$query) {
        die('Query Error : '.mysqli_errno($conn). 
        ' - '.mysqli_error($conn));
      }
  
      header("location:index.php?batalkan");

  }
?>