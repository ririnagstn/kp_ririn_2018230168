<?php 

include 'koneksi.php';
include 'kode_otomatis.php';


if (isset ($_POST['proses-pesanan'])){

			// get data parsing dari menu pesanan

			$text = $_POST['code'];
			$idnya = $_POST['idnya'];
			$total = $_POST['totalnya'];


	
			if ($total === ""){

				header("location:../pesanan.php?null");
die;
			}

	

			$tanggal = date("d");
			$bulan = date("m");
			$tahun = date("Y");



			$pesanan=explode("#", $text);  

			echo "Data parsing yang diterima dari pesanan adalah :";
			echo "<pre>";
			echo print_r($pesanan);
			echo "</pre>";

			// setelah diterima maka PREPARE UNTUK di masukan ke database

			// Turn autocommit off
			mysqli_autocommit($conn,FALSE);

			for ($i = 0; $i < count($pesanan) - 1; $i++)  {
				
				$query=mysqli_query($conn,"INSERT into tbl_pesanan (id_pesanan,id_makanan,nama,harga,qty) VALUES ($pesanan[$i])");

				if (!$query) {
					die('Query Error : '.mysqli_errno($conn). 
					' - '.mysqli_error($conn));
				}
			}

				$query=mysqli_query($conn,"INSERT into tbl_histori (id_histori,totalharga,tanggal,bulan,tahun,status) VALUES ('$kodepesanan','$total','$tanggal','$bulan','$tahun','Pending')");
				
				if (!$query) {
					die('Query Error : '.mysqli_errno($conn). 
					' - '.mysqli_error($conn));
				}

			// Commit transaction

			echo "Berhasil! . Data Lolos dari seleksi dan segera di exsekusi ";
			mysqli_commit($conn);

			// Rollback transaction
			mysqli_rollback($conn);

			// Close connection
			mysqli_close($conn);

				
			header("location:../sukses.php?detail=$idnya");
}
?>