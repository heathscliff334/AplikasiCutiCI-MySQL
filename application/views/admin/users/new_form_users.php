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
							<?php if ($_SESSION['session_var_user']->role == "spv") {?>
							<div class="form-group">
								<label for="jeniscuti">Role*</label>
								
								<select class="form-control" name="roleUser" />
									<option value="staff" name="roleUser">---Pilih---</option>
								 	<option value="spv" name="roleUser">Manager</option>
								 	<option value="staff" name="roleUser">Staff</option>
								 </select>
							</div>

							<input type="hidden" name="divisiUser" value="<?php echo $_SESSION['session_var_user']->divisi ?>">								
							<?php } ?>
							<?php if ($_SESSION['session_var_user']->role == "koordinator") { ?>						
							<div class="form-group">
								<label for="jeniscuti">Role*</label>
								
								<select class="form-control" name="roleUser" />
									<option value="staff" name="roleUser">---Pilih---</option>
								 	<option value="admin" name="roleUser">Admin</option>
								 	<option value="spv" name="roleUser">Manager</option>
								 	<option value="pimpinan" name="roleUser">Pimpinan</option>
								 	<option value="staff" name="roleUser">Staff</option>
								 </select>
							</div>	
								
							<div class="form-group">
								<label for="divisiUser">Divisi*</label>
								
								<select class="form-control" name="divisiUser" />
									<option>---Pilih---</option>
								 	<option value="marketing-jgc" name="divisiUser">Marketing-JGC</option>
								 	<option value="marketing-snt" name="divisiUser">Marketing-SNT</option>
								 	<option value="finance" name="divisiUser">Finance</option>
								 	<option value="accounting" name="divisiUser">Accounting</option>
								 	<option value="purchasing" name="divisiUser">Purchasing</option>
								 	<option value="it" name="divisiUser">IT</option>
								 	<option value="driver" name="divisiUser">Driver</option>
								 </select>
							</div>		
							<?php } ?>
							<div class="form-group">
								<label for="katUser">Kategori User*</label>
								
								<select class="form-control" name="katUser" />
									<option value="1">---Pilih---</option>
								 	<option value="1" name="katUser">Jabodetabek</option>
								 	<option value="2" name="katUser">Kalimantan</option>
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
