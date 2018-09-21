<?php

if(Input::get('simpan') == 'Simpan Perubahan'){

  $id = Input::get('id');
  $field = array(
    'katadasar' => Input::get('bahan'),
    'tipe_katadasar' => Input::get('keterangan')
  );

  $result = $allquery->update('tbberita', 'id = '.$id, $field);
  if($result){
    echo "
      <script type='text/javascript'>
        alert('Merubah data dokumen BERHASIL!');
        document.location = '?page=dokumen&subpage=dokumen_lihat';
      </script>
    ";
  }else {
    echo "
      <script type='text/javascript'>
        alert('Gagal merubah dokumen!');
        document.location = '?page=dokumen&subpage=dokumen_lihat';
      </script>
    ";
  }

}elseif (Input::get('cancel')) {
  echo "
    <script type='text/javascript'>
      document.location = '?page=dokumen&subpage=dokumen_lihat';
    </script>
  ";
}


$id = Input::get('id');
$query = "SELECT * FROM tbberita WHERE id_ktdasar = $id";
$result = $mysqli->query($query);
if(!(isset($result))){
  echo "<script type='text/javascript'>document.location.href='?page=dokumen&subpage=dokumen_lihat'</script>";
}else{
  while ($data = $result->fetch_assoc()) {
    $id = $data['id'];
    $id_berita = $data['id_berita'];
    $judul = $data['Judul'];
    $berita = $data['Berita'];
    $lokasi = $data['url'];
  }

?>

<div class="panel panel-default">
  <div class="panel-heading">
    <b>Formulir Edit Dpkumen</b>
  </div>
  <div class="panel-body">


    <form action="" method="post" autocomplete="off">
      <div class="form-group">
        <label for="judul" class="form-label">Judul Dokumen : </label>
        <input type="text" class="form-control form-control-line" name="judul" placeholder="Input judul dokumen" id="judul" required="required" autofocus value="<?= $judul; ?>">
      </div>
      <div class="form-group">
        <label for="dokumen" class="form-label">Isi Dokumen : </label>
        <input type="text" class="form-control form-control-line" name="dokumen" placeholder="Input Dokumen" id="dokumen" required="required" value="<?= $berita; ?>">
      </div>
      <div class="form-group text-right">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="submit" class="btn btn-danger" name="cancel" value="Batal">
        <input type="submit" class="btn btn-info" name="simpan" value="Simpan Perubahan">
      </div>
    </form>

  </div>
</div>



<?php
}
?>
