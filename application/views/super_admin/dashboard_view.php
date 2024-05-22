<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/Responsive-2.2.2/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
    <title>Kasir</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php if ($this->session->userdata('level') == 1) {
                        echo 'admin';
                    } else if ($this->session->userdata('level') == 0) {
                        echo 'kasir';
                    } else {
                        echo 'admin';
                    }
                    ?>
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php if ($this->session->userdata('level') == 2) { ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url() ?>option/laba_diagram">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url() ?>option/data_user">
                        <i class="fa fa-users"></i>
                        <span>Data User</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Tables pembelian -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url() ?>option/data_barang">
                        <i class="fas fa-fw fa-cubes"></i>
                        <span>Data Barang</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url() ?>option/data_penjualan">
                        <i class="far fa-handshake"></i>
                        <span>Data Penjualan</span></a>
                </li>

                <hr class="sidebar-divider my-0">

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url() ?>option/data_aktivitas">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Data Login & Logout</span></a>
                </li>

                <hr class="sidebar-divider my-0">

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url() ?>option/data_log_aktivitas">
                        <i class="far fa-calendar-check"></i>
                        <span>Data Aktivitas</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Divider -->
            <?php
            }
            ?>

            <?php if ($this->session->userdata('level') == 1) { ?>
                <!-- Nav Item - Tables pembelian -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url() ?>option/data_barang">
                        <i class="fas fa-fw fa-cubes"></i>
                        <span>Data Barang</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-handshake"></i>
                        <span>Data Kasir</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-desktop"></i>
                        <span>Management Desain</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
            <?php
            }
            ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="h3 ml-auto">Dashboard</div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username') ?></span>
                                <img class="img-profile rounded-circle" src="<?= site_url() ?>assets/images/profil.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>option/akun">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url() ?>option/logout">
                                    <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $this->model_member->count_all() ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $this->model_barang->count_all() ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-cubes fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Data Penjualan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $this->model_penjualan->count_all() ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-handshake fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php
                                            $query = $this->db->query("SELECT * FROM login");
                                            $jml = $query->num_rows();
                                            ?>
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Data Login</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $jml; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-address-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Project Card Example -->
                            <div class="card border-bottom-danger shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengguna</h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $query = $this->db->query("SELECT * FROM login WHERE browser='Firefox'");
                                    $jml = $query->num_rows();
                                    ?>
                                    <h7 class="medium font-weight-bold">Mozilla Firefox <span class="float-right"><?php echo $jml; ?> Pengguna</span>
                                    </h7>
                                    <?php
                                    $query = $this->db->query("SELECT * FROM login WHERE browser='Chrome'");
                                    $jml = $query->num_rows();
                                    ?>
                                    <br>
                                    <hr>
                                    <h7 class="medium font-weight-bold">Chrome <span class="float-right"><?php echo $jml; ?>
                                            Pengguna</span>
                                    </h7>
                                    <?php
                                    $query = $this->db->query("SELECT * FROM login WHERE browser='Opera'");
                                    $jml = $query->num_rows();
                                    ?>
                                    <br>
                                    <hr>
                                    <h7 class="medium font-weight-bold">Opera <span class="float-right"><?php echo $jml; ?>
                                            Pengguna</span>
                                    </h7>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-bottom-info shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Diagram Pendapatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="satuan">Bulan</label>
                                    <select class="form-control " id="bulan" onChange="cek_bulan()" name="bulan">
                                        <!--option value="pcs">pcs</option-->
                                        <?php $bulan = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                        $jlh_bln = count($bulan);
                                        //for($c=0; $c<($jlh_bln - (date("m")+1)); $c++){
                                        for ($c = 0; $c < (date("m") - 1); $c++) {
                                        ?>
                                            <option value="<?= $c ?>"> <?= $bulan[$c] ?></option>
                                        <?php
                                        }
                                        ?>
                                        <option value="<?= date("m") - 1; ?>" selected="selected"><?= date("F") ?>
                                        </option>

                                        <?php
                                        $sisa = 12 - date('m'); //5
                                        $tgl = 12 - $sisa;
                                        for ($b = $tgl; $b < 12; $b++) {
                                        ?>
                                            <option value="<?= $b ?>"> <?= $bulan[$b] ?> </option>

                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="satuan">Tahun</label>
                                    <select class="form-control " id="tahun" name="tahun" onChange="cek_bulan()">
                                        <!--option value="pcs">pcs</option-->
                                        <?php
                                        $now = date("Y") - 1;
                                        for ($thn = $now - 3; $thn <= $now; $thn++) {
                                            echo "<option value=$thn>$thn</option>";
                                        }
                                        ?>
                                        <option value="<?= date("Y") ?>" selected="selected"><?= date("Y") ?></option>
                                    </select>
                                </div>

                            </div>
                            <!--button type="button" onClick="cekTanggal()">cek</button-->
                            <div class="canvas-wrapper" id="chart-container">
                                <canvas class="chart" id="mycanvas" height="250" width="900"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aplikasi Penjualan 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="<?= base_url() ?>assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap-4.1.3/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/sb-admin-2.js"></script>
    <script src="<?= base_url() ?>assets/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/Responsive-2.2.2/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
    <script>
        function cek_bulan() {
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            $.ajax({
                url: 'http://localhost/penjualan/option/cari_diagram',
                data: {
                    bulan: bulan,
                    tahun: tahun
                },
                method: "POST",
                success: function(data) {
                    var obj = JSON.parse(data);
                    diagram(obj);
                    //alert(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        $(function() {
            //cek_bulan();
            $.ajax({
                url: "http://localhost/penjualan/option/diagram",
                method: "GET",
                success: function(data) {
                    var obj = JSON.parse(data);
                    diagram(obj);
                    //alert(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        function diagram(obj) {
            var player = [];
            var score = [];

            for (var i = 0; i < obj.length; i++) {
                player.push(obj[i].tgl_transaksi);
                score.push(obj[i].total_harga);
            }

            var option = {
                responsive: true,
                scales: {
                    yAxes: [{
                        stacked: true,
                        gridLines: {
                            display: true,
                            color: "rgba(255,99,132,0.2)"
                        }
                    }],
                }
            };

            var ctx = $("#mycanvas");
            ctx.height(100);
            var barGraph = new Chart(ctx, {
                type: 'bar',
                label: 'Pendapatan',
                options: option,
                data: {
                    labels: player,
                    datasets: [{
                        label: 'Pendapatan',
                        backgroundColor: "rgba(255,99,132,0.2)",
                        borderColor: "rgba(255,99,132,1)",
                        borderWidth: 2,
                        hoverBackgroundColor: "rgba(255,99,132,0.4)",
                        hoverBorderColor: "rgba(255,99,132,1)",
                        data: score
                    }]
                }
            });

        }
    </script>
</body>

</html>