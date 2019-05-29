<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/jadwal/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Dosen</th>
										<th>Mata Kuliah</th>
										<th>Ruangan</th>
										<th>Hari</th>
										<th>Jam Mulai</th>
										<th>Jam Selesai</th>
										<th>Periode</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($jadwal as $jadwal): ?>
									<tr>
										<td width="150">
											<?php echo $jadwal->nama_dosen ?>
										</td>
										<td>
											<?php echo $jadwal->nama_mk ?>
										</td>
										<td>
											<?php echo $jadwal->nama_ruangan ?>
										</td>
										<td>
											<?php echo $jadwal->hari ?>
										</td>
										
										<td>
											<?php echo $jadwal->jam_mulai ?>
										</td>
										<td>
											<?php echo $jadwal->jam_selesai ?>
										</td>
										<td>
											<?php echo $jadwal->periode ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/jadwal/edit/'.$jadwal->id_jadwal) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/jadwal/delete/'.$jadwal->id_jadwal) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
