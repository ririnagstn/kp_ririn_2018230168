<?php 
include 'koneksi.php';


 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        
        $row = mysqli_fetch_assoc($result);

        // echo $row['akses'];
        // die;
        if($row['akses'] == 'sales'){

        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
       
        header("Location: ../sales");


    } else if ($row['akses'] == 'kasir'){

      $_SESSION['username'] = $row['username'];
      $_SESSION['nama'] = $row['nama'];
      header("Location: ../kasir/home");
    }
    

    } 
    else {
		
		$_SESSION['info'] = '<div class="alert alert-danger alert-dismissible"> 
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h5><i class="icon fas fa-exclamation-triangle"></i>Gagal</h5>
		Username atau Password salah
	  </div>';

		header("Location: ../index.php");
    }
}
 
?>
