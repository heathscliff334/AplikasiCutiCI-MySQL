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

				<!-- DataTables -->
				<div class="card mb-3">
					<?php if($_SESSION['session_var_user']->role == "admin") {?>
					<div class="card-header">
						
						<a href="<?php echo site_url('admin/users/add') ?>" ><i class="fas fa-plus"></i> Add New</a>
						
						</div>
					</div>
					<?php } ?>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead >
									<tr align="center">
										<th>Username</th>
										<th>Nama Lengkap</th>
										<td>Role</td>
										<td>Status</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody align="center">
									<?php
										$no = 1; 
										foreach ($users as $users):
											?>
									<tr>
										<td>
											<?php echo $users->username ?>
										</td>
										<td>
											<?php echo $users->full_name ?>
										</td>				
										<td>
											<?php echo $users->role ?>
										</td>	
										<td>
											<?php if($users->is_active == 1) { ?>
											<label name="isActive" value="<?php $users->is_active ?>">Aktif</label>
											<?php } else if($users->is_active == 0) {?>
											<label name="isActive" value="<?php $users->is_active ?>" style="color: red;">Tidak Aktif</label>
											<?php } ?>
										</td>		
										<td width=150>
											<a href="<?php echo site_url('admin/users/view/'.$users->user_id) ?>" class="btn btn-small text-primary" data-tooltip="Lihat" data-placement="top" style="padding: 0px; margin-right: 5px;"><i class="fas fa-eye fa-2x"></i></a>
											<?php if ($_SESSION['session_var_user']->username == "admin"){ ?>
											<?php if($users->is_active == 1) {?>
											<a onclick="disableConfirm('<?php echo site_url('admin/users/disable/'.$users->user_id) ?>')" href="#!" class="btn btn-small text-danger" data-tooltip="Matikan" data-placement="top" style="padding: 0px;"><i class="fas fa-toggle-off fa-2x"></i></a>
											<?php } else {?>
											<a onclick="enableConfirm('<?php echo site_url('admin/users/activate/'.$users->user_id) ?>')" href="#!" class="btn btn-small text-primary" data-tooltip="Aktifkan" data-placement="top" style="padding: 0px;"><i class="fas fa-toggle-on fa-2x"></i></a>
											<?php }}?>
										</td>													
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
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

	<script>
	function disableConfirm(url){
		$('#btn-disable').attr('href', url);
		$('#disableModal').modal();
	}
	</script>
	<script>
	function enableConfirm(url){
		$('#btn-enable').attr('href', url);
		$('#enableModal').modal();
	}
	</script>	
<!-- <script>
	$('#dataTables-example').dataTable( {
	  "columnDefs": [
	    { "orderable": false, "targets": 0 responsive: true,
           bPaginate: true,}
	  ]
	} );
	</script> -->

</body>

</html>
