<?php

if(Input::get('id')){

  $id = Input::get('id');
  $result = $allquery->delete('tb_tokenisasi', 'id = '.$id);
  if($result){
    echo "
      <script type='text/javascript'>
        alert('Menghapus data bahan tokenisasi BERHASIL!');
        document.location = '?page=bahanbaku&subpage=bahan_tokenisasi';
      </script>
    ";
  }else {
    echo "
      <script type='text/javascript'>
        alert('GAGAL menghapus data bahan tokenisasi!');
        document.location = '?page=bahanbaku&subpage=bahan_tokenisasi';
      </script>
    ";
  }

}

?>
