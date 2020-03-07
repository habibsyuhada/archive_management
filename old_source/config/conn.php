<?php
//this is admin base structured - CRUD
$db = array(
  'user'   => 'root',
  'pass'   => '',
  'db'   => 'indah',
  'host'   => 'localhost'
);

$df = array(
  'host'   => 'http://localhost/archive_management/old_source/'
);

// Create connection
$conn = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['db']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}
function judul_seo($string)
{
  $c = array(' ');
  $d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');
  $string = str_replace($d, '', $string); // Hilangkan karakter yang telah disebutkan di array $d
  $string = strtolower(str_replace($c, '-', $string)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
  return $string;
}

function tanggal_indo($tanggal, $bulan_saja = false) //$cetak_hari = false)
{
  $hari = array(
    1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );

  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );

  if ($bulan_saja) {
    return $bulan[$tanggal];
  } else {

    $split    = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
  }

  // if ($cetak_hari) {
  //  $num = date('N', strtotime($tanggal));
  //  return $hari[$num] . ', ' . $tgl_indo;
  // }

  return $tgl_indo;
}


function kdslide($n = 1)
{
  $id = 'SLIDE' . sprintf("%02s", $n);
  $cekdata = "SELECT * FROM slide WHERE kdslide='$id'";
  global $conn;
  $ada = mysqli_query($conn, $cekdata);
  if (mysqli_num_rows($ada) == 0) {
    return $id;
  } else {
    return kdslide($n + 1);
  }
}

function cleartextf($isi)
{
  $replace = str_replace("<p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>", "", $isi);
  return $replace;
}
