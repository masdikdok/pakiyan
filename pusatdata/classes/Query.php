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


  public function pindah_gambar($name, $size, $tmp_name)
  {
    $allowed_ext = array('jpg','png','jpeg','gif','bmp','jfif');
    $gambar_ext = strtolower(end(explode('.',$name)));

    if(in_array($gambar_ext, $allowed_ext) === true)
    {
        if(($size < 10044070) && (is_uploaded_file($tmp_name))){

          $lokasi ='images/gambar/'.$name;
          move_uploaded_file($tmp_name, $lokasi);
        }else {
          ?><script language="JavaScript">alert('Gagal! File terlalu besar');
     	    </script><?php
        }
    }else {
      ?><script language="JavaScript">alert('Extensi file bukan gambar !');</script><?php
    }
  }

  public function pindah_logo($name, $size, $tmp_name)
  {
    $allowed_ext = array('jpg','png','jpeg','gif','bmp','jfif','JPG');
    $gambar_ext = strtolower(end(explode('.',$name)));

    if(in_array($gambar_ext, $allowed_ext) === true)
    {
        if(($size < 10044070) && (is_uploaded_file($tmp_name))){

          $lokasi ='../images/Logo/'.$name;
          move_uploaded_file($tmp_name, $lokasi);
        }else {
          ?><script language="JavaScript">alert('Gagal! File terlalu besar');
          </script><?php
        }
    }else {
      ?><script language="JavaScript">alert('Extensi file bukan gambar !');</script><?php
    }
  }

  public function pindah_profile($name, $size, $tmp_name)
  {
    $allowed_ext = array('jpg','png','jpeg','gif','bmp','jfif');
    $gambar_ext = strtolower(end(explode('.',$name)));

    if(in_array($gambar_ext, $allowed_ext) === true)
    {
        if(($size < 10044070) && (is_uploaded_file($tmp_name))){

          $lokasi ='../images/profile/'.$name;
          move_uploaded_file($tmp_name, $lokasi);
        }else {
          ?><script language="JavaScript">alert('Gagal! File terlalu besar');
          </script><?php
        }
    }else {
      ?><script language="JavaScript">alert('Extensi file bukan gambar !');</script><?php
    }
  }

  public static function convert_tanggal($tanggal){
    $tgl = explode("-", $tanggal);
    $tahun = $tgl[0];
    $bulan = $tgl[1];
    $tanggal = $tgl[2];

    switch($bulan){
      case 1: $bulan = "Januari"; break;
      case 2: $bulan = "Februari"; break;
      case 3: $bulan = "Maret"; break;
      case 4: $bulan = "April"; break;
      case 5: $bulan = "Mei"; break;
      case 6: $bulan = "Juni"; break;
      case 7: $bulan = "Juli"; break;
      case 8: $bulan = "Agustus"; break;
      case 9: $bulan = "September"; break;
      case 10: $bulan = "Oktober"; break;
      case 11: $bulan = "November"; break;
      case 12: $bulan = "Desember"; break;
    }

    return $tanggal." ".$bulan. " ".$tahun;
  }




}



?>
