<?php
  session_start();
  require_once('../config/config.php');
  // header("Refresh: 300;");
	$metaTitle = 'Beranda';
	$date_now = date('Y-m-d');
	$month_now = date('n');
	$year_now = date('Y');
	$query_date = mysqli_query($conn, "SELECT COUNT(no_arsip) as num FROM tbl_dokumen WHERE DATE(tanggal_input) = '$date_now'");
	$query_date = mysqli_fetch_array($query_date);
	$query_month = mysqli_query($conn, "SELECT COUNT(no_arsip) as num FROM tbl_dokumen WHERE MONTH(tanggal_input) = '$month_now' AND YEAR(tanggal_input) = '$year_now'");
	$query_month = mysqli_fetch_array($query_month);
	$query_year = mysqli_query($conn, "SELECT COUNT(no_arsip) as num FROM tbl_dokumen WHERE YEAR(tanggal_input) = '$year_now'");
	$query_year = mysqli_fetch_array($query_year);
	$query_all = mysqli_query($conn, "SELECT COUNT(no_arsip) as num FROM tbl_dokumen");
	$query_all = mysqli_fetch_array($query_all);
	$query_mreport = mysqli_query($conn, "SELECT COUNT(no_arsip) as num, dok.kode_dokumen, jen.nama_dokumen FROM tbl_dokumen dok JOIN tbl_jenis_dokumen jen ON dok.kode_dokumen = jen.kode_dokumen WHERE MONTH(dok.tanggal_input) = '$month_now' AND YEAR(dok.tanggal_input) = '$year_now'");
?>
<?php include('../header.php'); ?>
<?php include('../topbar.php'); ?>
<?php include('../sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card bg-primary text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Jumlah Dokumen</h1>
					<h2 class="text-center"><?php echo $query_date['num'] ?></h2>
					<h2 class="text-center">Hari ini</h2>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-warning text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Jumlah Dokumen</h1>
					<h2 class="text-center"><?php echo $query_month['num'] ?></h2>
					<h2 class="text-center">Bulan ini</h2>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-success text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Jumlah Dokumen</h1>
					<h2 class="text-center"><?php echo $query_year['num'] ?></h2>
					<h2 class="text-center">Tahun ini</h2>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-secondary text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Jumlah Dokumen</h1>
					<h2 class="text-center"><?php echo $query_all['num'] ?></h2>
					<h2 class="text-center">Semua Data</h2>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h3>Data Bulanan</h3>
				</div>
				<div class="card-body">
					<table class="table table-bordered text-center datatables">
						<thead class="bg-primary-template text-white text-bold">
							<tr>
								<th class="valign-middle"><b>No.</b></th>
								<th class="valign-middle"><b>Jenis Dokumen</b></th>
								<th class="valign-middle"><b>Jumlah</b></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; while($data = mysqli_fetch_array($query_mreport)): ?>
							<tr>
								<td class="valign-middle"><?php echo $no++; ?></td>
								<td class="valign-middle"><?php echo $data['kode_dokumen'].' - '.$data['nama_dokumen']; ?></td>
								<td class="valign-middle"><?php echo $data['num']; ?></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<div id="container_charts" style="height: 370px; width: 100%;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		load_data_chart();
  });
	var last_json;
	var load_data_chart=function(){
    $.ajax({
      url: 'get_data_ajax.php?data=chartjumlahdokumen',
      type: 'GET',
      async: true,
      dataType: "json",
      success: function (data) {
        if(JSON.stringify(last_json) != JSON.stringify(data)){
          draw_highchart(data);
          last_json = data;
        }
        setTimeout(load_data_chart, 10000);
      }
    });    
  };

	function draw_highchart(data) {
    Highcharts.chart('container_charts', {
      title: {
        text: 'Jumlah Dokumen'
      }, 
      subtitle: {
         text: 'Data Harian'
      }, 
      yAxis: {
        title: {
          text: 'Documents'
        },
        allowDecimals: false,
        min: 0
      },
      xAxis: {
        type: 'datetime',
        dateTimeLabelFormats: { // don't display the dummy year
          hour: ' ',
          month: '%e %b',
          year: '%b'
        },
        title: {
          text: 'Date'
        }
      },
      legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
      },
   
      plotOptions: {
        series: {
          marker: {
            enabled: true
          }
        }
      },
   
      series: data,
   
      responsive: {
        rules: [{
          condition: {
            maxWidth: 500
          },
          chartOptions: {
            plotOptions: {
              series: {
                marker: {
                  radius: 2.5
                }
              }
            }
          }
        }]
      }
   
    });
  }
</script>

<?php include('../footer.php'); ?>