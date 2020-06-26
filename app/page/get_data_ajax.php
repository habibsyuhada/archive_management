<?php
  session_start();
  require_once('../config/config.php');

  function test_var($text){
    echo "<pre>";
    print_r($text);
    echo "</pre>";
  }

  if(isset($_GET['data'])){
    if($_GET['data'] == 'chartjumlahdokumen'){
      $date_last_week = date('Y-m-d', strtotime('-8 day'));
      for ($i=0; $i < 8; $i++) { 
        $date_tmp = date('Y-m-d', strtotime('-'.$i.' day'));
        $date[] 	= $date_tmp;
        $d 				= new \DateTime($date_tmp);
        $mst_tmp 	=$d->getTimestamp().substr($d->format('u'),0,3); // millisecond timestamp
        $mts[] 		= $mst_tmp; // millisecond timestamp
      }

      $query = mysqli_query($conn, "SELECT COUNT(no_arsip) as num, kode_dokumen, date(tanggal_input) as tanggal_input 
        FROM tbl_dokumen 
        WHERE date(tanggal_input) > '$date_last_week'
        GROUP BY kode_dokumen, date(tanggal_input)");
      $data_chart = array();
      while($data = mysqli_fetch_array($query)){
        $data_chart[$data['kode_dokumen']][$data['tanggal_input']] = $data['num'];
      }

      $query = mysqli_query($conn, "SELECT * FROM tbl_jenis_dokumen");
      while($jenis = mysqli_fetch_array($query)){
        $dokumen = array();
        foreach ($date as $key => $value) {
          if(isset($data_chart[$jenis['kode_dokumen']][$value])){
            $dokumen[] = array($mts[$key]+3600000, $data_chart[$jenis['kode_dokumen']][$value]+0);
          }
          else{
            $dokumen[] = array($mts[$key]+3600000, 0);
          }
        }
        $example[] = array(
          'name' => $jenis['nama_dokumen'],
          'data' => $dokumen
        );
      }

      $chart_all = $example;
      echo json_encode($chart_all);
    }
  }
?>