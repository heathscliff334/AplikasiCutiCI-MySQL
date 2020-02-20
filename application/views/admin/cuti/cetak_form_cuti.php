<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

				<!-- Card  -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<p align="center" style="font-size:25px">PERMOHONAN CUTI</p>
				TGL	: <?php echo date("Y-m-d H:s",strtotime($cuti->created_at)) ?>
				<table class="" width="100%" border="2px" style="text-transform: uppercase;">
					<tbody align="center">
						<tr >
							<td width =160>USER ID : <?php echo $cuti->user_id ?></td>
							<td>NAMA : <?php echo $cuti->full_name ?></td>
							<td>JABT. : <?php echo $cuti->role ?></td>
						</tr>
						<tr>
							<td>JENIS CUTI</td>
							<td>KETERANGAN</td>
							<td>STATUS</td>
						</tr>
						<tr height="100">
							<td><?php echo $cuti->jenis_cuti ?></td>
							<td><?php echo $cuti->keterangan_cuti ?></td>
							<td>
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
						</tr>
						<tr>
							<td>MULAI TGL / JAM :</td>
							<?php
							if($cuti->lama_hari == 0){
								echo '<td>'.$cuti->mulai_cuti.'</td>';
								echo '<td rowspan="2">JUMLAH : '.$cuti->lama_cuti.' JAM</td>';
							} else if($cuti->lama_cuti == 0){
								echo '<td>'.date("Y-m-d",strtotime($cuti->mulai_cuti)).'</td>';
								echo '<td rowspan="2">JUMLAH : '.$cuti->lama_hari.' HARI</td>';
							}
							?>
						</tr>
						<tr>
							<?php 
							if($cuti->lama_hari == 0){
								echo '<td>SAMPAI TGL / JAM :</td>';
								echo '<td>'.$cuti->sampai_cuti.'</td>';
							}  else if($cuti->lama_cuti == 0){
								echo '<td>SAMPAI TGL / JAM :</td>';
								echo '<td>'.date("Y-m-d",strtotime($cuti->sampai_cuti)).'</td>';
							}	
							?>
						</tr>

					</tbody>							
				</table>

			</div>
			<div class="container-fluid">
				<div class="row" align="center" style="margin-top: 20px">
					<div class="col-md-2">PIMPINAN PERUSAHAAN</div>
					<div class="col-md-2">KOORDINATOR</div>
					<div class="col-md-2">KEP. BAGIAN</div>
					<div class="col-md-2">PEMOHON</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row" align="center" style="margin-top: 40px">
					<div class="col-md-2">(<?php echo $cuti->full_name ?>)</div>
					<div class="col-md-2">(<?php echo $cuti->full_name ?>)</div>
					<div class="col-md-2">(<?php echo $cuti->full_name ?>)</div>
					<div class="col-md-2">(<?php echo $cuti->full_name ?>)</div>
				</div>
			</div>			
		</div>
	</div>



		<!-- /#wrapper -->
		<?php $this->load->view("admin/_partials/modal.php") ?>

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>


</body>

</html>
