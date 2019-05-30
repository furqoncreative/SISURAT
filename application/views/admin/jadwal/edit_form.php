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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/jadwal/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/jadwal/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id_jadwal" value="<?php echo $jadwal->id_jadwal?>" />
							<div class="form-group">
								<label for="name">Dosen*</label>
								<select class="form-control  <?php echo form_error('kode_dosen') ? 'is-invalid':'' ?>"  name="kode_dosen" >
								<?php foreach ($dosen as $dosen): ?>	
								<option value="<?php echo $dosen->kode_dosen;?>" <?php echo $jadwal->kode_dosen == $dosen->kode_dosen ?'selected':'';?> ><?php echo $dosen->nama;?></option>
								<?php endforeach; ?> 
							
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kode_dosen') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">jadwal*</label>
								<select class="form-control  <?php echo form_error('kode_mk') ? 'is-invalid':'' ?>"  name="kode_mk" >
								<?php foreach ($matakuliah as $matakuliah): ?>	
								<option value="<?php echo $matakuliah->kode_mk;?>" <?php echo $jadwal->kode_mk == $matakuliah->kode_mk ?'selected':'';?>><?php echo $matakuliah->nama_mk;?></option>
								<?php endforeach; ?> 
							
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kode_mk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Ruangan*</label>
								<select class="form-control  <?php echo form_error('kode_ruangan') ? 'is-invalid':'' ?>"  name="kode_ruangan" >
								<?php foreach ($ruangan as $ruangan): ?>	
								<option value="<?php echo $ruangan->kode_ruangan;?>" <?php echo $jadwal->kode_ruangan == $ruangan->kode_ruangan ?'selected':'';?>><?php echo $ruangan->nama;?></option>
								<?php endforeach; ?> 
							
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kode_ruangan') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Hari*</label>
								<select class="form-control  <?php echo form_error('hari') ? 'is-invalid':'' ?>"  name="hari" >
								<option value="Senin" <?php echo $jadwal->hari == 'Senin'?'selected':'';?> >Senin</option>
								<option value="Selasa" <?php echo $jadwal->hari == 'Selasa'?'selected':'';?> >Selasa</option>
								<option value="Rabu" <?php echo $jadwal->hari == 'Rabu'?'selected':'';?>>Rabu</option>
								<option value="Kamis" <?php echo $jadwal->hari == 'Kamis'?'selected':'';?>>Kamis</option>
								<option value="Jumat" <?php echo $jadwal->hari == 'Jumat'?'selected':'';?>>Jumat</option>
								<option value="Sabtu" <?php echo $jadwal->hari == 'Sabtu'?'selected':'';?>>Sabtu</option>
													
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('hari') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jam Mulai*</label>
								<input class="form-control <?php echo form_error('jam_mulai') ? 'is-invalid':'' ?>"
								 type="time" name="jam_mulai" placeholder="Jam Mulai" value="<?php echo $jadwal->jam_mulai ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jam_mulai') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jam Selesai*</label>
								<input class="form-control <?php echo form_error('jam_selesai') ? 'is-invalid':'' ?>"
								 type="time" name="jam_selesai" placeholder="Jam Selesai" value="<?php echo $jadwal->jam_selesai ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jam_selesai') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Periode*</label>
								<input class="form-control <?php echo form_error('periode') ? 'is-invalid':'' ?>"
								 type="text" name="periode" placeholder="Masukan periode" value="<?php echo $jadwal->periode ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('periode') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Kelas*</label>
								<input class="form-control <?php echo form_error('kelas') ? 'is-invalid':'' ?>"
								 type="text" name="kelas" placeholder="Masukan periode" value="<?php echo $jadwal->kelas ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kelas') ?>
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
