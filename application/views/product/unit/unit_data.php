<section class="content-header">
    <h1><?= ucwords($title) ?>
        <small>Satuan Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li><a>Products</a></li>
        <li class="active"><?= ucwords($title) ?></li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Units</h3>
            <div class="pull-right">
                <a href="<?= site_url('unit/add') ?>" class="btn btn-flat btn-primary">
                    <i class="fa fa-plus"></i> Add Unit
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $r => $data) { ?>
                        <tr>
                            <td width="35px"><?= $no++ ?>.</td>
                            <td><?= $data->uname ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('unit/edit/' . $data->unit_id) ?>" class="btn btn-xs btn-primary">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?= site_url('unit/del/' . $data->unit_id) ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-xs btn-danger">
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