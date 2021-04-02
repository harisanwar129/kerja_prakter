<section class="content-header">
    <h1><?= ucwords($title) ?>
        <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li class="active"><?= ucwords($title) ?></li>
    </ol>
</section>

<section class="content">
    <!-- <div class="row">
        <div class="col-lg-12"> -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Customers</h3>
            <div class="pull-right">
                <a href="<?= site_url('customer/add') ?>" class="btn btn-flat btn-primary">
                    <i class="fa fa-plus"></i> Add Customer
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No.Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $r => $data) { ?>
                        <tr>
                            <td width="35px"><?= $no++ ?>.</td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->gender ?></td>
                            <td><?= $data->phone ?></td>
                            <td><?= $data->address ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('customer/edit/' . $data->customer_id) ?>" class="btn btn-xs btn-primary">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?= site_url('customer/del/' . $data->customer_id) ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- </div>
    </div> -->
</section>