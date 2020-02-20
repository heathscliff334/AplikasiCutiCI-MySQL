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

						<a href="<?php echo site_url('admin/users/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/users/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $users->user_id?>" />

							<div class="form-group">
								<label for="userName">Username :</label>
								<input class="form-control" type="text" name="" value="<?php echo $users->username ?>" readonly="true">
							</div>	
							<div class="form-group">
								<label for="userName">Nama Lengkap :</label>
								<input class="form-control" type="text" name="" value="<?php echo $users->full_name ?>" readonly="true">
							</div>	
							<div class="form-group">
								<label for="userName">Email :</label>
								<input class="form-control" type="text" name="" value="<?php echo $users->email ?>" readonly="true">
							</div>	
							<div class="form-group">
								<label for="userName">Telepon :</label>
								<input class="form-control" type="text" name="" value="<?php echo $users->phone ?>" readonly="true">
							</div>
							<div class="form-group">
								<label for="userName">Role :</label>
								<input class="form-control" type="text" name="" value="<?php echo $users->role ?>" readonly="true">
							</div>
<!-- 							<input class="btn btn-success" type="submit" name="btn" value="Save" /> -->
						</form>

					</div>

					<div class="card-footer small text-muted">
						Last Login : <?php echo $users->last_login ?>
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
