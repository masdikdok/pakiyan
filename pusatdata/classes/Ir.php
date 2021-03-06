<?php

class Ir
{
  public function __construct(){
    $this->_db = Database::getInstance();
  }

  public function tokenisasi($dokumen){

    $query = "SELECT * FROM tb_tokenisasi";
    $result = $this->_db->mysqli->query($query);
    while ($data = $result->fetch_assoc()) {
      $dokumen = str_replace($data['bahan'],"",$dokumen);
    }

    return $dokumen;
  }

  public function stopword($dokumen){

    $query = "SELECT * FROM tb_stopword";
    $result = $this->_db->mysqli->query($query);
    while ($data = $result->fetch_assoc()) {
      $dokumen =  preg_replace("/\b(".$data['bahan'].")\b/","",$dokumen);
    }

    return $dokumen;

  }

  public function stemming($dokumen, $algoritma = 'Nazief'){
    $kalimat = explode(" ", $dokumen);
    foreach ($kalimat as $key => $value) {
      $kalimat[$key] = $algoritma($value);
    }
    $dokumen = implode(" ", $kalimat);
    return $dokumen;
  }


}


?>
