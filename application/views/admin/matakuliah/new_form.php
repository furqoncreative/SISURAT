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
						<a href="<?php echo site_url('admin/matakuliah/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/matakuliah/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="kode_mk">Kode Mata Kuliah*</label>
								<input class="form-control <?php echo form_error('kode_mk') ? 'is-invalid':'' ?>"
								 type="text" name="kode_mk" placeholder="Kode Mata Kuliah" />
								<div class="invalid-feedback">
									<?php echo form_error('kode_mk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Nama Mata Kuliah*</label>
								<input class="form-control <?php echo form_error('nama_mk') ? 'is-invalid':'' ?>"
								 type="text" name="nama_mk" placeholder="Nama Mata Kuliah" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_mk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jumlah SKS*</label>
								<input class="form-control <?php echo form_error('jumlah_sks') ? 'is-invalid':'' ?>"
								 type="number" name="jumlah_sks" placeholder="Jumlah SKS" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah_sks') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Jurusan*</label>
								<select class="form-control  <?php echo form_error('kode_jurusan') ? 'is-invalid':'' ?>"  name="kode_jurusan" >
								<option>Pilih Jurusan</option>	
								<?php foreach ($jurusan as $data): ?>	
								<option value="<?php echo $data->kode_jurusan;?>"><?php echo $data->nama;?></option>
								<?php endforeach; ?> 
							
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kode_jurusan') ?>
								</div>
							</div>
						

							<div class="form-group">
								<label for="name">Kurikulum*</label>
								<input class="form-control <?php echo form_error('kurikulum') ? 'is-invalid':'' ?>"
								 type="text" name="kurikulum" placeholder="Kurikulum" />
								<div class="invalid-feedback">
									<?php echo form_error('kurikulum') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Semester*</label>
								<input class="form-control <?php echo form_error('semester') ? 'is-invalid':'' ?>"
								 type="text" name="semester" placeholder="Semester" />
								<div class="invalid-feedback">
									<?php echo form_error('semester') ?>
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
