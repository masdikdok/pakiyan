<?php

if(Input::get('simpan') == 'Simpan Perubahan'){

  $id = Input::get('id');
  $field = array(
    'katadasar' => Input::get('bahan'),
    'tipe_katadasar' => Input::get('keterangan')
  );

  $result = $allquery->update('tb_katadasar', 'id_ktdasar = '.$id, $field);
  if($result){
    echo "
      <script type='text/javascript'>
        alert('Merubah kamusdata BERHASIL!');
        document.location = '?page=bahanbaku&subpage=bahan_kamusdata';
      </script>
    ";
  }else {
    echo "
      <script type='text/javascript'>
        alert('GAGAL merubah kamusdata!');
        document.location = '?page=bahanbaku&subpage=bahan_kamusdata';
      </script>
    ";
  }

}elseif (Input::get('cancel')) {
  echo "
    <script type='text/javascript'>
      document.location = '?page=bahanbaku&subpage=bahan_kamusdata';
    </script>
  ";
}


$id = Input::get('id');
$query = "SELECT * FROM tb_katadasar WHERE id_ktdasar = $id";
$result = $mysqli->query($query);
if(!(isset($result))){
  echo "<script type='text/javascript'>document.location.href='?page=bahanbaku&subpage=bahan_kamusdata'</script>";
}else{
  while ($data = $result->fetch_assoc()) {
    $bahan = $data['katadasar'];
    $keterangan = $data['tipe_katadasar'];
  }

?>

<div class="panel panel-default">
  <div class="panel-heading">
    <b>Formulir Edit Kamus Data</b>
  </div>
  <div class="panel-body">


    <form action="" method="post" autocomplete="off">
      <div class="form-group">
        <label for="bahan" class="form-label">Kamus Data : </label>
        <input type="text" class="form-control form-control-line" name="bahan" placeholder="Input Kamus Data" id="bahan" required="required" autofocus value="<?= $bahan; ?>">
      </div>
      <div class="form-group">
        <label for="keterangan" class="form-label">Keterangan : </label>
        <input type="text" class="form-control form-control-line" name="keterangan" placeholder="Input Kamus Data" id="keterangan" required="required" value="<?= $keterangan; ?>">
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
