<section class="content-header">
	<h1>Satuan Barang
	</h1>
	

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Satuan Barang</h3>
			<div class="pull-right">
				<a href="<?= site_url('unit') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Kembali</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?= site_url('unit/process') ?>" method="post" autocomplete="off">
						<div class="form-group">
							<label for="name">Nama Satuan *</label>
							<input type="hidden" name="id" value="<?= $row->unit_id ?>">
							<input type="text" name="uname" id="name" value="<?= $row->uname ?>" class="form-control" required>
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="<?= $page ?>" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>