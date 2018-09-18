<div class="table-responsive">
  <table id="table-lihat" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th width="20px" class="text-center">No</th>
        <th class="text-center">Kata Dasar</th>
        <th class="text-center" width="100px">Keterangan Kata Dasar</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 0;
      $query = "SELECT * FROM tb_katadasar ORDER BY id_ktdasar ASC";
      $result = $mysqli->query($query);
      while ($data = $result->fetch_assoc()) {
        echo "
          <tr>
            <td>".++$no."</td>
            <td>".$data['katadasar']."</td>
            <td>".$data['tipe_katadasar']."</td>
            <td class='text-center'>
							<a href='?page=kamusdata_edit&id=".$data['id']."' class='btn btn-info'><i class='fa fa-book'></i></a>
							<a href='?page=kamusdata_edit&id=".$data['id']."' class='btn btn-danger' onclick='return confirm(\"Apakah anda yakin ingin menghapus ini?\")'><i class='fa fa-trash-o'></i></a>
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
  <a href="?page=bahanbaku&subpage=bahan_kamusdata_tambah" class="btn btn-primary">Tambah Kamus Data</a>
</div>
