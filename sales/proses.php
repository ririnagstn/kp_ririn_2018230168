<?php 

include '../rule/koneksi.php';

if (isset ($_POST['save'])){

    $id_pesanan = $_POST['id_pesanan'];
    $id_barang = $_POST['id_barang'];
    $qty = $_POST['qty'];


    $query=mysqli_query($conn,"INSERT into tbl_pesanan (id_pesanan,id_barang,qty) VALUES ('$id_pesanan','$id_barang','$qty')");

    if (!$query) {
        die('Query Error : '.mysqli_errno($conn). 
        ' - '.mysqli_error($conn));
    }

	header("location:index.php?sukses");

}





if (isset ($_POST['buat_pelanggan'])){

       $nama_pelanggan = $_SESSION['nama_pelanggan'];
    $alamat = $_SESSION['alamat'];


    $query=mysqli_query($conn,"INSERT into tbl_histori (nama_pelanggan,alamat) VALUES ('$nama_pelanggan','$alamat')");

    if (!$query) {
        die('Query Error : '.mysqli_errno($conn). 
        ' - '.mysqli_error($conn));
    }

	header("location:index.php");

}

if (isset ($_POST['buat_pesanan'])){
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nama = $_POST['nama'];
    $alamat= $_POST['alamat'];
    $total = $_POST['total'];
    $id_pesanan = $_POST['id_pesanan'];
    $id_sales = $_SESSION['username'];


    $query=mysqli_query($conn,"INSERT into tbl_histori (id_histori,totalharga,status,nama_pelanggan,nama,alamat,id_sales) VALUES ('$id_pesanan','$total','Pesanan Dibuat','$nama_pelanggan','$nama','$alamat','$id_sales')");


    if (!$query) {
        die('Query Error : '.mysqli_errno($conn). 
        ' - '.mysqli_error($conn));
    }

	header("location:index.php?sukses_pesanan");

}

?>