<?php 
 
?>
<?php  include('../../rule/koneksi.php');?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CV. Trimitra Agriduta</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
 
<link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

	  
	   <li class="nav-item">
        <a class="nav-link"  href="../../rule/keluar.php" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
	
    </ul>
  </nav>
  <!-- /.navbar -->


<?php  include('../menu_menu.php');?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


  
  <div class="card">
    <div class="card-body">

<?php
$result_desember  = mysqli_query($conn, "SELECT * FROM tbl_histori WHERE month(tanggal) = 12") or die(mysqli_error($conn));
$result_januari = mysqli_query($conn, "SELECT * FROM tbl_histori WHERE month(tanggal) = 01") or die(mysqli_error($conn));
$result_februari = mysqli_query($conn, "SELECT * FROM tbl_histori WHERE month(tanggal) = 02") or die(mysqli_error($conn));



$desember = mysqli_num_rows($result_desember);
$januari = mysqli_num_rows($result_januari);
$februari = mysqli_num_rows($result_februari);

?>

    <?php
$result = $conn->query("SELECT *,tbl_histori.nama as namanya FROM tbl_histori INNER JOIN tbl_user ON tbl_histori.id_sales = tbl_user.username where status = 'Pesanan Dibuat'") or die($conn->error);  

$totalSQL = $conn->query("SELECT SUM(totalharga) as 'total' FROM `tbl_histori`;") or die($conn->error);  
$mytotal = mysqli_fetch_array($totalSQL);

$jumlah = mysqli_num_rows($result);

?>


<?php
$mytotal_desember  = mysqli_query($conn, "SELECT * FROM tbl_histori WHERE month(tanggal) = 12") or die(mysqli_error($conn));
$mytotal_januari = mysqli_query($conn, "SELECT * FROM tbl_histori WHERE month(tanggal) = 01") or die(mysqli_error($conn));
$mytotal_februari = mysqli_query($conn, "SELECT * FROM tbl_histori WHERE month(tanggal) = 02") or die(mysqli_error($conn));



$desemberlaporan = mysqli_num_rows($mytotal_desember);
$januarilaporan = mysqli_num_rows($mytotal_januari);
$februarilaporan = mysqli_num_rows($mytotal_februari);

?>
<?php 

$result = $conn->query("SELECT *,tbl_histori.nama as namanya FROM tbl_histori INNER JOIN tbl_user ON tbl_histori.id_sales = tbl_user.username where status = 'Dikirim'") or die($conn->error);  

$totalSQL = $conn->query("SELECT SUM(totalharga) as 'total' FROM `tbl_histori`;") or die($conn->error);  
$mytotal = mysqli_fetch_array($totalSQL);

$jumlahkirim = mysqli_num_rows($result);
?>
<div class="row">
<div class="col-6">
<div class="small-box bg-info">
<div class="inner">
<h3 class="info-box-number"><?php echo $jumlah ?></h3>
<p>New Orders</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="../pemesanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-6">
<div class="small-box bg-info">
  
<div class="inner">
<h3 class="info-box-number"><?php echo $jumlahkirim ?></h3>
<p>New Delivery</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="../dikirim" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-12">
<div class="card card-info">
<div class="card-header">
<h3 class="card-title">Line Chart</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
 </button>
</div>
</div>
<div class="card-body">
<div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
<canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 369px;" width="553" height="375" class="chartjs-render-monitor"></canvas>
</div>
</div>
</div>

<div class="card card-success">
<div class="card-header">
<h3 class="card-title">Bar Chart</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<div class="card-body">
<div class="chart">
<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
</div>





 
        <!-- /.modal-dialog -->
      </div>
  <!-- Main footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../plugins/chart.js/Chart.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="../../dist/js/demo.js"></script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.

    var areaChartData = {
      labels  : ['Desember','January', 'February'],
      datasets: [
        {
          // label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $desember;?>, <?php echo $januari;?>, <?php echo $februari;?>]
        },
        {
          // label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [20, 20, 20]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }


    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
  
</script>
<script>
   $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.

    var areaChartData = {
      labels  : ['Desember','January', 'February'],
      datasets: [
        {
          label               : 'Pendapatan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $desemberlaporan;?>, <?php echo $januarilaporan;?>, <?php echo $februarilaporan;?>]
        },
        {
          label               : 'Target Pendapatan',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [1000000, 1000000, 1000000]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>
</body>
</html>