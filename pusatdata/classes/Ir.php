<?php

class Ir
{
  public function tokenisasi($dokumen){
    $kalimat = str_replace("!","","$dokumen");
    $kalimat = str_replace("?","","$kalimat");
    $kalimat = str_replace(".","","$kalimat");
    $kalimat = str_replace(",","","$kalimat");
    $kalimat = str_replace("=","","$kalimat");
    $kalimat = str_replace(";","","$kalimat");
    $kalimat = str_replace(":","","$kalimat");
    $kalimat = str_replace("'","","$kalimat");
    $kalimat = str_replace("  "," ","$kalimat");
    return $kalimat;
  }

  public function stopword($dokumen){
    $katapenghubung = array("di", "dan","dari","pada","ke","atau","jika","maka","juga", "dengan","sedang","lagi", "pula","juga");
    $dokumen =  preg_replace("/\b(".implode(")\b|\b(",$katapenghubung).")\b/","",$dokumen);
    return $dokumen;
  }

  public function stemming($dokumen){
    $kalimat = explode(" ", $dokumen);
    foreach ($kalimat as $key => $value) {
      $kalimat[$key] = Nazief($value);
    }
    $dokumen = implode(" ", $kalimat);
    return $dokumen;
  }

  
}


?>
