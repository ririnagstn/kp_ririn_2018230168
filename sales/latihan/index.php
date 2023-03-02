<!DOCTYPE html>
<?php include '../../rule/koneksi.php'?>
<html>
<head>
 <title>maribelajarcoding.com</title>

</head>
<body>
 <h2>maribelajarcoding.com</h2>
<form method="POST">
 <select name="tbl_pelanggan" id="nama_pelanggan">
  <option disabled selected> Pilih </option>
 <?php 
  $sql=mysql_query("SELECT * FROM tbl_pelanggan");
  while ($data=mysql_fetch_array($sql)) {
 ?>
   <option value="<?=$data['nama_pelanggan']?>"><?=$data['nama_pelanggan']?></option> 
 <?php
  }
 ?>
  </select>
  <input type="submit" name="simpan" value="Simpan">
</form>
<?php
 if (isset($_POST['simpan'])) {
  echo "<br>Data yang dipilih:<br>";
  echo $_POST['tbl_pelanggan'];
 }
?>
</body>
</html>