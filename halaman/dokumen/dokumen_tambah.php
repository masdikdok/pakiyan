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

if(isset($_POST['BtnAdd'])){
    $judul = $_POST['judul'];
    $filename = $_FILES['isiberita']['name'];
    $lokasi = 'files/'.$filename;
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
    // masukkan ke database
            $query = "INSERT INTO tbberita VALUES ('','$idberita','$judul','$string','$lokasi')";
            $q_insert = mysql_query($query)or die (mysql_error());
            //if ($q_insert) {
            //  move_uploaded_file($_FILES['isiberita']['tmp_name'],$lokasi);
        //  }

    include "preproses.php"; // ambil script preproses.php
    include ('Algoritma_stemming.php'); // ambil script stemming-nazief-adriani.php

    // ambil keyword berdasarkan berita yg baru dimasukkan ($idberita = judul berita)
    $sql5 = mysql_query("SELECT * FROM tbkeyword where id_berita = '$idberita' order by frekuensi DESC");
    while ($stemming = mysql_fetch_array($sql5)){
        if (!empty($stemming['kata'])){
            $teks5 = strtolower($stemming['kata']); // ubah ke huruf kecil semua

            // hapus tanda baca dan angka dengan spasi
            $tokenKarakter=array('’','—',' ','/',',','?','.',':',';',',','!','[',']','{','}','(',')','-','_','+','=','<','>','\'','"','\\','@','#','$','%','^','&','*','`','~','0','1','2','3','4','5','6','7','8','9','â€','”','“');
            $teks5= str_replace($tokenKarakter,' ',$teks5);
            $split = explode(' ',$teks5); // pisahkan kata yg ada spasinya

            foreach($split as $key5=>$kata){ // utk setiap kata yg telah dilakukan di atas, lakukan fungsi Nazief_Adriani
                $hasil_stemming = ECS(trim($kata));
                // masukkan ke dalam database tbstem
                mysql_query("INSERT INTO tbstem VALUES ('', '$stemming[id_berita]', '$stemming[kata]', '$hasil_stemming')");
            }
        }
    }
    // tampilkan hasil stemming keyword
    echo "<h3>Hasil Stemming Keyword:</h3>";
    echo "<table class='display table table-bordered table-striped' id='example'>";
    echo "<tr><th>Kata</th><th>Stemming</th></tr>";
    $sql6 = mysql_query("SELECT * FROM tbstem where id_berita = '$idberita' order by Id");
    while ($stemming = mysql_fetch_array($sql6)){
        echo "<tr><td>$stemming[Term]</td><td>$stemming[kata]</td></tr>";
    }
    echo "</table>";

}
?>
