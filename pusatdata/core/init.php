<?php

session_start();
error_reporting(E_ALL);

//load kelas
spl_autoload_register(function($class){
  require_once 'pusatdata/classes/'.$class.'.php';
});

$IrController = new Ir();
$files = new Files();
$allquery = new Query();
$mysqli = new mysqli('localhost', 'root','dicki', 'plagiasi');


// Function biasa
function potongKalimat($string, $maks = 20){
	$isi = '';
	$string = explode(' ', $string);
	for ($i=0; $i < $maks; $i++) {
		$isi = $isi.' '.$string[$i];
	}
	return $isi.'... ';
}


function convert_tanggal($tanggal){
    $tgl = explode("-", $tanggal);
    $tahun = $tgl[0];
    $bulan = $tgl[1];
    $tanggal = $tgl[2];

    switch($bulan){
      case 1: $bulan = "Januari"; break;
      case 2: $bulan = "Februari"; break;
      case 3: $bulan = "Maret"; break;
      case 4: $bulan = "April"; break;
      case 5: $bulan = "Mei"; break;
      case 6: $bulan = "Juni"; break;
      case 7: $bulan = "Juli"; break;
      case 8: $bulan = "Agustus"; break;
      case 9: $bulan = "September"; break;
      case 10: $bulan = "Oktober"; break;
      case 11: $bulan = "November"; break;
      case 12: $bulan = "Desember"; break;
    }

	return $tanggal." ".$bulan. " ".$tahun;
}


include "bukahalaman.php";

?>
