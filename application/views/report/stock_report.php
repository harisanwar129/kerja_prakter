<section class="content-header">
    <h1><?= ucwords($title) ?>
        <small>Laporan Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li><a>Reports</a></li>
        <li class="active"><?= ucwords($title) ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Filter Data</h3>
                </div>
                <div class="box-body">
                    <form action="<?= site_url('report/stock') ?>" method="post">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="date1" id="date1" value="<?= @$post['date1'] ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">s/d</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="date2" id="date2" value="<?= @$post['date2'] ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">category</label>
                                        <div class="col-sm-9">
                                            <select name="p_category" id="category" class="form-control">
                                                <option value="">- All -</option>
                                                <option value="null" <?= @$post['p_categor'] == 'null' ? 'selected' : null ?>>Umum</option>
                                                <?php foreach ($category as $cst => $data) { ?>
                                                    <option value="<?= $data->category_id ?>" <?= @$post['p_categor'] == $data->category_id ? 'selected' : null ?>><?= $data->cname ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="<?= @$post['name'] ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button type="submit" name="reset" class="btn btn-flat">
                                        Reset
                                    </button>
                                    <button type="submit" name="filter" class="btn btn-info btn-flat">
                                        <i class="fa fa-search"></i> Filter
                                    </button>
                                </div>
                            </div>
                            <div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Penjualan</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th class="text-right">No</th>
                                <th class="text-right">Barcode</th>
                                <th class="text-right">Nama Barang</th>
                                <th class="text-right">Satuan</th>
                                <th class="text-right">Kategori</th>
                                <th class="text-right">Stock</th>
                                <th class="text-right">Harga</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                            foreach ($row->result() as $r => $data) { ?>
                                <tr>
                                    <td width="35px"><?= $no++ ?>.</td>
                                    <td class="text-right"><?= $data->barcode ?></td>
                                    <td class="text-right"><?= $data->name ?></td>
                                    <td class="text-right"><?= $data->uname ?></td>
                                    <td><?= $data->category_id == null ? "Umum" : $data->category_cname ?></td>
                                    <td class="text-right"><?= $data->stock ?></td>
                                    <td class="text-right"><?= indo_currency($data->price) ?></td>
                                    <td class="text-center" width="200px">
                                        <button id="dtl" data-toggle="modal" data-target="#modal-detail" data-date="<?= indo_date($data->date) ?>" data-time="<?= substr($data->t_stock_qty, 11, 5) ?>" data-category="<?= $data->category_id == null ? "Umum" : $data->category_cname ?>" data-name="<?= $data->name ?>" data-uname="<?= $data->uname ?>" data-cname="<?= $data->cname ?>" data-qty="<?= $data->qty ?>" data-price="<?= indo_currency($data->price) ?>" class="btn btn-xs btn-default">
                                            <i class="fa fa-eye"></i> Details
                                        </button>
                                        <a href="<?= site_url('stock/cetak/' . $data->stock_id) ?>" target="_blank" class="btn btn-xs btn-info">
                                            <i class="fa fa-print"></i> Print
                                        </a>
                                        <a href="<?= site_url('stock/del/' . $data->stock_id) ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-xs btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <?php echo $pagination ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Sales Report Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:20%">name</th>
                            <td style="width:30%"><span id="name"></span></td>
                            <th style="width:20%">category</th>
                            <td style="width:30%"><span id="cust"></span></td>
                        </tr>

                        <tr>
                            <th>Total</th>
                            <td><span id="total"></alspan>
                            </td>
                            <th>Cash</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>uname</th>
                            <td><span id="uname"></span></td>
                            <th>price</th>
                            <td><span id="price"></span></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td><span id="cname"></span></td>

                        </tr>
                        <tr>
                            <th>Product</th>
                            <td colspan="3"><span id="product"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#category').select2()

        $('#date1, #date2').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        })

        $(document).on('click', '#dtl', function() {
            $('#name').text($(this).data('name'));

            $('#cust').text($(this).data('category'));
            $('#barcode').text($(this).data('barcode'));
            $('#uname').text($(this).data('uname'));
            $('#cname').text($(this).data('cname'));
            $('#qty').text($(this).data('qty'));
            $('#price').text($(this).data('price'));


            var product = '<table class="table no-margin"><tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>';
            $.getJSON('<?= site_url('report/sale_product/') ?>' + $(this).data('saleid'), function(data) {
                $.each(data, function(key, val) {
                    product += '<tr><td style="width:30%">' + val.name + '</td><td>' + val.price + '</td><td style="width:10%">' + val.qty + '</td><td>' + val.uname_item + '</td><td>' + val.total + '</td></tr>';
                });
                product += '</table>';
                $('#product').html(product);
            });
        })
    })
</script>