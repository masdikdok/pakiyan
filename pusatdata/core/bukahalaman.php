<?php

(isset($_GET['page'])) ? $page = $_GET['page'] : $page = '';
(isset($_GET['subpage'])) ? $subpage = $_GET['subpage'] : $subpage = '';

switch ($page) {
	case '':
		$judul = "Beranda";
		$highlight = "SISTEM PENGUKURAN KEMIRIPAN DOKUMEN TEXT BAHASA INDONESIA BERBASIS TEMU KEMBALI INFORMASI";
		$mainContent = "halaman/home.php";
		break;

	case 'algoritma':
		$judul = "Algorita Stemming";
		$highlight = "Macam-macam Algoritma Stemming";
		$mainContent = "halaman/algoritma/algoritma.php";
		break;

	case 'dokumen':
		$judul = "Dokumen";
		$highlight = "Daftar Dokumen Yang Tersedia Didalam Database";
		$mainContent = "halaman/dokumen/dokumen.php";
		break;

	case 'bahanbaku':
		$judul = "Bahan Baku";
		$highlight = "Daftar Ketersediaan Bahan Baku Untuk Proses Preprocessing";
		$mainContent = "halaman/bahanbaku/bahanbaku.php";

		if($subpage == ''){
			$subpage = "halaman/bahanbaku/form_tokenisasi.php";
		}else{
			$subpage = "halaman/bahanbaku/".$subpage.".php";
		}

		break;

	case 'preprocessing':
		$judul = "Contoh Preprocessing";
		$highlight = "Beberapa Contoh Fungsi Yang Termasuk Dalam Bagian Preprocessing";
		$mainContent = "halaman/preprocessing/preprocessing.php";
		if($subpage == ''){
			$subpage = "halaman/preprocessing/form_tokenisasi.php";
		}else{
			$subpage = "halaman/preprocessing/".$subpage.".php";
		}

		break;

	case 'stemmingdokumen':
		$judul = "Stemming Dokumen";
		$highlight = "Melakukan Percobaan Untuk Menganalisis Hasil dari Proses Stemming Dengan Beberapa Algoritma Stemming";
		$mainContent = "halaman/stemmingdokumen/stemmingdokumen.php";
		break;


	default:
		$judul = "Beranda";
		$highlight = "SISTEM PENGUKURAN KEMIRIPAN DOKUMEN TEXT BAHASA INDONESIA BERBASIS TEMU KEMBALI INFORMASI";
		$mainContent = "halaman/home.php";
		break;
}

?>
