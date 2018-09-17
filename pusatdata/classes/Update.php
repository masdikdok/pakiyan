<?php
error_reporting(E_ALL);

class Update{

  private $_db;

  public function __construct(){
    $this->_db = Database::getInstance();
  }

  public function update($table, $id , $fields = array())
  {
    if($dodo = $this->_db->update($table, $id, $fields) )
      return true;
    else
      return false;
  }
  //
  // public function update_internal($fields = array())
  // {
  //   if($dodo = $this->_db->insert('departemen', $fields, 'tanggal') )
  //     var_dump($dodo);
  //   else
  //     return false;
  // }
  //


}



?>
