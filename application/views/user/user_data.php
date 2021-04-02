<section class="content-header">
    <h1><?= ucwords($title) ?>
        <small>Pengguna / Karyawan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li class="active"><?= ucwords($title) ?></li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add') ?>" class="btn btn-flat btn-primary">
                    <i class="fa fa-user-plus"></i> Add User
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $r => $data) { ?>
                        <tr>
                            <td width="35px"><?= $no++ ?>.</td>
                            <td><?= $data->username ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->address ?></td>
                            <td><?= $data->level == 1 ? '<span class="label label-default">Admin</span>' : '<span class="label label-default">Kasir</span>' ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-xs btn-primary">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <?php if ($data->user_id != $this->session->userdata('userid')) { ?>
                                    <a href="<?= site_url('user/del/' . $data->user_id) ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-xs btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                <?php
                                } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>