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
            <h3 class="box-title">Data Stock Out</h3>
            <div class="pull-right">
                <a href="<?=site_url('stock/out/add')?>" class="btn btn-flat btn-primary">
                    <i class="fa fa-plus"></i> Add Stock Out
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Product Item</th>
                        <th>Qty</th>
                        <th>Detail</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $r => $data) { ?>
                        <tr>
                            <td width="35px"><?=$no++?>.</td>
                            <td><?=$data->barcode?></td>
                            <td><?=$data->name?></td>
                            <td class="text-right"><?=$data->qty?></td>
                            <td><?=$data->detail?></td>
                            <td class="text-center"><?=indo_date($data->date)?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('stock/out/del/'.$data->item_id.'/'.$data->stock_id)?>" onclick="return confirm('Apakah Anda yakin?')"  class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>