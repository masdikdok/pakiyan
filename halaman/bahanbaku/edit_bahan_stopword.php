<?php

if(Input::get('simpan') == 'Simpan Perubahan'){

  $id = Input::get('id');
  $field = array(
    'bahan' => Input::get('bahan'),
    'keterangan' => Input::get('keterangan')
  );

  $result = $allquery->update('tb_stopword', 'id = '.$id, $field);
  if($result){
    echo "
      <script type='text/javascript'>
        alert('Merubah data bahan stopword BERHASIL!');
        document.location = '?page=bahanbaku&subpage=bahan_stopword';
      </script>
    ";
  }else {
    echo "
      <script type='text/javascript'>
        alert('GAGAL merubah data bahan stopword!');
        document.location = '?page=bahanbaku&subpage=bahan_stopword';
      </script>
    ";
  }

}elseif (Input::get('cancel')) {
  echo "
    <script type='text/javascript'>
      document.location = '?page=bahanbaku&subpage=bahan_stopword';
    </script>
  ";
}


$id = Input::get('id');
$query = "SELECT * FROM tb_stopword WHERE id = $id";
$result = $mysqli->query($query);
if(!(isset($result))){
  echo "<script type='text/javascript'>document.location.href='?page=bahanbaku&subpage=bahan_stopword'</script>";
}else{
  while ($data = $result->fetch_assoc()) {
    $bahan = $data['bahan'];
    $keterangan = $data['keterangan'];
  }

?>

<div class="panel panel-default">
  <div class="panel-heading">
    <b>Formulir Edit Bahan Baku Stopword</b>
  </div>
  <div class="panel-body">


    <form action="" method="post" autocomplete="off">
      <div class="form-group">
        <label for="bahan" class="form-label">Bahan Stopword : </label>
        <input type="text" class="form-control form-control-line" name="bahan" placeholder="Input Bahan Stopword" id="bahan" required="required" autofocus value="<?= $bahan; ?>">
      </div>
      <div class="form-group">
        <label for="keterangan" class="form-label">Keterangan : </label>
        <input type="text" class="form-control form-control-line" name="keterangan" placeholder="Input Keterangan Stopword" id="keterangan" required="required" value="<?= $keterangan; ?>">
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
