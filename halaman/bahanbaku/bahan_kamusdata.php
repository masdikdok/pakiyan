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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm">Tambah Kamus Data</button>
</div>

<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title w-100" id="myModalLabel">Formulir Tambah Kamus Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body col-xs-12">

          <form action="index.html" method="post">
            <div class="form-group">
              <label for="bahan" class="form-label">Kamus Data : </label>
              <input type="text" class="form-control form-control-line" name="bahan" placeholder="Input Kamus Data" id="bahan">
            </div>
            <div class="form-group">
              <label for="bahan" class="form-label">Keterangan : </label>
              <input type="text" class="form-control form-control-line" name="bahan" placeholder="Input Kamus Data" id="bahan">
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Central Modal Small -->
