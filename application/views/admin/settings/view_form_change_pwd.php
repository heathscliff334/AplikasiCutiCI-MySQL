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

						<a href="<?php echo site_url('admin/settings/view_profile/'.$_SESSION['session_var_user']->user_id) ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/settings/change_pwd") ?>" method="post"
							enctype="multipart/form-data" >
							<label><b>Change Password</b></label>

							
							<input type="hidden" name="id" value="<?php echo $users->user_id?>" />

							<div class="form-group">
								<label for="pwdHash">Old Password*</label>
								<input class="form-control <?php echo form_error('pwdHash') ? 'is-invalid':'' ?>" type="password" name="pwdHash"/>
								<div class="invalid-feedback">
									<?php echo form_error('pwdHash') ?>
								</div>
							</div>	
							<div class="form-group">
								<label for="pwdNew">New Password*</label>
								<input class="form-control <?php echo form_error('pwdNew') ? 'is-invalid':'' ?>" type="password" name="pwdNew"/>
								<div class="invalid-feedback">
									<?php echo form_error('pwdNew') ?>
								</div>
							</div>	
							<div class="form-group">
								<label for="confirmPwd">Confirm Password*</label>
								<input class="form-control <?php echo form_error('confirmPwd') ? 'is-invalid':'' ?>" type="password" name="confirmPwd"/>
								<div class="invalid-feedback">
									<?php echo form_error('confirmPwd') ?>
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
		<?php $this->load->view("admin/_partials/modal.php") ?>

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>


</body>

</html>
