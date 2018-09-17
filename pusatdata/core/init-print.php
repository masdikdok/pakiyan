<?php

session_start();

//load kelas
spl_autoload_register(function($class){
  require_once '../../pusatdata/classes/'.$class.'.php';
});


$files = new Files();
$insert = new Insert();
$delete = new Delete();
$update = new Update();
$allquery = new Query();
$mysqli = new mysqli('localhost', 'root','', 'simpel');


?>
