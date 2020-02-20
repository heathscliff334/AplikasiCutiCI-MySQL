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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						Tutorial
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/settings/update_profile') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
								<h4>Staff</h4>
								<p>Yang dapat dilakukan dengan akun staff :</p>
								<ul>
									
									<li>Melihat <b>News & Event</b> yang sudah dibuat</li>
									<li>Melakukan</li>
								</ul>

							</div>	
					
						</form>

					</div>

					<div class="card-footer small text-muted">
						<!-- * required fields -->
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
