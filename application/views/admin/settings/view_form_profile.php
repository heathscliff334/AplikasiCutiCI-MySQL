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

						<a href="<?php echo site_url('admin/settings/update_profile/'.$_SESSION['session_var_user']->user_id) ?>"><i class="fas fa-edit"></i> Edit</a>
						
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/users/edit") ?>" method="post"
							enctype="multipart/form-data" >
							<table class="table-sm" width=50%>
								<tr>
									<td>Username</td>
									<td width="30">:</td>
									<td><?php echo $users->username; ?></td>
								</tr>
								<tr>
									<td>Nama Lengkap</td>
									<td>:</td>
									<td><?php echo $users->full_name; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo $users->email; ?></td>
								</tr>
								<tr>
									<td>Telepon</td>
									<td>:</td>
									<td><?php echo $users->phone; ?></td>
								</tr>
								<tr>
									<td>Role</td>
									<td>:</td>
									<td><?php if($users->role == "spv") {
										echo "manager";
									}else {
									echo $users->role; 
								}?></td>
								</tr>	
								<tr>
									<td>Divisi</td>
									<td>:</td>
									<td><?php echo $users->divisi; ?></td>
								</tr>		
								<tr>
									<td>Sisa Cuti</td>
									<td>:</td>
									<td><?php echo $users->sisa_cuti ?></td>
								</tr>
								<tr>
									<td>Created At</td>
									<td>:</td>
									<td><?php echo $users->created_at; ?></td>
								</tr>	
								<tr>
									<td>Last Login</td>
									<td>:</td>
									<td><?php echo $users->last_login; ?></td>
								</tr>											
							</table>
							<br>
							<a class="btn btn-info" href="<?php echo site_url('admin/settings/change_pwd/'.$_SESSION['session_var_user']->user_id) ?>"><i class="fas fa-key"></i> Change Password</a>
						</form>

					</div>

					<div class="card-footer small text-muted">
						<!-- Last Login : <?php echo $users->last_login ?> -->
						#Note : <br>
						<ul>							
							<li>Bagi yang belum genap 1 tahun belum mendapatkan dan belum bisa menggunakan cuti tahunan</li>
							<li>Mohon untuk melengkapi data yang masih kosong, Terima kasih.</li>
						</ul>
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
