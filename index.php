<?php

include "pusatdata/core/init.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" id="html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?> | SISTEM PENGUKURAN KEMIRIPAN DOKUMEN TEXT BAHASA INDONESIA BERBASIS TEMU KEMBALI INFORMASI</title>
    <link rel="stylesheet" href="pusatdata/css/bootstrap.min.css">
    <link rel="stylesheet" href="pusatdata/css/font-awesome.min.css">
    <link rel="stylesheet" href="pusatdata/css/mystyles.css">
  </head>
  <body>
    <div id="header" class="text-center">
      <a href="">SISTEM PENGUKURAN KEMIRIPAN DOKUMEN TEXT BAHASA INDONESIA BERBASIS TEMU KEMBALI INFORMASI</a>
    </div>

    <div id="header-nav">
      <div class="navigasi">
        <div class="container text-center">
          <div class="navbar-header">
            <div class="button-mobile" data-toggle="collapse" data-target="#isinav" aria-expanded="false">
              <p class="judul-menu">Menu</p>
              <button type="button" class="navbar-toggle collapsed">
                <span class="sr-only">Toggle navigatio</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

          </div>
          <div class="collapse navbar-collapse" id="isinav">
            <ul class="nav nav-justified">
              <li><a href="?page="><i class="fa fa-home fa-2x"></i>Beranda</a></li>
              <li><a href="?page=preprocessing"><i class="fa fa-clipboard fa-2x"></i>Contoh Proses Preprocessing</a></li>
              <li><a href="?page=algoritma"><i class="fa fa-files-o fa-2x"></i>Algoritma Stemming (kata)</a></li>
              <li><a href="?page=dokumen"><i class="fa fa-folder fa-2x"></i>Dokumen</a></li>
              <li><a href="?page=stemmingdokumen"><i class="fa fa-file-code-o fa-2x"></i>Stemming Dokumen</a></li>
              <li><a href="?page=bahanbaku"><i class="fa fa-archive fa-2x"></i>Bahan Baku</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="main-content">
      <div class="container">
        <div class="title-content">
          <h3 class="text-center"><?= $highlight; ?></h3>
        </div>
      </div>
      <?php include $mainContent; ?>
    </div>


    <footer id="footer">
      <div class="container">
        <hr>
        <p class="text-center">
          SISTEM PENGUKURAN KEMIRIPAN DOKUMEN TEXT BAHASA INDONESIA BERBASIS TEMU KEMBALI INFORMASI
          <br>Copyright&copy Iyan Mulyana, S.Kom. M.Kom
        </p>
      </div>
    </footer>

    <script type="text/javascript" src="pusatdata/js/jquery.min.js"></script>
    <script type="text/javascript" src="pusatdata/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="pusatdata/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="pusatdata/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="pusatdata/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="pusatdata/js/myjs.js"></script>

    <script type="text/javascript">

      $(document).ready(function() {

        CKEDITOR.replace('text-ckeditor');


      });

    </script>
  </body>
</html>
