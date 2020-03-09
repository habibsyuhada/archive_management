<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card bg-primary text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Dokumen Baru</h1>
					<h2 class="text-center">1</h2>
					<h2 class="text-center">Hari ini</h2>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-warning text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Dokumen Baru</h1>
					<h2 class="text-center">1</h2>
					<h2 class="text-center">Bulan ini</h2>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-success text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Dokumen Baru</h1>
					<h2 class="text-center">1</h2>
					<h2 class="text-center">Tahun ini</h2>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-secondary text-white" style="border-radius: 1rem;">
				<div class="card-body">
					<h1 class="text-center">Dokumen Baru</h1>
					<h2 class="text-center">1</h2>
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
      url: '<?php echo base_url() ?>home/get_data_weekly',
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