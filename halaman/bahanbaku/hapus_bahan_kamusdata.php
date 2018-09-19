<?php

if(Input::get('id')){

  $id = Input::get('id');
  $result = $allquery->delete('tb_katadasar', 'id_ktdasar = '.$id);
  if($result){
    echo "
      <script type='text/javascript'>
        alert('Menghapus kamus data BERHASIL!');
        document.location = '?page=bahanbaku&subpage=bahan_kamusdata';
      </script>
    ";
  }else {
    echo "
      <script type='text/javascript'>
        alert('GAGAL menghapus kamus data!');
        document.location = '?page=bahanbaku&subpage=bahan_kamusdata';
      </script>
    ";
  }

}

?>
