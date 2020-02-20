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
						<a href="<?php echo site_url('admin/cuti/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/cuti/add') ?>" method="post" enctype="multipart/form-data" >
<!-- 							<p align="right"><?php $now = new DateTime();
									    // MySQL datetime format
									echo '<p class="alert alert-info" align="right">'.$now->format('Y-m-d').'</p>';

									//echo $now->getTimestamp();?>
										
									</p> -->
							<input type="hidden" name="userId" value="<?php echo $_SESSION['session_var_user']->user_id ?>" />	

							<div class="form-group">
								<label for="lama_cuti">Nama Lengkap</label>
								<input class="form-control"
								 type="text" value="<?php echo $_SESSION['session_var_user']->full_name ?>"  readonly="true" style="text-transform: uppercase;"/>
							</div>	
							<div class="form-group">
								<label for="jeniscuti">Jenis Cuti*</label>
								
								<select class="form-control" name="jenisCuti" />
									<option value="permisi" name="jenisCuti">---PILIH---</option> <!-- default -->
								 	<option value="permisi" name="jenisCuti">PERMISI</option>
								 	<option value="tahunan" name="jenisCuti">TAHUNAN</option>
								 	<option value="sakit" name="jenisCuti">SAKIT</option>
								 </select>
							</div>
							<div class="form-group radio-inline">
								<div class="col-md-2">
									<input type="radio" class="radioBtn radio" name="Radio" id="RadioJam" value="JAM" required checked onclick="jamClicked()">
									<label for="RadioJam">Jam</label>
								</div>
								<div class="col-md-2">
									<input class="radioBtn" type="radio" name="Radio" id="RadioHarian" value="HARIAN" required onclick="hariClicked()">
									<label for="RadioHarian">Harian</label>
								</div>
								
							</div>
							<div class="form-group row rdJam" style="display: none;">
								<div class="col-md-6">

									<label for="mulai_cuti">Mulai*</label>
									<input class="form-control" type="datetime-local" name="mulaiCuti" id="mulaiCutiJam">
								</div>
								<div class="col-md-6">
									<label for="sampai_cuti">Sampai*</label>
									<input class="form-control" type="datetime-local" name="sampaiCuti" id="sampaiCutiJam" data-date="" data-date-format="YYYY MMMM DD" value="<?php echo date('Y-m-d H:i:s:a'); ?>">
								</div>
							</div>
							<div class="form-group row rdHarian" style="display: none;">
								<div class="col-md-6">

									<label for="mulai_cuti">Mulai*</label>
									<input class="form-control" type="date" name="mulaiCutiHari" id="mulaiCutiHari" >
								</div>
								<div class="col-md-6">
									<label for="sampai_cuti">Sampai*</label>

									<input class="form-control" type="date" name="sampaiCutiHari" id="sampaiCutiHari">
								</div>
							</div>
							<div class="form-group"style="display: none;">
								<label for="lama_cuti">Lama (Jam)*</label>
								<input class="form-control" type="hidden" min="0" name="lama_cuti" value="1" id="lamaJamCuti"/>
							</div>
							<div class="form-group" style="display: none;">
								<label for="lama_hari">Lama (Hari)*</label>
								<input class="form-control" type="hidden" min="0" name="lama_hari" value="0" id="lamaHariCuti"/>
							</div>
							<div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>							
							<div class="form-group">
								<label for="name">Keterangan</label>
								<textarea style="text-transform: uppercase;" class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
								 name="keterangan" placeholder="Keterangan Cuti..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('keterangan') ?>
								</div>
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
		<script>
			$('input[type="radio"]').click(function(){
			        if($(this).attr("value")=="JAM"){
			            $(".rdHarian").hide('slow');
			            $(".rdJam").show('slow');
			        }
			        if($(this).attr("value")=="HARIAN"){
			            $(".rdHarian").show('slow');
			            $(".rdJam").hide('slow');

			        }        
			    });
			$('input[type="radio"]').trigger('click');
		</script>
		<script>
			function jamClicked(){
				var btnJamMulai = document.getElementById("mulaiCutiJam");
				var btnJamSampai = document.getElementById("sampaiCutiJam");
				var lamaJam = document.getElementById("lamaJamCuti");
				
				btnJamMulai.setAttribute('name','mulaiCuti');
				btnJamSampai.setAttribute('name','sampaiCuti');
				lamaJam.setAttribute('value',"1");

				var btnHariMulai = document.getElementById("mulaiCutiHari");
				var btnHariSampai = document.getElementById("sampaiCutiHari");
				var lamaHari = document.getElementById("lamaHariCuti");
				btnHariMulai.setAttribute('name','mulaiCutiHari');
				btnHariSampai.setAttribute('name','sampaiCutiHari');
				lamaHari.setAttribute('value',"0");
			}
			function hariClicked(){
				var btnHariMulai = document.getElementById("mulaiCutiHari");
				var btnHariSampai = document.getElementById("sampaiCutiHari");
				btnHariMulai.setAttribute('name','mulaiCuti');
				btnHariSampai.setAttribute('name','sampaiCuti');
				var lamaHari = document.getElementById("lamaHariCuti");
				lamaHari.setAttribute('value',"1");

				var btnJamMulai = document.getElementById("mulaiCutiJam");
				var btnJamSampai = document.getElementById("sampaiCutiJam");
				btnJamMulai.setAttribute('name','mulaiCutiJam');
				btnJamSampai.setAttribute('name','sampaiCutiJam');
				var lamaJam = document.getElementById("lamaJamCuti");
				lamaJam.setAttribute('value',"0");
			}
		</script>

</body>

</html>
