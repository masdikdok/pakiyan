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

if(isset(Input::get('BtnAdd'))){
    $judul = Input::get('judul');
    $filename = $_FILES['isiberita']['name'];
    $lokasi = '../pusatdata/file/'.$filename;
    move_uploaded_file($_FILES['isiberita']['tmp_name'],$lokasi);

    function parseWord($userDoc)
    {
        $fileHandle = fopen($userDoc, "r"); //menampilkan file yg di uplload
        $line = @fread($fileHandle, filesize($userDoc));   //membaca suatu file dalam PHP .
        $lines = explode(chr(0x0D),$line); //pecah kata
        $outtext = "";
        foreach($lines as $thisline)
          {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(strlen($thisline)==0))
              {
              } else {
                $outtext .= $thisline." ";
              }
          }
         $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }

    $userDoc = $lokasi;
    $string = parseWord($userDoc);
    $idberita = str_replace(" ", "_", $judul); // replace spasi dgn '_' utk dijadikan id_berita

    $field = array(
      'id_berita' => $idberita,
      'Judul' => $judul,
      'Berita' => $string,
      'url' => $lokasi,
    );

    $result = $allquery->tambah('tbberita', $field);
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
