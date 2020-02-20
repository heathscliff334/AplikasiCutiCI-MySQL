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
						<a href="<?php echo site_url('admin/settings/view_profile/'.$_SESSION['session_var_user']->user_id) ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/settings/update_profile') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
								<label for="usrName">Username*</label>
								<input class="form-control <?php echo form_error('usrName') ? 'is-invalid':'' ?>" type="text" placeholder="Isi username anda" name="usrName" value="<?php echo $users->username; ?> " readonly="true"/>
								<div class="invalid-feedback">
									<?php echo form_error('usrName') ?>
								</div>
							</div>	
						
							<div class="form-group">
								<label for="fullName">Nama Lengkap*</label>
								<input class="form-control <?php echo form_error('fullName') ? 'is-invalid':'' ?>" type="text" placeholder="Isi nama lengkap anda" value="<?php echo $users->full_name; ?>" name="fullName"/>
								<div class="invalid-feedback">
									<?php echo form_error('fullName') ?>
								</div>
							</div>	
							<div class="form-group">
								<label for="email">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="text" placeholder="Isi email aktif anda" name="email" value="<?php echo $users->email; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>	
							<div class="form-group">
								<label for="telp">Telepon*</label>
								<input class="form-control <?php echo form_error('telp') ? 'is-invalid':'' ?>" type="number" placeholder="Isi nomor telepon aktif anda" name="telp" value="<?php echo $users->phone; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('telp') ?>
								</div>
							</div>															

							<input class="btn btn-primary" type="submit" name="btn" value="Save" />
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
