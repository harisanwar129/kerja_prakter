<section class="content-header">
    <h1>
        Barang Masuk
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Barang Masuk</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Barang Masuk</h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/in/add') ?>" class="btn btn-flat btn-primary">
                    <i class="fa fa-plus"></i> Tambah barang masuk
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $r => $data) { ?>
                        <tr>
                            <td width="35px"><?= $no++ ?>.</td>
                            <td><?= $data->barcode ?></td>
                            <td><?= $data->item_name ?></td>
                            <td class="text-center"><?= $data->qty ?></td>
                            <td class="text-center"><?= indo_date($data->date) ?></td>
                            <td class="text-center" width="160px">


                                <a href="<?= site_url('stock/in/del/' . $data->item_id . '/' . $data->stock_id) ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Stock In Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:35%">Kode Barang</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th>Item Name</th>
                            <td><span id="item_name"></span></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th>Pemasok</th>
                            <td><span id="supplier_name"></span></td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on("click", "#dtl", function() {
            var barcode = $(this).data("barcode");
            var item_name = $(this).data("itemname");
            var detail = $(this).data("detail");
            var supplier_name = $(this).data("suppliername");
            var qty = $(this).data("qty");
            var date = $(this).data("date");
            $("#barcode").text(barcode);
            $("#item_name").text(item_name);
            $("#detail").text(detail);
            $("#supplier_name").text(supplier_name);
            $("#qty").text(qty);
            $("#date").text(date);
        })
    })
</script>