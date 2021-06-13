<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= ucwords($title) ?> | Satria Jaya</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/pace/pace.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<?php if ($this->session->userdata('level') == 2) { ?>

    <body class="hold-transition skin-blue-light <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
    <?php } ?>
    <?php if ($this->session->userdata('level') == 1) { ?>

        <body class="hold-transition skin-green <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
        <?php } ?>
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?= base_url() ?>" class="logo">
                    <span class="logo-mini">S<b>J</b></span>
                    <span class="logo-lg">Aplikasi Satria Jaya</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">2</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 2 notifications</li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-th-list"></i> 5 new items added today
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= base_url() ?>assets/dist/img/user.png" class="user-image">
                                    <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?= base_url() ?>assets/dist/img/user.png">
                                        <p>
                                            <?= $this->fungsi->user_login()->name ?>
                                            <small><?= $this->fungsi->user_login()->address ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?= site_url('dashboard') ?>" class="btn btn-default btn-flat">Tentang Saya</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= site_url('auth/logout') ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-md btn-danger" class="btn btn-flat bg-red">Keluar</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= base_url() ?>assets/dist/img/user.png" class="img-circle">
                        </div>
                        <div class="pull-left info">
                            <p><?= ucfirst($this->fungsi->user_login()->username) ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN MENU</li>
                        <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : null ?>">
                            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
                        </li>
                        <?php if ($this->session->userdata('level') == 2) { ?>

                            <li class="<?= $this->uri->segment(1) == 'customer' ? 'active' : null ?>">
                                <a href="<?= site_url('customer') ?>">
                                    <i class="fa fa-users"></i> <span>Pelanggan</span>
                                    <span class="pull-right-container">
                                        <span class="label bg-purple pull-right"><?= $this->fungsi->count_customer() ?></span>
                                    </span>
                                </a>
                            </li>
                           
                                    <li class="<?= $this->uri->segment(1) == 'sale' ? 'active' : null ?>">
                                        <a href="<?= site_url('sale') ?>"><i class="fa fa-shopping-cart"></i> <b>Penjualan</b></a>
                                    </li>
                                    
                         
                           
                        <?php } ?>

                        <?php if ($this->session->userdata('level') == 1) { ?>


                            
                           
                            <li class="<?= $this->uri->segment(1) == 'customer' ? 'active' : null ?>">
                                <a href="<?= site_url('customer') ?>">
                                    <i class="fa fa-users"></i> <span>Pelanggan</span>
                                    <span class="pull-right-container">
                                        <span class="label bg-purple pull-right"><?= $this->fungsi->count_customer() ?></span>
                                    </span>
                                </a>
                            </li>
                            <li class="<?= $this->uri->segment(1) == 'supplier' ? 'active' : null ?>">
                                <a href="<?= site_url('supplier') ?>">
                                    <i class="fa fa-truck"></i> <span>Pemasok</span>
                                    <span class="pull-right-container">
                                        <span class="label bg-purple pull-right"><?= $this->fungsi->count_supplier() ?></span>
                                    </span>
                                </a>
                            </li>
                            <li class="<?= $this->uri->segment(1) == 'user' ? 'active' : null ?>">
                                <a href="<?= site_url('user') ?>"> <i class="fa fa-user">
                                    </i> <span>Pengguna</span>
                                    <span class="pull-right-container">
                                        <span class="label label-danger pull-right"><?= $this->fungsi->count_user() ?></span>
                                    </span>
                                </a>
                            </li>
                            <li class="treeview <?= $this->uri->segment(1) == 'sale'
                                                    || $this->uri->segment(1) == 'stock' ? 'active' : null ?>">
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i> <span>Stock Barang</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    
                                    <li class="<?= ($this->uri->segment(1) == 'stock'
                                                    && $this->uri->segment(2) == 'in') ? 'active' : null ?>">
                                        <a href="<?= site_url('stock/in') ?>"><i class="fa fa-circle-o text-green"></i> Barang Masuk </a>
                                    </li>
                                    <li class="<?= ($this->uri->segment(1) == 'stock'
                                                    && $this->uri->segment(2) == 'out') ? 'active' : null ?>">
                                        <a href="<?= site_url('stock/out') ?>"><i class="fa fa-circle-o"></i> Barang Keluar</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="treeview <?= $this->uri->segment(1) == 'category'
                                                    || $this->uri->segment(1) == 'unit'
                                                    || $this->uri->segment(1) == 'item' ? 'active' : null ?>">
                                <a href="#">
                                    <i class="fa fa-archive"></i> <span>Produk</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?= $this->uri->segment(1) == 'category' ? 'active' : null ?>">
                                        <a href="<?= site_url('category') ?>"><i class="fa fa-circle-o"></i> Kategori</a>
                                    </li>
                                    <li class="<?= $this->uri->segment(1) == 'unit' ? 'active' : null ?>">
                                        <a href="<?= site_url('unit') ?>"><i class="fa fa-circle-o"></i> Satuan</a>
                                    </li>
                                    <li class="<?= $this->uri->segment(1) == 'item' ? 'active' : null ?>">
                                        <a href="<?= site_url('item') ?>"><i class="fa fa-circle-o text-green"></i> <b>Items</b></a>
                                    </li>
                                </ul>
                            </li>

                          
                                    <li class="<?= $this->uri->segment(1) == 'report'
                                                    && $this->uri->segment(2) == 'sale' ? 'active' : null ?>">
                                        <a href="<?= site_url('report/sale') ?>"><i class="fa fa-pie-chart"></i> Laporan Penjualan</a>
                                    </li>
                                    
                          
                        <?php } ?>

                    </ul>
                </section>
            </aside>

            <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?= $contents ?>
            </div>

            <footer class="main-footer">

                <div class="pull-right hidden-xs"><b>Version</b> 0.1</div>
                <strong> <?= date('Y') ?>.</strong> All rights reserved.
            </footer>

        </div>

        <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/PACE/pace.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

        <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script>
            $(document).ready(function() {
                $(document).ajaxStart(function() {
                    Pace.restart()
                })

                $('#table1').DataTable()
            })
        </script>

        </body>

</html>