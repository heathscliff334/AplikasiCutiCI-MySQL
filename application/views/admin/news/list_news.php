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
					<?php 
					$roleUser = $_SESSION['session_var_user']->role;
					if($roleUser == "admin" || $roleUser == "koordinator" ) {?>
					<div class="card-header">
						
						<a href="<?php echo site_url('admin/news/add') ?>" ><i class="fas fa-plus"></i> Add New</a>
						
						</div>
					</div>
					<?php } ?>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
										<th>News & Event</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1; 
										foreach ($news as $news):
											?>
									<tr>
										<td>

											<div class="container-fluid">
												<div class="row">
													<div class="col-md-12" style="padding-left: 0px;">
														<a href="<?php echo site_url('admin/news/view/'.$news->news_id) ?>" class="btn btn-small" style="font-weight: bold; color: #4542f5; margin-left: 0px;"><?php echo $news->judul_news ?></a>
													</div>
													<div class="col-md-11">
														<?php echo substr($news->isi_news,0,200)?> .....
													</div>
													<div class="col-md-1">
														<!-- <a href="<?php echo site_url('admin/news/view/'.$news->news_id) ?>" class="btn btn-small"><i class="fas fa-eye"></i> Lihat</a> -->
														<?php if ($roleUser ==  "admin" || $roleUser == "koordinator"){ ?>
														<a href="<?php echo site_url('admin/news/edit/'.$news->news_id) ?>" class="btn btn-small text-success" data-tooltip="Edit" data-placement="top"><i class="fas fa-edit"></i> Edit</a>
														<a onclick="deleteConfirm('<?php echo site_url('admin/news/delete/'.$news->news_id) ?>')" href="#!" class="btn btn-small text-danger" data-tooltip="Hapus" data-placement="bottom"><i class="fas fa-trash"></i> Hapus</a> <?php }?>
													</div>
												</div>
											</div>
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
