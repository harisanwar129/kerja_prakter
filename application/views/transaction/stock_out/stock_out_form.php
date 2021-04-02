<section class="content-header">
    <h1><?=ucwords($title)?>
        <small>Barang Keluar</small>
    </h1>
    <ol class="breadcrumb">
		<li><a><i class="fa fa-dashboard"></i></a></li>
        <li><a>Transaction</a></li>
        <li class="active"><?=ucwords($title)?></li>
    </ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Add Stock Out</h3>
			<div class="pull-right">
				<a href="<?=site_url('stock/out')?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form action="<?=site_url('stock/process')?>" method="post" autocomplete="off">
						<div class="form-group">
							<label for="date">Date *</label>
							<input type="date" name="date" id="date" value="<?=date('Y-m-d')?>" class="form-control" required>
						</div>
						<div>
							<label for="barcode">Barcode *</label>
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
							<label for="item_name">Item Name</label>
							<input type="text" name="item_name" id="item_name" value="-" class="form-control" readonly>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<label for="unit_name">Item Unit</label>
									<input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
								</div>
								<div class="col-md-4">
									<label for="stock">Initial Stock</label>
									<input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="detail">Detail *</label>
							<input type="text" name="detail" id="detail" class="form-control" placeholder="ex. Hilang / Rusak / Kedaluwarsa / etc" required>
						</div>
						<div class="form-group">
							<label for="qty">Qty *</label>
							<input type="number" name="qty" id="qty" min="1" class="form-control" required>
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="<?=$page?>" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Save</button> 
							<button type="reset" class="btn btn-flat">Reset</button>
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
				<h4 class="modal-title">Add Product Item</h4>
			</div>
			<div class="modal-body table-responsive">
				<table id="table1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Barcode</th>
							<th>Name</th>
							<th>Unit</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($item as $i => $data) { ?>
							<tr>
								<td><?=$data->barcode?></td>
								<td><?=$data->name?></td>
								<td><?=$data->unit_name?></td>
								<td><?=$data->price?></td>
								<td><?=$data->stock?></td>
								<td class="text-center">
									<button id="select" 
									data-id="<?=$data->item_id?>" 
									data-barcode="<?=$data->barcode?>" 
									data-name="<?=$data->name?>" 
									data-unit="<?=$data->unit_name?>" 
									data-stock="<?=$data->stock?>" 
									class="btn btn-xs btn-info">
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
	$(document).on('click', '#select', function() {
		var item_id = $(this).data('id');
		var barcode = $(this).data('barcode');
		var name = $(this).data('name');
		var unit_name = $(this).data('unit');
		var stock = $(this).data("stock");
		$('#item_id').val(item_id);
		$('#barcode').val(barcode);
		$('#item_name').val(name);
		$('#unit_name').val(unit_name);
		$('#stock').val(stock);
		$('#modal-item').modal('hide');
	});
})
</script>