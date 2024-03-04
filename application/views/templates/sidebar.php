<body class="fixed-navbar">
    <div class="page-wrapper">
<!-- START SIDEBAR-->
    <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="<?= base_url('assets'); ?>./img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">Admin</div><small>Administrator</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href=<?= base_url('user/index'); ?>><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">FEATURES</li>
                    <li>
                        <a href="#"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Peminjaman</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="<?= base_url('request'); ?>">Request</a>
                            </li>
                            <li>
                                <a href="<?= base_url('replace'); ?>">Replace</a>
                            </li>
                            <li>
                                <a href="<?= base_url('pinjam'); ?>">Pinjam</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=# ><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Barang</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href=<?= base_url('satuan'); ?>>Satuan Barang</a>
                            </li>
                            <li>
                                <a href=<?= base_url('jenis'); ?>>Jenis Barang</a>
                            </li>
                            <li>
                                <a href=<?= base_url('barang'); ?>>Data Barang</a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- <li>
                        <a href="<?= base_url('assets'); ?>javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Tables</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="<?= base_url('assets'); ?>table_basic.html">Basic Tables</a>
                            </li>
                            <li>
                                <a href="<?= base_url('assets'); ?>datatables.html">Datatables</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </nav>
        
        <!-- END SIDEBAR-->
        <!-- <div class="content-wrapper"> -->
            <!-- START PAGE CONTENT-->
            <!-- <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?= $pinjam ?></h2>
                                <div class="m-b-5">PINJAM</div><i class="ti-bar-chart widget-stat-icon"></i>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?= $request ?></h2>
                                <div class="m-b-5">REQUEST</div><i class="ti-bar-chart widget-stat-icon"></i>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?= $replace ?></h2>
                                <div class="m-b-5">REPLACE</div><i class="ti-bar-chart widget-stat-icon"></i>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?= $barang ?></h2>
                                <div class="m-b-5">BARANG</div><i class="ti-bar-chart widget-stat-icon"></i>
                                
                            </div>
                        </div>
                    </div> -->
                <!-- </div> -->
        <div class="content-wrapper">
                <style>
                    .visitors-table tbody tr td:last-child {
                        display: flex;
                        align-items: center;
                    }

                    .visitors-table .progress {
                        flex: 1;
                    }

                    .visitors-table .progress-parcent {
                        text-align: right;
                        margin-left: 10px;
                    }
                </style>
</html>