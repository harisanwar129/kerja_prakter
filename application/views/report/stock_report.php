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
                                        <label class="col-sm-3 control-label">Customer</label>
                                        <div class="col-sm-9">
                                            <select name="customer" id="customer" class="form-control">
                                                <option value="">- All -</option>
                                                <option value="null" <?= @$post['category'] == 'null' ? 'selected' : null ?>>Umum</option>
                                                <?php foreach ($category as $cst => $data) { ?>
                                                    <option value="<?= $data->category_id ?>" <?= @$post['category'] == $data->category_id ? 'selected' : null ?>><?= $data->cname ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Invoice</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="invoice" value="<?= @$post['invoice'] ?>" class="form-control">
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
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Stock</th>
                                <th>Harga</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1;
                            foreach ($row->result() as $r => $data) { ?>
                                <tr>
                                    <td width="35px"><?= $no++ ?>.</td>
                                    <td><?= $data->barcode ?></td>
                                    <td><?= $data->name ?></td>
                                    <td><?= $data->cname ?></td>
                                    <td><?= $data->uname ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td><?= $data->price ?></td>
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
                            <th style="width:20%">Invoice</th>
                            <td style="width:30%"><span id="invoice"></span></td>
                            <th style="width:20%">Customer</th>
                            <td style="width:30%"><span id="cust"></span></td>
                        </tr>
                        <tr>
                            <th>Date Time</th>
                            <td><span id="datetime"></span></td>
                            <th>Cashier</th>
                            <td><span id="cashier"></span></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><span id="total"></alspan>
                            </td>
                            <th>Cash</th>
                            <td><span id="cash"></span></td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><span id="discount"></span></td>
                            <th>Change</th>
                            <td><span id="change"></span></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td><span id="grandtotal"></span></td>
                            <th>Note</th>
                            <td><span id="note"></span></td>
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

<!-- <script>
    $(document).ready(function() {
        $('#customer').select2()

        $('#date1, #date2').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        })

        $(document).on('click', '#dtl', function() {
            $('#invoice').text($(this).data('invoice'));
            $('#datetime').text($(this).data("date") + ' ' + $(this).data('time'));
            $('#cust').text($(this).data('category'));
            $('#total').text($(this).data('total'));
            $('#discount').text($(this).data('discount'));
            $('#grandtotal').text($(this).data('grandtotal'));
            $('#cash').text($(this).data('cash'));
            $('#change').text($(this).data('change'));
            $('#note').text($(this).data('note'));
            $('#cashier').text($(this).data('cashier'));

            var product = '<table class="table no-margin"><tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>';
            $.getJSON('<?= site_url('report/sale_product/') ?>' + $(this).data('saleid'), function(data) {
                $.each(data, function(key, val) {
                    product += '<tr><td style="width:30%">' + val.name + '</td><td>' + val.price + '</td><td style="width:10%">' + val.qty + '</td><td>' + val.discount_item + '</td><td>' + val.total + '</td></tr>';
                });
                product += '</table>';
                $('#product').html(product);
            });
        })
    })
</script> -->