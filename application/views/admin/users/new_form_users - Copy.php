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
						<a href="<?php echo site_url('admin/users/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/users/add') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
								<label for="usrName">Username*</label>
								<input class="form-control <?php echo form_error('usrName') ? 'is-invalid':'' ?>" type="text" placeholder="Isi username anda" name="usrName"/>
								<div class="invalid-feedback">
									<?php echo form_error('usrName') ?>
								</div>
							</div>	
						
							<div class="form-group">
								<label for="fullName">Nama Lengkap*</label>
								<input class="form-control <?php echo form_error('fullName') ? 'is-invalid':'' ?>" type="text" placeholder="Isi nama lengkap anda" name="fullName"/>
								<div class="invalid-feedback">
									<?php echo form_error('fullName') ?>
								</div>
							</div>	
							<div class="form-group">
								<label for="email">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="text" placeholder="Isi email aktif anda" name="email"/>
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>	
							<div class="form-group">
								<label for="telp">Telepon*</label>
								<input class="form-control <?php echo form_error('telp') ? 'is-invalid':'' ?>" type="number" placeholder="Isi nomor telepon aktif anda" name="telp"/>
								<div class="invalid-feedback">
									<?php echo form_error('telp') ?>
								</div>
							</div>								
							<div class="form-group">
								<label for="pwdHash">Password*</label>
								<input class="form-control <?php echo form_error('pwdHash') ? 'is-invalid':'' ?>" type="Password" placeholder="***********" name="pwdHash"/>
								<div class="invalid-feedback">
									<?php echo form_error('pwdHash') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="confirmPwd">Confirm Password*</label>
								<input class="form-control <?php echo form_error('confirmPwd') ? 'is-invalid':'' ?>" type="Password" placeholder="***********" name="confirmPwd"/>
								<div class="invalid-feedback">
									<?php echo form_error('confirmPwd') ?>
								</div>
							</div>							
							<div class="form-group">
								<label for="jeniscuti">Role*</label>
								
								<select class="form-control" name="roleUser" />
									<option name="roleUser">---Pilih---</option>
								 	<option value="admin" name="roleUser">Admin</option>
								 	<option value="spv" name="roleUser">Spv</option>
								 	<option value="pimpinan" name="roleUser">Pimpinan</option>
								 	<option value="staff" name="roleUser">Staff</option>
								 </select>
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
		<?php $this->load->view("admin/_partials/modal.php") ?>
		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
