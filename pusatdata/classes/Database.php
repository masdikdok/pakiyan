<?php

class Database{
  private static $INSTANCE = null;
  private $msyqli,
          $HOST = 'localhost',
          $USER = 'root',
          $PASS = 'dicki',
          $DBNAME = 'plagiasi';


  public function __construct()
  {
    $this->mysqli = new mysqli($this->HOST, $this->USER,$this->PASS, $this->DBNAME);
    if(mysqli_connect_error()){
      die('Gagal Koneksinya');
    }
  }

  /*
  singleton pattern,
   menguji koneksi agar tidak double
*/

  public static function getInstance()
  {
    if(!isset(self::$INSTANCE)){
      self::$INSTANCE = new Database();
    }

    return self::$INSTANCE;
  }


  public function insert_foradmin($table, $field=array()){

    $colum = implode(",", array_keys($field));
    $i = 0;
    $valuesArrays = array();
    foreach($field as $key => $value){
      if(is_int($value)){
          $valuesArrays[$i] = $this->escape($value);
      }else{
          $valuesArrays[$i] = "'".$this->escape($value)."'";
      }
      $i++;
    }
    $values = implode(",",$valuesArrays);
    $query = "INSERT INTO $table ($colum) values ($values)";
    // die(var_dump($query));

    return $this->run_query($query);
  }

// Keterangan update : ada 3 parameter; 1. Nama table, 2. Kondisi atau syarat, 3. isi menggunakan array
  public function update($table, $id, $field=array()){

    $i = 0;
    $valuesArrays = array();
    foreach ($field as $key => $value) {
      if(is_int($value)){
          $valuesArrays[$i] = "$key = ". $this->escape($value);
      }else{
          $valuesArrays[$i] = "$key = '". $this->escape($value)."'";
      }
      $i++;
    }

    $values = implode(",",$valuesArrays);
    $query = "Update $table set $values where $id";
    //die(var_dump($query));

    return $this->run_query($query);
  }




  public function run_query($query){
    if($this->mysqli->query($query)) return true;
    else return false;
  }

  public function escape($nama){
    return $this->mysqli->real_escape_string($nama);
  }




}
?>
