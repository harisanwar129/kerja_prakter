<section class="content-header">
	<h1>Data Barang
	</h1>

</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tambah Barang</h3>
			<div class="pull-right">
				<a href="<?= site_url('item') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i>Kembali</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?= site_url('item/process') ?>" method="post" autocomplete="off">
						<div class="form-group">
							<label for="barcode">Kode Barang *</label>
							<input type="hidden" name="id" value="<?= $row->item_id ?>">
							<input type="text" name="barcode" id="barcode" value="<?= $row->barcode ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="name">Nama Produk *</label>
							<input type="text" name="name" onkeypress="return hanyaHuruf(event);" id="name" value="<?= $row->name ?>" class="form-control" required>
							<script>
							function hanyaHuruf(evt){
								var charCode = (evt.which) ? evt.which : event.keyCode
								 if(charCode > 31 && (charCode < 48 || charCode >57))
								return true;
								return false;
							}
							</script>
						</div>
						<div class="form-group">
							<label for="category">Kategori *</label>
							<?php
							echo form_dropdown('category', $category, $selectedcategory, ['class' => 'form-control', 'id' => 'category', 'required' => 'required']);
							?>
						</div>
						<div class="form-group">
							<label for="unit">Satuan *</label>
							<?php
							echo form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'id' => 'unit', 'required' => 'required']);
							?>
						</div>
						<div class="form-group">
							<label for="price">Harga *</label>
							<input type="number" min="1" name="price" id="price" value="<?= $row->price ?>" class="form-control" required>
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