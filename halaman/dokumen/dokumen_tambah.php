
<div class="row">
  <div class="col-sm-12">
    <ul class="nav nav-tabs" id="pills-tab" role="tablist">
      <li class="active" id="pills-input-field" data-toggle="pill" href="#pills-fields" role="tab" aria-controls="pills-fields" aria-selected="true"><a href="#">Input By Field</a></li>
      <li id="pills-input-file" data-toggle="pill" href="#pills-file" role="tab" aria-controls="pills-file" aria-selected="false"><a href="#">Input By File</a></li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
      <br>
      <div class="tab-pane fade active in" id="pills-fields" role="tabpanel" aria-labelledby="pills-input-field">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Tambah dokumen dengan menambahkan mengisi field input dokumen
                </div>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <label for="judul" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul" placeholder="Masukan judul dokumen" class="form-control" id='judul'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="text-ckeditor" class="col-sm-2 control-label">Isi</label>
                  <div class="col-sm-10">
                    <textarea name="isi" rows="8" cols="80" id="text-ckeditor" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="keterangan" placeholder="Masukan keterangan dokumen" class="form-control" id='keterangan'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="file" class="col-sm-2 control-label">Nama File</label>
                  <div class="col-sm-10">
                    <input type="text" name="file" type="Tidak perlu menuliskan format file" placeholder="Masukan nama file" class="form-control" id='file'>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" value='fields' name='inputby'/>
                    <input type="reset" value='Reset' class="btn btn-warning">
                    <input type="submit" value='Tambah' class="btn btn-primary" name="BtnAdd"/>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>

      <div class="tab-pane fade" id="pills-file" role="tabpanel" aria-labelledby="pills-input-file">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Tambah dokumen dengan menambahkan file dokumen
                </div>
            </div>
            <div class="panel-body">
                <form action="" role="form" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul">Judul Dokumen</label>
                        <input type="text" class="form-control"  placeholder="Masukan Judul Dokumen" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File Dokumen</label>
                        <input type="file" name="isiberita">
                       <h5>Jenis FIle .txt</h5>  </div>
                    <div class="form-group">
                    <input  type="hidden" class="form-control"  name="keyword" value="100" />
                    </div>
                    <!--<input  type='hidden' name='url' />-->
                    <input type="hidden" value='file' name='inputby'/>
                    <input type="reset" value='Reset' class="btn btn-warning">
                    <input type="submit" value='Tambah' class="btn btn-primary" name="BtnAdd"/>
                </form>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>


<?php

if(Input::get('BtnAdd')){
  if(Input::get('inputby') == 'file'){
    $filename = $_FILES['isiberita']['name'];
    $lokasi = '../pusatdata/file/'.$filename;
    move_uploaded_file($_FILES['isiberita']['tmp_name'],$lokasi);

    $userDoc = $lokasi;
    $string = Convert::parseWord($userDoc);

    $field = array(
      'judul' => htmlspecialchars(Input::get('judul')),
      'isi' => $string,
      'keterangan' => htmlspecialchars(Input::get('keterangan')),
      'url' => $lokasi,
      'create_at' => date('Y-m-d h:m:s'),
    );

    var_dump($field);die();
    $result = $allquery->tambah('tb_dokumen', $field);
    if($result){
      echo "
        <script type='text/javascript'>
          alert('Tambah data berita BERHASIL!');
          document.location = '?page=dokumen&subpage=dokumen_tambah';
        </script>
      ";
    }else {
      echo "
        <script type='text/javascript'>
          alert('GAGAL menambahkan berita baru!');
          document.location = '?page=dokumen&subpage=dokumen_tambah';
        </script>
      ";
    }

  }else if(Input::get('inputby') == 'fields'){

    if(!file_exists('../pusatdata/file/'.Input::get('file').'.txt')){
      $myfile = fopen("pusatdata/file/".Input::get('file').".txt", "x+") or die ("Unable to open file!");
      fwrite($myfile, Input::get('isi'));
      fclose($myfile);

      $field = array(
        'judul' => htmlspecialchars(Input::get('judul')),
        'isi' => htmlspecialchars(Input::get('isi')),
        'keterangan' => htmlspecialchars(Input::get('keterangan')),
        'create_at' => date('Y-m-d h:m:s'),
      );

      $result = $allquery->tambah('tb_dokumen', $field);
      if($result){
        echo "
          <script type='text/javascript'>
            alert('Tambah data berita BERHASIL!');
            document.location = '?page=dokumen&subpage=dokumen_tambah';
          </script>
        ";
      }else {
        echo "
          <script type='text/javascript'>
            alert('GAGAL menambahkan berita baru!');
            document.location = '?page=dokumen&subpage=dokumen_tambah';
          </script>
        ";
      }

    }else{
      echo "
        <script type='text/javascript'>
          alert('Nama file tersebut sudah digunakan. Cobalah gunakan nama lain!');
          document.location = '?page=dokumen&subpage=dokumen_tambah';
        </script>
      ";
    }

  }

}
?>
