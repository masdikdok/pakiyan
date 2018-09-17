<?php

class Lainnya{



  private $_db;

  public function __construct(){
    $this->_db = Database::getInstance();
  }


  public static function pagination($table, $total, $perpage){
    $hal = $_GET["halaman"];

    if(!isset($hal)){
      $page = (int)$hal;
    } else {
      $page = 1;
    }
    $start = ($page > 4)? ($page * $perpage) - $perpage : 0;

    $artikel = "SELECT * FROM $table LIMIT $start, $perpage";

    return $artikel;
  }




}




?>
