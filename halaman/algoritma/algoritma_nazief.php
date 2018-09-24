<div class="row">
  <div class="col-xs-12">
    <p>Contoh proses stemming pada section ini menggunakan <b>Algoritma Nazief</b></p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <b>Formulir Stemming Menggunakan Algoritma Nazief</b>
  </div>
  <div class="panel-body">
    <form action="" method="post">
      <div class="form-group">
        <label for="kata">Kata Berimbuhan :</label>
        <input class="form-control" type="text" id="kata" name="kata" placeholder="Kata Berimbuhan" required>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="proses" value="Proses">
      </div>
    </form>
  </div>
</div>


<?php
if(isset($_POST['proses'])){
  $kata = $_POST['kata'];
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
            echo $kata;
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
          echo $IrController->stemming($kata, 'NAZIEF');
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php
}
 ?>
