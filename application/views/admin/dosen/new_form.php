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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/dosen/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/dosen/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="kode_dosen">Kode dosen*</label>
								<input class="form-control <?php echo form_error('kode_dosen') ? 'is-invalid':'' ?>"
								 type="text" name="kode_dosen" placeholder="Kode dosen" />
								<div class="invalid-feedback">
									<?php echo form_error('kode_dosen') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">NIP*</label>
								<input class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?>"
								 type="number" name="nip" placeholder="NIP" />
								<div class="invalid-feedback">
									<?php echo form_error('nip') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">NIDN*</label>
								<input class="form-control <?php echo form_error('nidn') ? 'is-invalid':'' ?>"
								 type="text" name="nidn" placeholder="NIDN" />
								<div class="invalid-feedback">
									<?php echo form_error('nidn') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Nama dosen*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama dosen" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
