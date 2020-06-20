<?php
  if(isset($_GET['data'])){
    if($_GET['data'] == 'chartjumlahdokumen'){
      $date_last_week = date('Y-m-d', strtotime('-8 day'));
      for ($i=0; $i < 8; $i++) { 
        $date_tmp = date('Y-m-d', strtotime('-'.$i.' day'));
        $date[] 	= $date_tmp;
        // $d 				= new \DateTime($date_tmp);
        $d 				= new \DateTime($date_tmp);
        // $mst_tmp 	= $d->getTimestamp().substr($d->format('u'),0,3); // millisecond timestamp
        $mst_tmp 	=$d->getTimestamp().substr($d->format('u'),0,3); // millisecond timestamp
        $mts[] 		= $mst_tmp; // millisecond timestamp
      }

      foreach ($date as $key => $value) {
        $dokumen1[] = array($mts[$key]+3600000, rand(10,50));
        $dokumen2[] = array($mts[$key]+3600000, rand(10,50));
        $dokumen3[] = array($mts[$key]+3600000, rand(10,50));
      }

      $example[] = array(
        'name' => 'Nota Dinas',
        'data' => $dokumen1
      );

      $example[] = array(
        'name' => 'Surat Keluar',
        'data' => $dokumen2
      );

      $example[] = array(
        'name' => 'Momerandum',
        'data' => $dokumen3
      );

      $chart_all = $example;
      echo json_encode($chart_all);
    }
  }
?>