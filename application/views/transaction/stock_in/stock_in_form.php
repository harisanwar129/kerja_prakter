<section class="content-header">
	<h1>Barang Masuk
	</h1>
	
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tambah Barang Masuk</h3>
			<div class="pull-right">
				<a href="<?= site_url('stock/in') ?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Kembali</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?= site_url('stock/process') ?>" method="post" autocomplete="off">
						<div class="form-group">
							<label for="date">Tanggal </label>
							<input type="date" name="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control" required>
						</div>
						<div>
							<label for="barcode">Kode Barang </label>
						</div>
						<div class="form-group input-group">
							<input type="hidden" name="item_id" id="item_id">
							<input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
							<span class="input-group-btn">
								<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
						<div class="form-group">
							<label for="item_name">Nama Item</label>
							<input type="text" name="item_name" id="item_name" value="-" class="form-control" readonly>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<label for="unit_name">Satuan</label>
									<input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
								</div>
								<div class="col-md-4">
									<label for="stock">Stock Awal</label>
									<input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="detail">Detail </label>
							<input type="text" name="detail" onkeypress="return hanyaHuruf(event);" id="detail" class="form-control" placeholder="ex. Kulakan / Tambahan / etc" required>

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
							<label for="supplier">Pemasok</label>
							<select  name="supplier" id="supplier" class="form-control" required>
								<option value="" >- Pilih -</option>
								<?php
								foreach ($supplier as $spl => $data) {
									echo '<option value="' . $data->supplier_id . '">' . $data->name . '</option>';
								} ?>
							</select>
						</div>
						<div class="form-group">
							<label for="qty">Jumlah *</label>
							<input type="number" min="1" name="qty" id="qty" min="1" class="form-control" required>
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

<div class="modal fade" id="modal-item">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Tambah Barang</h4>
			</div>
			<div class="modal-body table-responsive">
				<table id="table1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Kode Barang</th>
							<th>Nama</th>
							<th>Satuan</th>
							<th>Harga</th>
							<th>Persediaan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($item as $i => $data) { ?>
							<tr>
								<td><?= $data->barcode ?></td>
								<td><?= $data->name ?></td>
								<td><?= $data->unit_uname ?></td>
								<td><?= $data->price ?></td>
								<td><?= $data->stock ?></td>
								<td class="text-center">
									<button id="select" data-id="<?= $data->item_id ?>" data-barcode="<?= $data->barcode ?>" data-name="<?= $data->name ?>" data-unit="<?= $data->unit_uname ?>" data-stock="<?= $data->stock ?>" class="btn btn-xs btn-info">
										<i class="fa fa-check"></i> Select
									</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#supplier').select2();

		$(document).on('click', '#select', function() {
			var item_id = $(this).data('id');
			var barcode = $(this).data('barcode');
			var name = $(this).data('name');
			var unit_name = $(this).data('unit');
			var stock = $(this).data('stock');
			$('#item_id').val(item_id);
			$('#barcode').val(barcode);
			$('#item_name').val(name);
			$('#unit_name').val(unit_name);
			$('#stock').val(stock);
			$('#modal-item').modal('hide');
		});
	})
</script>