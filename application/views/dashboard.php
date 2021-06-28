<?php if ($this->session->userdata('level') == 2) { ?>

	<section class="content-header">
		<h1>Profil
			<small>Profil Pengguna</small>
		</h1>

	</section>
	<div class="row">
		<div class="col-lg-9">
			<p style="font-size: 50px; margin-left:35%; margin-top:20px">Selamat Datang <?= $this->fungsi->user_login()->name ?> </p>
		</div>
	</div>

	<section class="content">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data Pengguna System</h3>

			</div>
			<div class="box-body table-responsive">
				<table id="table1" class="table table-bordered table-striped">
					<thead>
						<tr>

							<th style="text-align: center;">Foto</th>
							<th style="text-align: center;">Nama</th>
							<th style="text-align: center;">Nama Pengguna</th>
							<th style="text-align: center;">Alamat</th>
							<!-- <th style="text-align: center;">Diubah pada</th> -->
						</tr>
					</thead>
					<tbody>
						<tr>



							<td><a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img style="border-radius:100%; margin-left:35%;text-align:center;" src="<?= base_url() ?>assets/dist/img/user.png" class="user-image">
								</a></td>
							<td style="font-size:20px;text-align:center;line-height: 120px;"> <?= $this->fungsi->user_login()->name ?></td>
							<td style="font-size:20px;text-align:center;line-height: 120px;"><?= $this->fungsi->user_login()->username ?></td>
						<td style="font-size:20px;text-align:center;line-height: 120px;"><?= $this->fungsi->user_login()->address?></td>
							<!-- <td style="font-size:20px;line-height: 120px;"><?= $this->fungsi->user_login()->updated ?></td>  -->
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>








<?php } ?>


<?php if ($this->session->userdata('level') == 1) { ?>
	<section class="content-header">
		<h1>Beranda
			<small>Antar Muka</small>
		</h1>
		<ol class="breadcrumb">
			<li><a><i class="fa fa-dashboard"></i></a></li>
			<li class="active">Beranda</li>
		</ol>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="ion ion-bag"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Items</span>
						<span class="info-box-number"><?= $this->fungsi->count_item() ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Suppliers</span>
						<span class="info-box-number"><?= $this->fungsi->count_supplier() ?></span>
					</div>
				</div>
			</div>

			<div class="clearfix visible-sm-block"></div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Customers</span>
						<span class="info-box-number"><?= $this->fungsi->count_customer() ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Users</span>
						<span class="info-box-number"><?= $this->fungsi->count_user() ?></span>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
		
			<div class="col-md-12">
				
						<!-- <h3 class="box-title">Akun Pengguna</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-sm" data-widget="collapse">
								<i class="fa fa-minus">
								</i> -->
								<section class="content">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title">Data Pengguna System</h3>

										</div>
										<div class="box-body table-responsive">
											<table id="table1" class="table table-bordered table-striped">
												<thead>
													<tr>

														<th style="text-align: center;">Foto</th>
														<th style="text-align: center;">Nama</th>
														<th style="text-align: center;">Nama Pengguna</th>
														<th style="text-align: center;">Alamat</th>
														<!-- <th style="text-align: center;">Diubah pada</th> -->
													</tr>
												</thead>
												<tbody>
													<tr>



														<td><a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<img style="border-radius:100%;text-align:center; margin-left:10%;" src="<?= base_url() ?>assets/dist/img/user.png" class="user-image">
															</a></td>
														<td style="font-size:20px;text-align:center;line-height: 120px;"> <?= $this->fungsi->user_login()->name ?></td>
														<td style="font-size:20px;text-align:center;line-height: 120px;"><?= $this->fungsi->user_login()->username ?></td>
														<td style="font-size:20px;text-align:center;line-height: 120px;"><?= $this->fungsi->user_login()->address ?></td>
														<!-- <td style="font-size:20px;line-height: 120px;"><?= $this->fungsi->user_login()->updated ?></td> -->
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</section>

							</button>
				
		
	</section>

	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/morris.js/morris.css">
	<script src="<?= base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>

	<script>
		Morris.Bar({
			element: 'hero-bar',

			xkey: 'item',
			ykeys: ['sold'],
			labels: ['Sold'],
			barRatio: 0.4,
			xLabelAngle: 35,
			hideHover: 'auto'
		});
	</script>
<?php } ?>