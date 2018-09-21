<?php

if(Input::get('simpan') == 'Simpan'){
  $field = array(
    'bahan' => Input::get('bahan'),
    'keterangan' => Input::get('keterangan')
  );

  $result = $allquery->tambah('tb_tokenisasi', $field);
  if($result){
    echo "
      <script type='text/javascript'>
        alert('Tambah data bahan tokenisasi BERHASIL!');
        document.location = '?page=bahanbaku&subpage=bahan_tokenisasi';
      </script>
    ";
  }else {
    echo "
      <script type='text/javascript'>
        alert('GAGAL menambahkan data baru bahan tokenisasi!');
        document.location = '?page=bahanbaku&subpage=bahan_tokenisasi';
      </script>
    ";
  }
}

?>


<div class="table-responsive">
  <table id="table-lihat" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th width="20px" class="text-center">No</th>
        <th class="text-center">Bahan Tokenisasi</th>
        <th class="text-center" width="500px">Keterangan</th>
        <th class="text-center" width="200px">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 0;
      $query = "SELECT * FROM tb_tokenisasi ORDER BY id ASC";
      $result = $mysqli->query($query);
      while ($data = $result->fetch_assoc()) {
        echo "
          <tr>
            <td>".++$no."</td>
            <td>".$data['bahan']."</td>
            <td>".$data['keterangan']."</td>
            <td class='text-center'>
              <a href='?page=bahanbaku&subpage=edit_bahan_tokenisasi&id=".$data['id']."' class='btn btn-info'><i class='fa fa-book'></i></a>
              <a href='?page=bahanbaku&subpage=hapus_bahan_tokenisasi&id=".$data['id']."' class='btn btn-danger' onclick='return confirm(\"Apakah anda yakin ingin menghapus ini?\")'><i class='fa fa-trash-o'></i></a>
            </td>
          </tr>
        ";
      }

      ?>
    </tbody>
  </table>
</div>

<div class="col-xs-12 text-right">
  <br>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm">Tambah Bahan Tokenisasi</button>
</div>

<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title w-100" id="myModalLabel">Formulir Tambah Bahan Tokenisasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body col-xs-12">

          <form action="" method="post">
            <div class="form-group">
              <label for="bahan" class="form-label">Bahan Tokenisasi : </label>
              <input type="text" class="form-control form-control-line" name="bahan" placeholder="Input Bahan Tokenisasi" id="bahan" required="required" autofocus>
            </div>
            <div class="form-group">
              <label for="keterangan" class="form-label">Keterangan : </label>
              <input type="text" class="form-control form-control-line" name="keterangan" placeholder="Input Keterangan Tokenisasi" id="keterangan" required="required">
            </div>
            <div class="form-group text-right">
              <input type="submit" class="btn btn-danger" data-dismiss="modal" name="cancel" value="Batal">
              <input type="submit" class="btn btn-info" name="simpan" value="Simpan">
            </div>
          </form>

        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!-- Central Modal Small -->
