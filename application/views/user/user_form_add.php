<section class="content-header">
	<h1>Pengguna
	</h1>
	<ol class="breadcrumb">
		<li><a><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Pengguna</li>
	</ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tambah Pengguna</h3>
			<div class="pull-right">
				<a href="<?= site_url('user') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Kembali</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<?php // echo validation_errors() 
					?>
					<form action="" method="post" autocomplete="off">
						<div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
							<label for="name">Nama</label>
							<input type="text" name="name" onkeypress="return hanyaHuruf(event);" id="name" value="<?= set_value('name') ?>" class="form-control">
							<?= form_error('name') ?>
							<script type="text/javascript">
							function hanyaHuruf(evt){
								var charCode = (evt.which) ? evt.which : event.keyCode
								 if(charCode > 31 && (charCode < 48 || charCode >57))
								return true;
								return false;
							}
							</script>
						</div>
						<div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
							<label for="username">Nama Pengguna</label>
							<input type="text" name="username" id="username" value="<?= set_value('username') ?>" class="form-control">
							<?= form_error('username') ?>
						</div>
						<div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
							<label for="password">Kata Sandi</label>
							<input type="password" name="password" id="password" value="<?= set_value('password') ?>" class="form-control">
							<?= form_error('password') ?>
						</div>
						<div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
							<label for="passconf">Ulangi Kata sandi</label>
							<input type="password" name="passconf" id="passconf" value="<?= set_value('passconf') ?>" class="form-control">
							<?= form_error('passconf') ?>
						</div>
						<div class="form-group">
							<label for="address">Alamat</label>
							<textarea name="address" id="address" class="form-control" required><?= set_value('address') ?></textarea>
						</div>
						<div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
							<label for="level">Level *</label>
							<select name="level" id="level" class="form-control">
								<option value="">- Pilih -</option>
								<option value="1" <?= set_value('level') == 1 ? 'selected' : null ?>>Admin</option>
								<option value="2" <?= set_value('level') == 2 ? 'selected' : null ?>>Kasir</option>
							</select>
							<?= form_error('level') ?>
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="add" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
							<button type="reset" class="btn btn-flat">Ulangi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>