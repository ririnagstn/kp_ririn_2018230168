<?php 

include '../rule/koneksi.php';

if (isset ($_POST['save'])){

    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];
    $email = $_POST['email'];


    $query=mysqli_query($conn,"INSERT into tbl_pelanggan (id_pelanggan,nama_pelanggan,alamat, no_tlp, email) VALUES ('$id_pelanggan','$nama_pelanggan','$alamat', '$no_tlp', '$email')");

    if (!$query) {
        die('Query Error : '.mysqli_errno($conn). 
        ' - '.mysqli_error($conn));
    }

	header("location:datapelanggan.php");

}



// if (isset ($_POST['buat_pesanan'])){

//     $nama = $_POST['nama'];
//     $alamat = $_POST['alamat'];
//     $total = $_POST['total'];
//     $id_pesanan = $_POST['id_pesanan'];
//     $id_sales = $_SESSION['username'];


//     $query=mysqli_query($conn,"INSERT into tbl_histori (id_histori,totalharga,status,nama,alamat,id_sales) VALUES ('$id_pesanan','$total','Pesanan Dibuat','$nama','$alamat','$id_sales')");

//     if (!$query) {
//         die('Query Error : '.mysqli_errno($conn). 
//         ' - '.mysqli_error($conn));
//     }

// 	header("location:index.php?sukses_pesanan");

// }

?>