<?php

if(Input::get('simpan') == 'Simpan Perubahan'){

  $id = Input::get('id');
  $field = array(
    'bahan_token' => Input::get('bahan'),
    'keterangan_token' => Input::get('keterangan')
  );

  $result = $allquery->update('tb_tokenisasi', 'id = '.$id, $field);
  if($result){
    echo "
      <script type='text/javascript'>
        alert('Merubah data bahan tokenisasi BERHASIL!');
        document.location = '?page=bahanbaku&subpage=bahan_tokenisasi';
      </script>
    ";
  }else {
    echo "
      <script type='text/javascript'>
        alert('GAGAL merubah data bahan tokenisasi!');
        document.location = '?page=bahanbaku&subpage=bahan_tokenisasi';
      </script>
    ";
  }

}elseif (Input::get('cancel')) {
  echo "
    <script type='text/javascript'>
      document.location = '?page=bahanbaku&subpage=bahan_tokenisasi';
    </script>
  ";
}


$id = Input::get('id');
$query = "SELECT * FROM tb_tokenisasi WHERE id = $id";
$result = $mysqli->query($query);
if(!(isset($result))){
  echo "<script type='text/javascript'>document.location.href='?page=bahanbaku&subpage=bahan_tokenisasi'</script>";
}else{
  while ($data = $result->fetch_assoc()) {
    $bahan = $data['bahan_token'];
    $keterangan = $data['keterangan_token'];
  }

?>

<div class="panel panel-default">
  <div class="panel-heading">
    <b>Formulir Edit Bahan Baku Tokenisasi</b>
  </div>
  <div class="panel-body">


    <form action="" method="post" autocomplete="off">
      <div class="form-group">
        <label for="bahan" class="form-label">Bahan Tokenisasi : </label>
        <input type="text" class="form-control form-control-line" name="bahan" placeholder="Input Bahan Tokenisasi" id="bahan" required="required" autofocus value="<?= $bahan; ?>">
      </div>
      <div class="form-group">
        <label for="keterangan" class="form-label">Keterangan : </label>
        <input type="text" class="form-control form-control-line" name="keterangan" placeholder="Input Keterangan Tokenisasi" id="keterangan" required="required" value="<?= $keterangan; ?>">
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
