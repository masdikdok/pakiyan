<?php

if(Input::get('id')){

  $id = Input::get('id');
  $result = $allquery->delete('tbberita', 'id = '.$id);
  if($result){
    echo "
      <script type='text/javascript'>
        alert('Menghapus data dokumen BERHASIL!');
        document.location = '?page=dokumen&subpage=dokumen_lihat';
      </script>
    ";
  }else {
    echo "
      <script type='text/javascript'>
        alert('GAGAL menghapus data dokumen!');
        document.location = '?page=dokumen&subpage=dokumen_lihat';
      </script>
    ";
  }

}

?>
