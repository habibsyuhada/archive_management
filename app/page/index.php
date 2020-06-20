<?php
  session_start();
  require_once('../config/config.php');
  // header("Refresh: 300;");
  $metaTitle = 'Home';
  $metaDesc = '';
  // $query1 = mysqli_query($conn, "SELECT 'data', SUM(IF(status = 'Pending', 1, 0)) as Pending, SUM(IF(status = 'Booking', 1, 0)) as Booking, SUM(IF(status = 'Received', 1, 0)) as Received, SUM(1) as Total FROM `v_order_list`");
  // $data1 = mysqli_fetch_array($query1);

  // $query2 = mysqli_query($conn, "SELECT * FROM `v_order_list` WHERE status = 'Booking' ORDER BY date_booking ASC LIMIT 10");
  // $query3 = mysqli_query($conn, "SELECT DATE(date) as date, SUM(IF(status = 'Pending', 1, 0)) as Pending, SUM(IF(status = 'Booking', 1, 0)) as Booking, SUM(IF(status = 'Received', 1, 0)) as Received FROM (SELECT (CASE WHEN status = 'Pending' THEN date_pending WHEN status = 'Booking' THEN date_booking ELSE date_receive END) as date, status FROM `v_order_list`) as tmp_table GROUP BY DATE(date) ORDER BY date DESC LIMIT 7");
  // print_r($query2);

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
					<h2 class="text-center"><?php echo rand(1, 10) ?></h2>
					<h2 class="text-center">Hari ini</h2>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-warning text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Jumlah Dokumen</h1>
					<h2 class="text-center"><?php echo rand(10, 50) ?></h2>
					<h2 class="text-center">Bulan ini</h2>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-success text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Jumlah Dokumen</h1>
					<h2 class="text-center"><?php echo rand(50, 100) ?></h2>
					<h2 class="text-center">Tahun ini</h2>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-secondary text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Jumlah Dokumen</h1>
					<h2 class="text-center"><?php echo rand(100, 500) ?></h2>
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
					<h3>Monthly Report</h3>
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
							<tr>
								<td class="valign-middle">1</td>
								<td class="valign-middle">Nota Dinas</td>
								<td class="valign-middle">120</td>
							</tr>
							<tr>
								<td class="valign-middle">2</td>
								<td class="valign-middle">Surat Keluar</td>
								<td class="valign-middle">86</td>
							</tr>
							<tr>
								<td class="valign-middle">3</td>
								<td class="valign-middle">Momerandum</td>
								<td class="valign-middle">26</td>
							</tr>
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
         text: 'Daily Report'
      }, 
      yAxis: {
        title: {
          text: 'Documents'
        },
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