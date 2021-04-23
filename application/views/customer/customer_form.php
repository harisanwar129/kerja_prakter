<section class="content-header">
	<h1><?= ucwords($title) ?>
		<small>Pelanggan</small>
	</h1>
	<ol class="breadcrumb">
		<li><a><i class="fa fa-dashboard"></i></a></li>
		<li class="active"><?= ucwords($title) ?></li>
	</ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?= ucfirst($page) ?> Pelanggan</h3>
			<div class="pull-right">
				<a href="<?= site_url('customer') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?= site_url('customer/process') ?>" method="post" autocomplete="off">
						<div class="form-group">
							<label for="name">Nama Pelanggan *</label>
							<input type="hidden" name="id" value="<?= $row->customer_id ?>">
							<input type="text" name="name" id="name" value="<?= $row->name ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="gender">Jenis Kelamin *</label>
							<select name="gender" id="gender" class="form-control" required>
								<option value="">- Pilih -</option>
								<option value="Laki-laki" <?= $row->gender == 'Laki-laki' ? 'selected' : null ?>>Laki-laki</option>
								<option value="Perempuan" <?= $row->gender == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="phone">No Telepon *</label>
							<input type="number" name="phone" id="phone" value="<?= $row->phone ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="address">Alamat *</label>
							<textarea name="addr" id="address" class="form-control" required><?= $row->address ?></textarea>
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="<?= $page ?>" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>