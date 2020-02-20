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

						<a href="<?php echo site_url('admin/news/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/news/edit") ?>" method="post"
							enctype="multipart/form-data" >
							<input type="hidden" name="userId" value="<?php echo $_SESSION['session_var_user']->user_id ?>" />	

							<div class="form-group">
								<label for="judulNews">Judul</label>
								<input class="form-control" type="text" value="<?php echo $news->judul_news ?>" name="judulNews"/>
							</div>	
						
							<div class="form-group">
								<label for="name">Isi</label>
								<textarea class="form-control ckeditor" id="ckedtor" name="isiNews"><?php echo $news->isi_news ?></textarea>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />

						</form>

					</div>

					<div class="card-footer small text-muted">
						Upload date : <?php echo $news->created_at ?>
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
