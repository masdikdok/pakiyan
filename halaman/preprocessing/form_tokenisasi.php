<div class="panel panel-default">
  <div class="panel-heading">
    <b>Formulir Tokenisasi</b>
  </div>
  <div class="panel-body">
    <form action="" method="post">
      <div class="form-group">
        <label for="kalimat">Kalimat :</label>
        <input class="form-control" type="text" id="kalimat" name="kalimat" placeholder="Kalimat" required>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="proses" value="Proses">
      </div>
    </form>
  </div>
</div>

<?php
if(isset($_POST['proses'])){
  $kalimat = $_POST['kalimat'];
  ?>
  <hr/>
  <h4><b>Hasil Proses :</b></h4>
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          Kalimat Awal
        </div>
        <div class="panel-body">
          <?php
            echo $kalimat;
          ?>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          Perubahan Kalimat
        </div>
        <div class="panel-body">
          <?php
            echo $IrController->tokenisasi($kalimat);
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php
}
 ?>
