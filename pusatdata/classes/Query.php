<?php
error_reporting(E_ALL);

class Query{

  private $_db;
  private $allowed_ext, $gambar_ext, $lokasi;

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

  public function update($table, $id , $fields = array())
  {
    if($dodo = $this->_db->update($table, $id, $fields) )
      return true;
    else
      return false;
  }

  public function delete($table, $id)
  {
    $query = "DELETE FROM $table where id=$id";
    if($dodo = $this->_db->run_query($query) ){
      ?><script language="javascript">alert("<?php echo $table.' dengan ID = '.$id; ?>, Telah sukses di delete ! " );</script><?php
    }else{
      ?><script language="javascript">alert("Delete gagal ! " );</script><?php
    }
  }



}



?>
