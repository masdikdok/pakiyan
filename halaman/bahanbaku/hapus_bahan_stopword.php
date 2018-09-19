<?php

if(Input::get('id')){

  $id = Input::get('id');
  $result = $allquery->delete('tb_stopword', 'id = '.$id);
  if($result){
    echo "
      <script type='text/javascript'>
        alert('Menghapus data bahan stopword BERHASIL!');
        document.location = '?page=bahanbaku&subpage=bahan_stopword';
      </script>
    ";
  }else {
    echo "
      <script type='text/javascript'>
        alert('GAGAL menghapus data bahan stopword!');
        document.location = '?page=bahanbaku&subpage=bahan_stopword';
      </script>
    ";
  }

}

?>
