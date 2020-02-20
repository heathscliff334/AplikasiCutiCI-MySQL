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
					<div class="card-header">
						<a href="<?php echo site_url('admin/cuti/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover table-striped" id="dataTables" width="100%" cellspacing="0" >
								<thead>
									<tr>
										<th>Nama Lengkap</th>
										<th>Jenis Cuti</th>
										<th>Image</th>
										<th>Keterangan</th>
										<th>Mulai</th>
										<th>Sampai</th>
										<th>Lama</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1; 
										foreach ($cuti as $cuti):
											?>
									<tr>
										<td style="text-transform: uppercase;" width="150">
											<?php echo $cuti->full_name ?>
										</td>
										<td style="text-transform: uppercase;" >
											<?php echo $cuti->jenis_cuti ?>
										</td>
										<td>
											<div class="click-zoom">
											  <label>
											    <input type="checkbox">
													<img src="<?php echo base_url('upload/cuti/'.$cuti->photo) ?>" width="52" id="myImg" alt="<?php echo $cuti->photo ?>"/>
											  </label>
											</div>	

										</td>
										<td style="text-transform: uppercase;">
											<?php echo substr($cuti->keterangan_cuti, 0, 20) ?>...
										</td>
										<td>
											<?php echo date("Y-m-d",strtotime($cuti->mulai_cuti)) ?>
										</td>
										<td>
											<?php echo date("Y-m-d",strtotime($cuti->sampai_cuti)) ?>
										</td>		
										<td>
											<?php 
												if($cuti->lama_cuti != 0){
													echo $cuti->lama_cuti.' JAM';
												} else if($cuti->lama_hari !=0){
													echo $cuti->lama_hari.' HARI';
												}
											?>
										</td>							
										<td style="text-transform: uppercase;">
											<?php 
											if($cuti->role == "spv"){
												if($cuti->acc_pimp == 3)
												{
													echo '<b><font color="red">Ditolak</font></b>';
												} else if($cuti->acc_pimp == 0)
												{
													echo 'Menunggu';
												} else if ($cuti->acc_pimp == 1) 
												{
													echo '<b><font color="blue">Diterima</font></b>';
												}
											} else {
												if ($cuti->acc_spv == 3 || $cuti->acc_koor == 3)
												{ echo '<b><font color="red">Ditolak</font></b>'; } else if (($cuti->acc_spv == 1 && $cuti->acc_koor == 0) || ($cuti->acc_spv == 0 && $cuti->acc_koor == 0))
												{ echo 'Menunggu'; } else if ($cuti->acc_spv == 1 && $cuti->acc_koor == 1)
												{ echo '<b><font color="blue">Diterima</font></b>';}
											}
											?>
										</td>
										<td align="center">
											<a href="<?php echo site_url('admin/cuti/view/'.$cuti->cuti_id) ?>"
											 class="btn btn-small" data-tooltip="Lihat" data-placement="top"><i class="fas fa-eye"></i></a>
											 <?php if ($_SESSION['session_var_user']->username == "admin"){ ?>
											<a onclick="deleteConfirm('<?php echo site_url('admin/cuti/delete/'.$cuti->cuti_id) ?>')"
											 href="#!" class="btn btn-small text-danger" data-tooltip="Hapus" data-placement="bottom"><i class="fas fa-trash"></i></a> <?php }?>
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
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>

</body>

</html>
