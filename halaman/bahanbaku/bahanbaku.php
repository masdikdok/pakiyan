<div class="isi-content ">
	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3><?= $judul;?></h3>
			</div>

			<ul class="list-unstyled">
					<li><a href="#bahan_kamusdata" title="halaman/bahanbaku/bahan_kamusdata" class="active">Kamus Data</a></li>
					<li><a href="#bahan_tokenisasi" title="halaman/bahanbaku/bahan_tokenisasi">Bahan Tokenisasi</a></li>
					<li><a href="#bahan_stopword" title="halaman/bahanbaku/bahan_stopword">Bahan Stopword</a></li>
			</ul>
		</nav>

		<!-- page content -->
		<div id="content">

      <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fa fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>
				<hr>
      </div>
			<div id="ajaxContent" class="col-sm-12">
				<?php include "halaman/bahanbaku/bahan_kamusdata.php"; ?>
			</div>

		</div>
	</div>
</div>
