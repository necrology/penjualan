<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Penjualan</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url() ?>assets/bootstrap-4.1.3/css/bootstrap-4..1.3.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url() ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-grin-wink"></i>
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

            <?php if ($this->session->userdata('level') == 0) { ?>
                <!-- Nav Item - Tables pembelian -->
                <li class="nav-item ">
                    <a class="nav-link" href="<?= site_url() ?>">
                        <i class="fas fa-fw fa-cash-register"></i>
                        <span>Kasir</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url() ?>option/data_penjualan">
                        <i class="far fa-handshake"></i>
                        <span>Data Penjualan</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Divider -->
                <hr class="sidebar-divider">
            <?php
            }
            ?>

            <?php if ($this->session->userdata('level') == 1) { ?>

                <!-- Nav Item - Dashboard -->
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


                <!-- Nav Item - Tables -->
                <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-desktop"></i>
                    <span>Management Desain</span></a>
            </li> -->
                <!-- Divider -->
                <!-- <hr class="sidebar-divider my-0"> -->

                <!-- <li class="nav-item">
                <a class="nav-link" href="<?= site_url() ?>option/data_toko">
                    <i class="fas fa-store"></i>
                    <span>Toko</span></a>
            </li> -->
                <!-- Divider -->
                <hr class="sidebar-divider">

            <?php
            }
            ?>

            <?php if ($this->session->userdata('level') == 2) { ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item">
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

                    <div class="h3 ml-auto"><?= $judul ?></div>


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
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="row m-3">
                        <div class="col-5 p-2">
                            <img class="img-profile rounded-circle" src="<?= site_url() ?>assets/images/profil.jpg" width="20%">
                        </div>
                        <!-- <div class="col-7 p-2">
                        <a href="javascript:void(0)" onClick="edit_profil()"><i class="far fa-2x fa-edit"></i></a>
                      </div> -->
                        <div class="col-7 p-2">
                        </div>
                        <div class="col-5 p-2 font-weight-bold text-dark">
                            Nama
                        </div>
                        <div class="col-7 p-2" id="nama_toko">
                            : <?= $akun['nama'] ?>
                        </div>

                        <div class="col-5 p-2 font-weight-bold text-dark">
                            Username
                        </div>
                        <div class="col-7 p-2" id="alamat_toko">
                            : <?= $akun['email'] ?>
                        </div>

                        <div class="col-5 p-2 font-weight-bold text-dark">
                            No. Telepon
                        </div>
                        <div class="col-7 p-2" id="telephon_toko">
                            : <?= $akun['telephone'] ?>
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

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap-4.1.3/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
    <script>
        function edit_profil() {
            $.ajax({
                url: "<?= site_url('option/edit_profil') ?>",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="nama"]').val(data.nama);
                    $('[name="email"]').val(data.email);
                    $('[name="telephon"]').val(data.telephone);
                    $('#modalProfil').modal('show');
                    //alert(data.nama_toko);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Jaringan eror');
                }
            });

        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="modalProfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>

                <div class="modal-body" id="isiModal">

                    <form id="form">
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input type="text" class="form-control " name="nama">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" class="form-control " name="email">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="telephon" class="col-form-label">Telepon</label>
                            <input type="number" class="form-control " name="telephon">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="foto" class="col-form-label">foto</label>
                            <input type="file" class="form-control-file " name="foto">
                            <div class="invalid-feedback"></div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" OnClick="simpan()">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir kode modal dialog -->
</body>

</html>