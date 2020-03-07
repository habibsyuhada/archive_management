<?php

$backurl = '../';
require_once($backurl . 'config/conn.php');
session_start();
include $backurl . './config/kick-admin.php';
$judulhead = 'Index';

if (isset($_GET['tgl_exp'])) {
  $nmonth = date("m", strtotime($_GET['tgl_exp']));
  $nyear = date("Y", strtotime($_GET['tgl_exp']));
  $statusbt = date("F Y", strtotime($_GET['tgl_exp']));
} else {
  $nmonth = date("m");
  $nyear = date("Y");
  $statusbt = date("F Y");
}


$isi_tgl_exp = '';


?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <?php include $backurl . 'config/admin/head.php'; ?>

  <style type="text/css">
    .flot .flot-base,
    .flot .flot-overlay {
      width: 100% !important;
    }
  </style>
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php include $backurl . 'config/admin/headside.php'; ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ml-auto text-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header text-center">
                    <h5 class="card-title">Data Kontrak Tahun <?= $nyear; ?></h5>
                  </div>
                  <div class="card-body">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div id="flot-placeholder1" style="min-width: 300px;height:300px;"></div>
              </div>
            </div>
            <div id="clickdata"></div>
          </div>
        </div>

        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
        <!-- column -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">
        <strong>Copyright &copy; 2020 <a href="#">Pemasaran</a>.</strong>
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <?php include $backurl . 'config/admin/js.php'; ?>
  <script type="text/javascript">
    $(function() {
      var data1x = [
        ["January", 10],
        ["February", 8],
        ["March", 4],
        ["April", 13],
        ["May", 17],
        ["June", 9]
      ];
      var data2x = [
        ["January", 1],
        ["February", 5],
        ["March", 6],
        ["April", 3],
        ["May", 37],
        ["June", 39]
      ];

      $.plot($("#flot-placeholderX"),
        [{
            data: data1x,
            color: "blue",
            label: "Kontrak",
            bars: {
              show: true,
              barWidth: 0.2,
              align: "right",
            }
          },
          {
            data: data2x,
            color: "red",
            label: "Expired",
            bars: {
              show: true,
              barWidth: 0.2,
              align: "left",
            }
          }
        ], {
          xaxis: {
            mode: "categories",
            tickLength: 0
          },
          grid: {
            clickable: true,
            hoverable: true
          },
          tooltip: true,
          tooltipOpts: {
            content: function(label, xval, yval, flotItem) {
              return "" + xval + " : " + yval;
            },
          }
        },
      );

    })
  </script>
</body>

</html>