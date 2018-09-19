<div class="table-responsive">
	<table id="table-lihat" class="table table-hover table-bordered">
		<thead>
			<tr>
				<th width="5%"  class="text-center">No</th>
				<th class="text-center" width="25%">Judul</th>
				<th class="text-center" width="40%">Isi Berita</th>
				<th class="text-center">URL File</th>
				<th class="text-center" width="15%">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result = $mysqli->query("SELECT * FROM tbberita ORDER BY id");
				$no = 0;
				while($row = $result->fetch_assoc()) {
					echo "
						<tr>
							<td class='text-center'>".++$no."</td>
							<td>".$row['Judul']."</td>
							<td>".Convert::potongKalimat($row['Berita'], 10)."</td>
							<td>".$row['url']."</td>
							<td class='text-center'>
								<a href=?page=berita_lihat&id=$row[id] class='btn btn-info'><i class='fa fa-book'></i></a>
								<a href=?page=berita_edit&id=$row[id] class='btn btn-warning'><i class='fa fa-edit'></i></a>
								<a href=?page=berita_hapus&id=$row[id] class='btn btn-danger' onclick='return confirm(\"Apakah anda yakin ingin menghapus ini?\")'><i class='fa fa-trash-o'></i></a>
							</td>
						</tr>
					";
				}
			?>
		</tbody>
	</table>
</div>
