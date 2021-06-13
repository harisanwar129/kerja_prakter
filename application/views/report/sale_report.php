<section class="content-header">
    <h1>Bukti Penjualan
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Laporan Penjualan</li>
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
                    <form action="<?= site_url('report/sale') ?>" method="post">
                        <div class="row">
                        <div class="col-md-4">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="date1" id="date1" value="<?= @$post['date1'] ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
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
                                        <label class="col-sm-3 control-label">Nota</label>
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
                                        Ulangi
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
                                <th>Nota</th>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Potongan Harga</th>
                                <th>Grand Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
    if($row->num_rows() > 0) {
    foreach ($row->result() as $r => $data) { ?>
        <tr>
            <td width="35px"><?=$no++?>.</td>
            <td><?=$data->invoice?></td>
            <td><?=indo_date($data->date)?></td>
            <td><?=$data->customer_id == null ? "Umum" : $data->customer_name?></td>
            <td class="text-right"><?=indo_currency($data->total_price)?></td>
            <td class="text-right"><?=indo_currency($data->discount)?></td>
            <td class="text-right"><?=indo_currency($data->final_price)?></td>
            <td class="text-center" width="200px">
                <!-- <button id="dtl" data-toggle="modal" data-target="#modal-detail"
                    data-invoice="<?=$data->invoice?>" 
                    data-date="<?=indo_date($data->date)?>" 
                    data-time="<?=substr($data->sale_created, 11, 5)?>"
                    data-customer="<?=$data->customer_id == null ? "Umum" : $data->customer_name?>"
                    data-total="<?=indo_currency($data->total_price)?>"
                    data-discount="<?=indo_currency($data->discount)?>"
                    data-grandtotal="<?=indo_currency($data->final_price)?>"
                    data-cash="<?=indo_currency($data->cash)?>"
                    data-change="<?=indo_currency($data->change)?>"
                    data-note="<?=$data->note?>"
                    data-cashier="<?=ucfirst($data->user_name)?>" 
                    data-saleid="<?=$data->sale_id?>"
                    class="btn btn-xs btn-default">
                    <i class="fa fa-eye"></i> Details
                </button>  -->
                <a href="<?=site_url('sale/cetak/'.$data->sale_id)?>" target="_blank" class="btn btn-xs btn-info">
                    <i class="fa fa-print"></i> Print
                </a> 
                <a href="<?=site_url('sale/del/'.$data->sale_id)?>" onclick="return confirm('Apakah Anda yakin?')"  class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i> Delete
                </a>
            </td>
        </tr>
    <?php }
    } else {
        echo '<tr><td colspan="8" align="center">Data tidak ditemukan</td></tr>';
    } ?>
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

<script>
    $(document).ready(function() {
        $('#customer').select2()

        $('#date1, #date2').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        })

        $(document).on('click', '#dtl', function() {
            $('#invoice').text($(this).data('invoice'));
            $('#datetime').text($(this).data("date") + ' ' + $(this).data('time'));
            $('#cust').text($(this).data('customer'));
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
</script>