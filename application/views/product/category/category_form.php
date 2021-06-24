<section class="content-header">
	<h1>Kategori Barang
	</h1>
	
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			
			<div class="pull-right">
				<a href="<?= site_url('category') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Kembali</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?= site_url('category/process') ?>" method="post" autocomplete="off">
						<div class="form-group">
							<label for="name">Nama Kategori *</label>
							<input type="hidden" name="id" value="<?= $row->category_id ?>">
							<input type="text" name="cname" onkeypress="return hanyaHuruf(event);" id="name" value="<?= $row->cname ?>" class="form-control" required>
							<script>
							function hanyaHuruf(evt){
								var charCode = (evt.which) ? evt.which : event.keyCode
								 if(charCode > 31 && (charCode < 48 || charCode >57))
								return true;
								return false;
							}
							</script>
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