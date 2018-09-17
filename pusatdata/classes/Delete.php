<?php

class Delete{

  private $_db;

  public function __construct(){
    $this->_db = Database::getInstance();
  }

  // ada 2 kondisi pada fungsi delete. 1. nama tabel, 2. Syarat untuk menghapus
  public function delete($table, $id)
  {
    $query = "DELETE FROM $table where $id";
    //die(var_dump($query));
    if($dodo = $this->_db->run_query($query) ){
      ?><script language="javascript">alert("<?php echo $table.' dengan syarat '.$id; ?>, Telah sukses di delete ! " );</script><?php
    }else{
      ?><script language="javascript">alert("Delete gagal ! " );</script><?php
    }
  }



}



?>
