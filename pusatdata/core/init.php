<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//load kelas
spl_autoload_register(function($class){
  require_once 'pusatdata/classes/'.$class.'.php';
});

$IrController = new Ir();
$files = new Files();
$allquery = new Query();
$mysqli = new mysqli('localhost', 'root','', 'plagiasi');



// Load include
include "bukahalaman.php";
include "Algoritma_Nazief.php";

?>
