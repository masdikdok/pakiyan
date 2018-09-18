<div class="table-responsive">
  <table id="table-lihat" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th width="20px" class="text-center">No</th>
        <th class="text-center">Bahan Stopword</th>
        <th class="text-center" width="100px">Keterangan</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 0;
      $query = "SELECT * FROM tb_stopword ORDER BY id ASC";
      $result = $mysqli->query($query);
      while ($data = $result->fetch_assoc()) {
        echo "
          <tr>
            <td>".++$no."</td>
            <td>".$data['bahan_tokenisasi']."</td>
            <td>".$data['keterangan_tokenisasi']."</td>
            <td class='text-center'>
              <a href='?page=bahan_stopword_edit&id=".$data['id']."' class='btn btn-info'><i class='fa fa-book'></i></a>
              <a href='?page=bahan_stopword_hapus&id=".$data['id']."' class='btn btn-danger' onclick='return confirm(\"Apakah anda yakin ingin menghapus ini?\")'><i class='fa fa-trash-o'></i></a>
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
  <a href="?page=bahanbaku&subpage=bahan_tokenisasi_tambah" class="btn btn-primary">Tambah Bahan Stopword</a>
</div>
