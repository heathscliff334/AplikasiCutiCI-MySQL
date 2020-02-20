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
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-2">
									<a href="<?php echo site_url('admin/cuti/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
								</div>
								<div class="col-md-10" align="right">
									<a href="<?php echo site_url('admin/cuti/cetak/'.$cuti->cuti_id) ?>" class="btn btn-info" style="border-radius: 6px; padding:5px; font-size: 15px"><i class="fas fa-print"></i> Print</a>
								</div>
							</div>
							
						</div>
						
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/cuti/tolak/") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $cuti->cuti_id?>" />

							<div class="form-group">
								<label for="lama_cuti">Nama Lengkap</label>
								<input class="form-control"
								 type="text" value="<?php echo $cuti->full_name ?>"  readonly="true" style="text-transform: uppercase;"/>
							</div>	
							<div class="form-group">
								<label for="jenis_cuti">Jenis Cuti</label>
								 <input class="form-control" type="textarea" name="jenisCuti" readonly="true" value="<?php echo $cuti->jenis_cuti ?>" style="text-transform: uppercase;">
							</div>

							<?php if($cuti->lama_cuti != 0) {?>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="mulai_cuti">Mulai</label>
									<input class="form-control" type="text" name="mulaiCuti" value="<?php echo $cuti->mulai_cuti ?>" readonly="true" >
								</div>
								<div class="col-md-6">
									<label for="sampai_cuti">Sampai</label>
									<input class="form-control" type="text" name="sampaiCuti" value="<?php echo $cuti->sampai_cuti ?>" readonly="true">
								</div>
							</div>
							<div class="form-group">
								<label for="lama_cuti">Lama (Jam)</label>
								<input class="form-control <?php echo form_error('lama_cuti') ? 'is-invalid':'' ?>"
								 type="number" min="0" name="lama_cuti" placeholder="Lama Cuti" value="<?php echo $cuti->lama_cuti ?>"readonly="true" />
								<div class="invalid-feedback">
									<?php echo form_error('lama_cuti') ?>
								</div>
							</div>
						<?php } else if($cuti->lama_hari != 0) {?>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="mulai_cuti">Mulai</label>
									<input class="form-control" type="text" name="mulaiCuti" value="<?php echo date("Y-m-d",strtotime($cuti->mulai_cuti)) ?>" readonly="true" >
								</div>
								<div class="col-md-6">
									<label for="sampai_cuti">Sampai</label>
									<input class="form-control" type="text" name="sampaiCuti" value="<?php echo date("Y-m-d",strtotime($cuti->sampai_cuti)) ?>" readonly="true">
								</div>
							</div>
							<div class="form-group">
								<label for="lama_hari">Lama (Hari)</label>
								<input class="form-control <?php echo form_error('lama_hari') ? 'is-invalid':'' ?>"
								 type="number" min="0" name="lama_hari" placeholder="Lama Cuti" value="<?php echo $cuti->lama_hari ?>"readonly="true" />
								<div class="invalid-feedback">
									<?php echo form_error('lama_hari') ?>
								</div>
							</div>
							<?php } ?>

							<div class="form-group">
								<label for="name">Keterangan</label>
								<textarea class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
								 name="keterangan" placeholder="Product description..." readonly="true" style="text-transform: uppercase;"><?php echo $cuti->keterangan_cuti ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('keterangan') ?>
								</div>
							</div>
							<div class="form-group">
								<img src="<?php echo base_url('upload/cuti/'.$cuti->photo) ?>" width="64" id="myImg" alt="<?php echo $cuti->photo ?>"/>
								<!-- The Modal -->
								<div id="myModalImg" class="modalImg">
								  <span class="close">&times;</span>
								  <img class="modal-content-img" id="img01">
								  <div id="caption"></div>
								</div>
								<!-- untuk menyimpan nama photo -->
								<input type="hidden" name="old_image" value="<?php echo $cuti->photo ?>" />
							</div>
							<div class="form-group">
								<label>Status</label>
								<ul>
									<table>
										<?php if($cuti->role == "staff") { ?>
										<tr>
											<td width="100">Kep. Bagian</td>
											<td width="30">:</td>
											<td><?php if ($cuti->acc_spv == 0) {
												echo 'Pending';
											} elseif ($cuti->acc_spv == 1) {
												echo '<font class="text-primary">Diterima</font>';
											} elseif ($cuti->acc_spv == 3) {
												echo '<font class="text-danger">Ditolak</font>';
											}?></td>
										</tr>
										<tr>
											<td>Koordinator</td>
											<td>:</td>
											<td><?php if ($cuti->acc_koor == 0) {
												echo 'Pending';
											} elseif ($cuti->acc_koor == 1) {
												echo '<font class="text-primary">Diterima</font>';
											} elseif ($cuti->acc_koor == 3) {
												echo '<font class="text-danger">Ditolak</font>';
											}?></td>
										</tr>
										<?php } else if ($cuti->role != "staff") {?>
<!-- 										<tr>
											<td>Koordinator</td>
											<td>:</td>
											<td><?php if ($cuti->acc_koor == 0) {
												echo 'Pending';
											} elseif ($cuti->acc_koor == 1) {
												echo '<font class="text-primary">Diterima</font>';
											} elseif ($cuti->acc_koor == 3) {
												echo '<font class="text-danger">Ditolak</font>';
											}?></td>
										</tr> -->
										<tr>
											<td>Pimpinan</td>
											<td>:</td>
											<td><?php if ($cuti->acc_pimp == 0) {
												echo 'Pending';
											} elseif ($cuti->acc_pimp == 1) {
												echo '<font class="text-primary">Diterima</font>';
											} elseif ($cuti->acc_pimp == 3) {
												echo '<font class="text-danger">Ditolak</font>';
											}?></td>
										</tr>
									<?php }?>
									</table>
								</ul>
							</div>
							<?php if($_SESSION['session_var_user']->role != "staff") {?>
							<div class="form-group">
								<label for="komen_cuti">Comment</label>
								<textarea class="form-control <?php echo form_error('komen_cuti') ? 'is-invalid':'' ?>"
								 name="komen_cuti" placeholder="Isi comment jika izin cuti ditolak..." ><?php echo $cuti->komen ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('komen_cuti') ?>
								</div>
							</div>				
							<!-- <input class="btn btn-success" type="submit" name="btn" value="Save" /> -->

							<?php if($cuti->acc_spv != 3) {?>
							<a href="<?php echo site_url('admin/cuti/terima/'.$cuti->cuti_id) ?>"
											 class="btn btn-small btn-success" data-tooltip="Lihat" data-placement="top" ><i class="fas fa-check"> Terima</i></a>
							
<!-- 							<a href="<?php echo site_url('admin/cuti/tolak/'.$cuti->cuti_id) ?>"
											 class="btn btn-small btn-danger" data-tooltip="Lihat" data-placement="top"><i class="fas fa-times"> Tolak</i></a> -->
							<button class="btn btn-danger" style ="font-weight: bold;"><i class="fas fa-times"></i> Tolak</button>
							<?php } } ?>
						</form>

					</div>

					<div class="card-footer small text-muted">
						Tgl Pengajuan : <b><?php echo $cuti->created_at ?></b>
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
