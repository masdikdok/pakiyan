<?php
class Files{


  private $allowed_ext, $gambar_ext, $lokasi;

  public function delete($folder, $name){
    unlink("../images/$folder/$name");
  }

  public function pindah($folder, $name, $size, $tmp_name)
  {
    $allowed_ext = array('jpg','png','jpeg','gif','bmp','jfif');
    $pecah = explode('.',$name);
    $gambar_ext = strtolower(end($pecah));

    if(in_array($gambar_ext, $allowed_ext) === true)
    {
        if(($size < 10044070) && (is_uploaded_file($tmp_name))){

          $lokasi ="../images/$folder/".$name;
          move_uploaded_file($tmp_name, $lokasi);
        }else {
          ?><script language="JavaScript">alert('Gagal! File terlalu besar');
     	    </script><?php
        }
    }else {
      ?><script language="JavaScript">alert('Extensi file bukan gambar !');</script><?php
    }
  }


  // public function pindah_logo($name, $size, $tmp_name)
  // {
  //   $allowed_ext = array('jpg','png','jpeg','gif','bmp','jfif','JPG');
  //   $gambar_ext = strtolower(end(explode('.',$name)));
  //
  //   if(in_array($gambar_ext, $allowed_ext) === true)
  //   {
  //       if(($size < 10044070) && (is_uploaded_file($tmp_name))){
  //
  //         $lokasi ='../images/Logo/'.$name;
  //         unlink($name, $lokasi);
  //         move_uploaded_file($tmp_name, $lokasi);
  //       }else {
  //         echo "<script language=\"JavaScript\">alert('Gagal! File terlalu besar');
  //         </script>";
  //       }
  //   }else {
  //     echo "<script languge=\"JavaScript\">alert('Extensi file bukan gambar !');</script>";
  //   }
  // }
  //
  // // public function pindah_profile($name, $size, $tmp_name)
  // {
  //   $allowed_ext = array('jpg','png','jpeg','gif','bmp','jfif');
  //   $gambar_ext = strtolower(end(explode('.',$name)));
  //
  //   if(in_array($gambar_ext, $allowed_ext) === true)
  //   {
  //       if(($size < 10044070) && (is_uploaded_file($tmp_name))){
  //
  //
  //         $lokasi ='images/profile/'.$name;
  //
  //         move_uploaded_file($tmp_name, $lokasi);
  //       }else {
  //         echo "<script language=\"JavaScript\">alert('Gagal! File terlalu besar'); </script>";
  //       }
  //   }else {
  //       echo "<script language=\"JavaScript\">alert('Extensi file bukan gambar !');</script>";
  //   }
  // }






}

?>
