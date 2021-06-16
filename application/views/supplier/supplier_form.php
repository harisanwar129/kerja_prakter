<section class="content-header">
	<h1>Pemasok
		<small>Pemasok Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a><i class="fa fa-dashboard"></i></a></li>
		<li class="active"><?= ucwords($title) ?></li>
	</ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">

			<div class="pull-right">
				<a href="<?= site_url('supplier') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> kembali</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?= site_url('supplier/process') ?>" method="post" autocomplete="off">
						<div class="form-group">
							<label for="name">Nama Pemasok *</label>
							<input type="hidden" name="id" value="<?= $row->supplier_id ?>">
							<input type="text" name="name" id="name" value="<?= $row->name ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="phone">No Telephon *</label>
							<input type="number" name="phone" id="phone" value="<?= $row->phone ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="address">Alamat *</label>
							<textarea name="addr" id="address" class="form-control" required><?= $row->address ?></textarea>
						</div>
						<div class="form-group">
							<label for="desc">Deskripsi</label>
							<textarea name="desc" id="desc" class="form-control" required><?= $row->description ?></textarea>
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="<?= $page ?>" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
							<button type="reset" class="btn btn-flat">Ulangi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>