<?php

class Insert{

  private $_db;

  public function __construct(){
    $this->_db = Database::getInstance();
  }

  public function tambah($table, $fields = array())
  {
    if($this->_db->insert_foradmin($table, $fields) )
      return true;
    else
      return false;
  }

}



?>
