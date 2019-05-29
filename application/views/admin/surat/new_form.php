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
						<a href="<?php echo site_url('admin/jadwal/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

					
						<form action="<?php base_url('admin/jadwal/add') ?>" method="post" enctype="multipart/form-data" >
							
							<div class="form-group">
								<label for="name">Nomor Surat*</label>
								<input class="form-control <?php echo form_error('no_surat') ? 'is-invalid':'' ?>"
								 type="text" name="no_surat" placeholder="Masukan periode" value="B.0051/Un.05/III.7/PP.00.9/<?php echo date('m');?>/<?php  echo date("Y");?>" readonly/>
								<div class="invalid-feedback">
									<?php echo form_error('no_surat') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Tanggal Surat*</label>
								<input class="form-control <?php echo form_error('tangga_surat') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo date("m/d/Y")?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_surat') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Dosen*</label>
								<select class="form-control  <?php echo form_error('kode_dosen') ? 'is-invalid':'' ?>"  name="kode_dosen" >
								<option>Pilih Dosen</option>	
								<?php foreach ($dosen as $dosen): ?>	
								<option value="<?php echo $dosen->kode_dosen;?>"><?php echo $dosen->nama;?></option>
								<?php endforeach; ?> 
							
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kode_dosen') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Periode*</label>
								<input class="form-control <?php echo form_error('periode') ? 'is-invalid':'' ?>"
								 type="text" name="periode" placeholder="Masukan periode" />
								<div class="invalid-feedback">
									<?php echo form_error('periode') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Semester*</label>
								<select class="form-control  <?php echo form_error('semester') ? 'is-invalid':'' ?>"  name="semester" >
								<option>Pilih Semester</option>	
								<option value="ganjil">Ganjil</option>
								<option value="genap">Genap</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('semester') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Bata SAP*</label>
								<input class="form-control <?php echo form_error('tangga_sap') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_sap" placeholder="Batas SAP" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_sap') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tangal Mulai*</label>
								<input class="form-control <?php echo form_error('tangga_mulai') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_mulai" placeholder="Tanggal Mulai" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_mulai') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tangal Selesai*</label>
								<input class="form-control <?php echo form_error('tangga_selesai') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_selesai" placeholder="Tanggal Selesai" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_selesai') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pejabat*</label>
								<select class="form-control  <?php echo form_error('kode_pejabat') ? 'is-invalid':'' ?>"  name="kode_pejabat" >
								<option>Pilih Pejabat</option>	
								<?php foreach ($pejabat as $pejabat): ?>	
								<option value="<?php echo $pejabat->kode_pejabat;?>"><?php echo $pejabat->nama;?></option>
								<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kode_pejabat') ?>
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
