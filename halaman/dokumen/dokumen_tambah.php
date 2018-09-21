<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Masukan Berita
        </div>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" enctype="multipart/form-data">
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
            <input type="submit" value='Tambah' class="btn btn-primary" name="BtnAdd"/>
        </form>
    </div>
</div>


<?php

if(Input::get('BtnAdd')){
    $judul = Input::get('judul');
    $filename = $_FILES['isiberita']['name'];
    $lokasi = '../pusatdata/file/'.$filename;
    move_uploaded_file($_FILES['isiberita']['tmp_name'],$lokasi);

    $userDoc = $lokasi;
    $string = Conver::parseWord($userDoc);

    $field = array(
      'judul' => $judul,
      'isi' => $string,
      'url' => $lokasi,
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

}
?>
