<div class="isi-content ">
	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3><?= $judul;?></h3>
			</div>

			<ul class="list-unstyled">
					<li><a href="?page=bahanbaku&subpage=bahan_tokenisasi">Bahan Tokenisasi</a></li>
					<li><a href="?page=bahanbaku&subpage=bahan_stopword" >Bahan Stopword</a></li>
					<li><a href="?page=bahanbaku&subpage=bahan_kamusdata">Kamus Data</a></li>
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
				<?php include $subpage; ?>
			</div>

		</div>
	</div>
</div>
