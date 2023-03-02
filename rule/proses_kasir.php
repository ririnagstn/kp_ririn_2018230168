<?php 
session_start();
include 'koneksi.php';


function upload(){
	
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];

	$erorr = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// entensi gambar apa
	$filterGambar = ['jpg','jpeg','png'];

	// pecah namanya gunung.png
	// jadi gunung , png
	$pecahNamagambar = explode('.',$namaFile);

	// ambil end terahir png
	$pecahNamagambar = strtolower ( end($pecahNamagambar));

	// validasi
	if ( !in_array($pecahNamagambar,$filterGambar)){
		echo "<script>alert('bukan gambar');</script>";
	}

	if ($ukuranFile > 1000000){
		echo "<script>alert('kegedean');</script>";
	}

	// udah validasi semua sekarang pindah

	move_uploaded_file($tmpName, '../img/'. $namaFile);
}

if (isset ($_POST['save'])){
	
	var_dump ($_FILES);
	$erorr = $_FILES['gambar']['error'];

	if($erorr === 4 ){
		echo "<script>alert('blm ada gambar');</script>";

	}

	$nama = $_POST['nama'];	
	$satuan = $_POST['satuan'];
	$harga = $_POST['harga'];
	$kategori = $_POST['kategori'];
	$namaFile = $_FILES['gambar']['name'];

	upload();

	$query=mysqli_query($conn,"INSERT into tbl_menu_makanan (nama,satuan,harga,kategori,gambar) VALUES ('$nama','$satuan','$harga','$kategori','$namaFile')");

	header("location:../kasir/kasir_menu.php");

}

if (isset ($_GET['delete'])){
	$id = $_GET['delete'];
	
	
	
	$query2=mysqli_query($conn,"SELECT * FROM tbl_menu_makanan WHERE id = $id") or die ($query->error);
	
	$b=mysqli_fetch_array($query2);
	
	var_dump($b);

	unlink("../img/$b[gambar]");
	$query=mysqli_query($conn,"DELETE FROM tbl_menu_makanan WHERE id = $id") or die ($query->error);

	
	header("location:../kasir/kasir_menu.php");
}


if (isset ($_POST['update'])){
	$id = $_POST['myid'];
	$nama = $_POST['nama'];
	$satuan = $_POST['satuan'];
	$harga = $_POST['harga'];
	$kategori = $_POST['kategori'];
	$namaFile = $_FILES['gambar']['name'];
	
	upload();
	
	$query=mysqli_query($conn,"UPDATE tbl_menu_makanan SET nama='$nama',satuan='$satuan',harga='$harga',gambar='$namaFile',kategori='$kategori' WHERE id=$id") or
	die ($query->error);
		
	header("location:../kasir/kasir_menu.php");
}

if (isset ($_POST['pesan'])){

	// get data dlu
	$dibayar = $_POST['dibayar'];
	$total = $_POST['total'];
	$id = $_POST['id'];
	$kembali = $dibayar - $total;
	$_SESSION['kembalian'] = $kembali;
	$_SESSION['pesan_id'] = $id;
	$query=mysqli_query($conn,"UPDATE tbl_histori SET dibayar='$dibayar',totalharga='$total',kembali='$kembali',status='Berhasil' WHERE id_histori='$id'");
		
	if (!$query) {
		die('Query Error : '.mysqli_errno($conn). 
		' - '.mysqli_error($conn));
	}
	
 header("location:../sukses-bayar.php");
}

?>