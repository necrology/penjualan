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
    <link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <script src="<?php echo base_url() ?>assets/qrcode/instascan.min.js"></script> -->
    <link href="<?= base_url() ?>assets/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
    <title>Kasir</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js">
    </script>
    <style>
        @media print {
            #wrapper {
                display: none;
            }

            .modal-footer,
            .modal-header {
                display: none;
            }

            title {
                display: none;
            }
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url() ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cash-register"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php if ($this->session->userdata('level') == 1) {
                        echo 'admin';
                    } else {
                        echo 'kasir';
                    }
                    ?>
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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
            <hr class="sidebar-divider">

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

                    <div class="h3 ml-auto">Kasir</div>


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

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 ">

                                <form class="form-horizontal" id="form_transaksi" role="form">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Kode Barang</label>
                                        <div class="col-md-9">
                                            <input class="form-control reset" id="pencarian" name="id" type="text" placeholder="kode barang">
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <button type="button" class="btn btn-md btn-primary" onclick="tambah_barang()"><i class="fa fa-qrcode"></i> Scan QR</button>
                                        </div> -->
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Nama Barang</label>
                                        <div class="col-md-9">
                                            <input class="form-control reset" type="text" id="nama_barang" name="nama" readonly="" placeholder="nama barang">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label class="col-md-4 col-form-label">PPN</label>
                                        <div class="col-md-2">
                                            <input type="radio" class="form-check-input" id="radio1" name="ppn" value="aktif">
                                            <label class="form-check-label" for="radio1">Aktif</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="radio" class="form-check-input" id="radio2" name="ppn" value="nonaktif" checked>
                                            <label class="form-check-label" for="radio2">Non-Aktif</label>
                                        </div>
                                    </div> -->



                                    <!-- <div class="form-group row">
                    <label class="col-md-3 col-form-label">Makanan</label>
                    <div class="col-md-9">
                      <input class="form-control reset" id="pencarian" name="jenis_makanan" type="text" placeholder="jenis makanan">
                    </div>
                  </div> -->

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Harga</label>
                                        <div class="col-md-9">
                                            <input class="form-control reset" type="text" name="harga" id="harga" placeholder="0" value="">
                                        </div>
                                    </div>

                                    <input type="hidden" class="reset" id="jenis_promo" name="jenis_promo">
                                    <input type="hidden" class="reset" id="potongan" name="potongan">
                                    <input type="hidden" class="reset" id="harga_potongan" name="harga_potongan">

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Jumlah Beli</label>
                                        <div class="col-md-9">
                                            <input class="form-control reset" type="number" onkeyup="subTotal(this.value)" id="qty" min="0" name="qty" placeholder="0">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Sub Total</label>
                                        <div class="col-md-9">
                                            <input class="form-control reset" type="text" name="sub_total" id="sub_total" readonly="" placeholder="0" value="">
                                        </div>
                                    </div>
                                </form>

                                <button type="button" class="btn btn-md btn-primary" id="tambah" disabled="disabled" onclick="addbarang()"><i class="fa fa-shopping-cart"></i> Input</button>
                                <!-- <button class="btn btn-success float-right" onclick="tambah_barang()"><i class="glyphicon glyphicon-plus"></i> Tambah Barang</button><br><br> -->
                            </div>

                            <div class="col-sm-12 col-md-6 ">

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Total</label>
                                    <div class="col-md-9">
                                        <input class="form-control form-control-lg res" type="text" readonly="" name="total" id="total" value="<?= number_format($this->cart->total(), 0, '', '.'); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Bayar</label>
                                    <div class="col-md-9">
                                        <input class="form-control form-control-lg res" type="number" id="bayar" name="bayar" onkeyup="showKembali(this.value)" placeholder="0">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Kembali</label>
                                    <div class="col-md-9">
                                        <input class="form-control form-control-lg res" type="text" id="kembali" readonly="" name="kembali">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <table id="tabelBarang" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah Beli</th>
                                <th>Sub total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-md btn-primary" id="selesai" disabled="disabled">Selesai
                    </button>
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
    <script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
    <script src="<?= base_url() ?>assets/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/qrcode/app.js"></script> -->
    <script>
        var table;
        $(document).ready(function() {
            table = $('#tabelBarang').DataTable({
                paging: false,
                "info": false,
                "searching": false,
                "ajax": {
                    "url": "http://localhost/penjualan/option/list_transaksi",
                    "type": "POST"
                },
                "columnDefs": [{
                    "targets": [2, 3, 4, 5],
                    "orderable": false,
                }, ],
            });

            $('#pencarian').focus();
        });

        function reload_table() {
            table.ajax.reload(null, false);
        }

        function diskon(harga_beli) {
            var harga = $('#harga_beli').val().replace(".", "").replace(".", "");
            var persen = $('#persen').val();
            var jumlah = harga * persen / 100;
            var hasil = harga - jumlah;
            $('#harga_jual').val(hasil);
        }

        function subTotal(qty) {
            var harga = $('#harga').val().replace(".", "").replace(".", "");
            var promo = $('#jenis_promo').val();
            var potongan = $('#potongan').val();
            var hrg_potong = $('#harga_potongan').val();
            if (promo == 'minimal') {
                var induk = Math.floor(qty / potongan);
                var sisa = qty % potongan;
                var sub = (induk * hrg_potong) + (harga * sisa);
                $('#sub_total').val(convertToRupiah(sub));
                $('#tambah').removeAttr("disabled");
            } else {
                var diskon = harga - (harga * potongan / 100);
                $('#sub_total').val(convertToRupiah(diskon * qty));
                $('#tambah').removeAttr("disabled");
            }
        }

        function addbarang() {
            var id = $('#id').val();
            var qty = $('#qty').val();
            $.ajax({
                url: "http://localhost/penjualan/option/add_keranjang",
                type: "POST",
                data: $('#form_transaksi').serialize(),
                dataType: "JSON",
                success: function(data) {
                    reload_table();
                    $('#tambah').attr("disabled", "disabled");
                    $('#qty').attr("readonly", "readonly");
                    $('#pencarian').focus();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding data');
                }
            });
            showTotal();
            showKembali($('#bayar').val());
            $('.reset').val('');
        }

        document.onkeydown = function(e) {
            var q = $('#qty').val();
            var byr = $('#bayar').val();
            if (q !== '') {
                switch (e.keyCode) {
                    case 13:
                        addbarang();
                        break;
                }
            }

            if (byr !== '') {
                switch (e.keyCode) {
                    case 13:
                        selesai();
                        break;
                }
            }
            // 113 f2
            // 37 kiri 38 atas 39 kanan 40 bawah
            switch (e.keyCode) {
                case 113:
                    $('#pencarian').focus();
                    break;
            }
        };

        function showTotal() {
            var total = $('#total').val().replace(".", "").replace(".", "");
            var sub_total = $('#sub_total').val().replace(".", "").replace(".", "");
            $('#total').val(convertToRupiah((Number(total) + Number(sub_total))));
        }

        function showKembali(str) {
            var total = $('#total').val().replace(".", "").replace(".", "");
            var bayar = str.replace(".", "").replace(".", "");
            var kembali = bayar - total;
            $('#kembali').val(convertToRupiah(kembali));
            if (kembali >= 0) {
                $('#selesai').removeAttr("disabled");
            } else {
                $('#selesai').attr("disabled", "disabled");
            }
            if (total == 0) {
                $('#selesai').attr("disabled", "disabled");
            }
        }

        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return rupiah.split('', rupiah.length - 1).reverse().join('');
        }

        $(function() {
            $("#pencarian").autocomplete({
                    minLength: 1,
                    delay: 400,
                    source: function(request, response) {

                        jQuery.ajax({
                            url: "http://localhost/penjualan/option/cari_barang",
                            data: {
                                keyword: request.term
                            },
                            dataType: "json",
                            success: function(data) {
                                response(data);
                            }
                        })
                    },
                    select: function(e, ui) {
                        var nama = ui.item.nama_barang;
                        var code = ui.item.kode_barang;
                        $("#pencarian").val(code);
                        $("#nama_barang").val(nama);
                        // $("#harga").val(convertToRupiah(ui.item.harga_jual));
                        $("#jenis_promo").val(ui.item.jenis_promo);
                        $("#potongan").val(ui.item.potongan);
                        $("#harga_potongan").val(ui.item.harga_ahir);
                        $('#harga').removeAttr("readonly");
                        $('#qty').removeAttr("readonly");
                        $('#harga').focus();
                        return false;
                    }
                })
                .data("ui-autocomplete")._renderItem = function(ul, item) {
                    return $("<li>")
                        .append("<a>" + item.kode_barang + " " + item.nama_barang + "</a>")
                        .appendTo(ul);
                };
        });

        $('#selesai').click(function() {
            var bayar = $('#bayar').val();
            var kembali = $('#kembali').val();
            $.ajax({
                url: "http://localhost/penjualan/option/cetak_nota/",
                data: {
                    bayar: bayar,
                    kembali: kembali
                },
                method: "POST",
                success: function(data) {
                    $('#modalNota').modal('show');
                    $('#isiModal').html(data);
                }
            });
        });

        function selesai() {
            var bayar = $('#bayar').val();
            var kembali = $('#kembali').val();
            $.ajax({
                url: "http://localhost/penjualan/option/cetak_nota/",
                data: {
                    bayar: bayar,
                    kembali: kembali
                },
                method: "POST",
                success: function(data) {
                    $('#modalNota').modal('show');
                    $('#isiModal').html(data);
                }
            });
        }

        function print_nota() {
            window.print();
            cetak_struk();
        }

        function cetak_struk() {
            $.ajax({
                url: "http://localhost/penjualan/option/shoping/",
                type: "post",
                dataType: "json",
                success: function(result) {
                    console.log(result);
                    if (result.status == true) {
                        $('#modalNota').modal('hide');
                        reload_table();
                        $('.res').val('');
                        $('#pencarian').focus();
                    } else {
                        alert('gagal melakukan transaksi')
                    }
                },
                error: function(err) {
                    alert('error transaksi')
                }
            });
        }

        function deletebarang(id, sub_total) {
            $.ajax({
                url: "<?= site_url('option/deletebarang') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    reload_table();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal hapus barang');
                }
            });
            var ttl = $('#total').val().replace(".", "");
            $('#total').val(convertToRupiah(ttl - sub_total));
            showKembali($('#bayar').val());
        }

        function tambah_barang() {
            save_method = 'add';
            $('#form')[0].reset();
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                    // 0 = kamera depan
                    // 1 = kamera belakang
                } else {
                    alert('Kamera tidak ditemukan');
                }
            }).catch(function(e) {
                console.error(e);
            });
            $('.modal-title').text('SCAN QR CODE');
            $('#modal_scan').modal('show');
        }

        function save() {
            var url;
            if (save_method == 'add') {
                url = "<?php echo site_url('option/simpan_barang') ?>";
            } else {
                url = "<?php echo site_url('option/update_barang') ?>";
            }


            $.ajax({
                url: url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        $('#modal_form').modal('hide');
                        reload_table();
                    } else {
                        for (var i = 0; i < data.inputerror.length; i++) {
                            //$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                            $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
            });
        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="modalNota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>

                <div class="modal-body" id="isiModal">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" OnClick="print_nota()"><span class="fa fa-print"></span> Cetak</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"></span>
                        Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir kode modal dialog -->

    <div class="modal fade" id="modal_scan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SCAN QR CODE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body form">
                    <form id="form" class="form-horizontal">

                        <input type="hidden" value="" name="id" />
                        <div class="form-body">
                            <video id="preview" width="100%"></video>

                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">


                                </div>
                                <!--card card-body-->
                            </div>
                            <!--collapse-->

                        </div>
                        <!--form body-->

                    </form>
                </div>
                <!--modal-body-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(c) {
            document.getElementById('pencarian').value = c + " ";
            if (document.getElementById('pencarian').value) {
                Instascan.Camera.getCameras().then(function(cameras) {
                    scanner.stop(cameras);
                });
                $('#modal_scan').modal('hide');
                $('#pencarian').focus();

            } else {
                alert('QR Tidak terscan');
            }
        });
    </script>

</body>

</html>