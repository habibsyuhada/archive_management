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
                    <h5 class="card-title">Data PT</h5>
                  </div>
                  <div class="card-body">
                    <form action="<?= $df['host']; ?>admin/PT/" id="kirimPT">
                      <select class="select2 custom-select form-control" name="pt" id="pt" style="width:100%;" onchange="$('#kirimPT').submit();">
                        <option></option>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM pt");
                        for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) { ?>
                          <option value="<?= $Data['kdpt']; ?>" <?php if ($Data['kdpt'] == $_GET['pt']) {
                                                                    echo "selected";
                                                                  } ?>><?= $Data['nmpt']; ?></option>
                        <?php } ?>
                      </select>
                      <?php if (isset($_GET['tgl_exp'])) {
                        echo "<input name='tgl_exp' type='hidden' value='$_GET[tgl_exp]'>";
                      } ?>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <form method="get" action="" class="card-header row">
                    <div class="col-sm-6">
                      <?php if (isset($_GET['pt'])) {
                        echo "<input name='pt' type='hidden' value='$_GET[pt]'>";
                      } ?>
                      <div class="input-group">
                        <input type="text" name="tgl_exp" id="tgl_exp" class="form-control mydatepicker" placeholder="Bulan Tahun" autocomplete="off" required value="<?= $isi_tgl_exp; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <h3 class="card-title text-right">
                        <button type="submit" class="btn btn-primary btn-block"><b>Cari</b></button>
                      </h3>
                    </div>
                  </form>
                  <div class="card-body text-center">
                    <h5 class="card-title">Status Kontrak Bulan <?= $statusbt; ?></h5>
                    <div id="placeholder" style="min-width: 300px;height:300px;"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header text-center">
                    <h5 class="card-title">Data Transaksi Tahun <?= $nyear; ?></h5>
                  </div>
                  <div class="card-body">
                    <div id="flot-placeholderX" style="min-width: 300px;height:300px;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header text-center">
                    <h5 class="card-title">Data Kontrak</h5>
                  </div>
                  <div class="card-body">
                    <div class="card-title">
                      <div class="row">
                        <div class="col-sm-4">
                          <select name="pilihan" id="pilihan" class="form-control custom-select">
                            <option value="0">No Kontrak</option>
                            <option value="1">Tanggal</option>
                            <option value="2">Tanggal Acc</option>
                            <option value="3">Kerja Sama</option>
                          </select>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="isinya" class="form-control" id="isinya" placeholder="Cari">
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No Kontrak</th>
                            <th>Tgl</th>
                            <th>Tanggal Acc</th>
                            <th>Kerja Sama</th>
                            <th>File</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]'");
                          for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) {
                            ?>
                            <tr>
                              <td><?= $Data['nmkntrk']; ?></td>
                              <td><?= tanggal_indo($Data['tglex']); ?></td>
                              <td><?php if ($Data['tglacc'] == null || $Data['tglacc'] == '0000-00-00') {
                                      echo "belum di Acc";
                                    } else {
                                      echo tanggal_indo($Data['tglacc']);
                                    } ?></td>
                              <td><?= $Data['ket']; ?></td>
                              <td>
                                <a href="<?= $df['host'] . 'uploads/files/' . $Data['draftkntrk']; ?>" class="btn btn-sm btn-info" target="_blank">Draft</a>
                                <?php
                                  if ($Data['fkntrk'] != '' || $Data['fkntrk'] != NULL) { ?>
                                  <a href="<?= $df['host'] . 'uploads/files/' . $Data['fkntrk']; ?>" class="btn btn-sm btn-success" target="_blank">File</a>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header text-center">
                    <h5 class="card-title">Data Expired Bulan <?= $statusbt; ?></h5>
                  </div>
                  <div class="card-body">
                    <div class="card-title">
                      <div class="row">
                        <div class="col-sm-4">
                          <select name="pilihan1" id="pilihan1" class="form-control custom-select">
                            <option value="0">No Kontrak</option>
                            <option value="1">Tanggal</option>
                            <option value="2">Tanggal Acc</option>
                            <option value="3">Kerja Sama</option>
                          </select>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="isinya1" class="form-control" id="isinya1" placeholder="Cari">
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table id="zero_config1" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No Kontrak</th>
                            <th>Tgl</th>
                            <th>Tanggal Acc</th>
                            <th>Kerja Sama</th>
                            <th>File</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND  (MONTH(tglex)='$nmonth' AND YEAR(tglex)='$nyear')");
                          for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) {
                            ?>
                            <tr>
                              <td><?= $Data['nmkntrk']; ?></td>
                              <td><?= tanggal_indo($Data['tglex']); ?></td>
                              <td><?php if ($Data['tglacc'] == null || $Data['tglacc'] == '0000-00-00') {
                                      echo "belum di Acc";
                                    } else {
                                      echo tanggal_indo($Data['tglacc']);
                                    } ?></td>
                              <td><?= $Data['ket']; ?></td>
                              <td>
                                <a href="<?= $df['host'] . 'uploads/files/' . $Data['draftkntrk']; ?>" class="btn btn-sm btn-info" target="_blank">Draft</a>
                                <?php
                                  if ($Data['fkntrk'] != '' || $Data['fkntrk'] != NULL) { ?>
                                  <a href="<?= $df['host'] . 'uploads/files/' . $Data['fkntrk']; ?>" class="btn btn-sm btn-success" target="_blank">File</a>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
      var table = $('#zero_config').DataTable({
        'paging': true,
        'lengthChange': false,
        "pageLength": 10,
        'info': false,
        'searching': true,
        'ordering': true,
        "language": {
          "paginate": {
            "previous": "<",
            "next": ">"
          }
        }
      })
      $('#zero_config_filter').hide()
      var table1 = $('#zero_config1').DataTable({
        'paging': true,
        'lengthChange': false,
        "pageLength": 10,
        'info': false,
        'searching': true,
        'ordering': true,
        "language": {
          "paginate": {
            "previous": "<",
            "next": ">"
          }
        }
      })
      $('#zero_config1_filter').hide()

      $(".select2").select2({
        placeholder: "Cari PT",
        width: '100%',
      });


      $('#isinya').keyup(function() {
        table.columns($('#pilihan').val()).search(this.value).draw();
      })

      $('#isinya1').keyup(function() {
        table1.columns($('#pilihan1').val()).search(this.value).draw();
      })



      var currentDate = new Date();
      $('.mydatepicker').datepicker({
        autoclose: true,
        useCurrent: true,
        format: 'MM yyyy',
        viewMode: 'months',
        minViewMode: 'months',
        endDate: Infinity,
        orientation: 'bottom'
      }).val('<?= date('F Y', strtotime($nyear . '-' . $nmonth . '-01')); ?>');


      var data = [{
          label: "Kontrak",
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='$nmonth' AND YEAR(tglm)='$nyear'"));
          ?>
          data: <?= $cekdata; ?>,
          color: "blue"
        },
        {
          label: "Expired",
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='$nmonth' AND YEAR(tglex)='$nyear'"));
          ?>
          data: <?= $cekdata; ?>,
          color: "red"
        }
      ];
      var baropt = {
        series: {
          pie: {
            show: true,
            radius: 1,
            innerRadius: 0.5,
            label: {
              show: true,
              radius: 3 / 4,
              background: {
                opacity: 0.5,
                color: '#ffffff'
              },
            },
            combine: {
              color: '#999',
              threshold: 0.1
            }
          }
        },
        grid: {
          hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
          content: "%s : %y.0"
        }
      }
      $.plot('#placeholder', data, baropt);



      var xdata1xx = [
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='1' AND YEAR(tglm)='$nyear'"));
          ?> "Jan", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='2' AND YEAR(tglm)='$nyear'"));
          ?> "Feb", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='3' AND YEAR(tglm)='$nyear'"));
          ?> "Mar", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='4' AND YEAR(tglm)='$nyear'"));
          ?> "Apr", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='5' AND YEAR(tglm)='$nyear'"));
          ?> "Mei", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='6' AND YEAR(tglm)='$nyear'"));
          ?> "Jun", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='7' AND YEAR(tglm)='$nyear'"));
          ?> "Jul", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='8' AND YEAR(tglm)='$nyear'"));
          ?> "Aug", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='9' AND YEAR(tglm)='$nyear'"));
          ?> "Sep", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='10' AND YEAR(tglm)='$nyear'"));
          ?> "Oct", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='11' AND YEAR(tglm)='$nyear'"));
          ?> "Nov", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglm)='12' AND YEAR(tglm)='$nyear'"));
          ?> "Dec", <?= $cekdata; ?>
        ],
      ];
      var xdata2xx = [
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='1' AND YEAR(tglex)='$nyear'"));
          ?> "Jan", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='2' AND YEAR(tglex)='$nyear'"));
          ?> "Feb", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='3' AND YEAR(tglex)='$nyear'"));
          ?> "Mar", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='4' AND YEAR(tglex)='$nyear'"));
          ?> "Apr", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='5' AND YEAR(tglex)='$nyear'"));
          ?> "Mei", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='6' AND YEAR(tglex)='$nyear'"));
          ?> "Jun", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='7' AND YEAR(tglex)='$nyear'"));
          ?> "Jul", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='8' AND YEAR(tglex)='$nyear'"));
          ?> "Aug", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='9' AND YEAR(tglex)='$nyear'"));
          ?> "Sep", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='10' AND YEAR(tglex)='$nyear'"));
          ?> "Oct", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='11' AND YEAR(tglex)='$nyear'"));
          ?> "Nov", <?= $cekdata; ?>
        ],
        [
          <?php
          $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kontrak where kdpt='$_GET[pt]' AND MONTH(tglex)='12' AND YEAR(tglex)='$nyear'"));
          ?> "Dec", <?= $cekdata; ?>
        ],
      ];

      $.plot($("#flot-placeholderX"),
        [{
            data: xdata1xx,
            color: "blue",
            label: "Kontrak",
            bars: {
              show: true,
              barWidth: 0.4,
              align: "right",
            }
          },
          {
            data: xdata2xx,
            color: "red",
            label: "Expired",
            bars: {
              show: true,
              barWidth: 0.4,
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


      $("#flot-placeholderX").bind("plotclick", function(event, pos, item) {
        if (item) {
          var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
          window.location.replace("<?= $df['host']; ?>admin/PT/?pt=<?= $_GET['pt'] ?>&tgl_exp=" + monthNames[item.datapoint[0]] + "+<?= $nyear; ?>");
        }
      });




    })
  </script>
</body>

</html>