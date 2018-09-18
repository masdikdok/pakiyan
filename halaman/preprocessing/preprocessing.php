<div class="isi-content ">
	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3><?= $judul;?></h3>
			</div>

			<ul class="list-unstyled">
					<li><a href="#tokenisasi" title="halaman/preprocessing/form_tokenisasi" class="active">Tokenisasi</a></li>
					<li><a href="#stopword" title="halaman/preprocessing/form_stopword">Stopword</a></li>
					<li><a href="#stemming" title="halaman/preprocessing/form_stemming">Stemming</a></li>
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
				<?php include "halaman/preprocessing/form_tokenisasi.php"; ?>
			</div>

		</div>
	</div>
</div>
