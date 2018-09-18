<div class="isi-content ">
	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3><?= $judul;?></h3>
			</div>

			<ul class="list-unstyled">
					<li><a href="?page=dokumen&subpage=dokumen_lihat">Lihat Dokumen</a></li>
					<li><a href="?page=dokumen&subpage=dokumen_tambah">Tambah Dokumen</a></li>
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
