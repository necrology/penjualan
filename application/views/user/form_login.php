<!DOCTYPE html>
<html lang="en">

<head>
    <!-- https://github.com/irfaardy -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kasir</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.3/css/sb-admin-2.min.css" integrity="sha512-RIG2KoKRs0GLkvl0goS0cdkTgQ3mOiF/jupXuBsMvyB3ITFpTJLnBu59eE+0R39bxDQKo2dsatA5CwHeIKVFcw==" crossorigin="anonymous" />
    <!-- <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <style>
        .alert {
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translate(-50%, 0);
            z-index: 99;
        }

        .login-center {
            text-align: center;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!--div class="col-lg-6 d-none d-lg-block bg-login-image"></div-->
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Di Aplikasi Penjualan</h1>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <h1 class="h5 text-gray-900 mb-4">Login</h1>
                                    </div>

                                    <form class="user" action="<?php echo site_url('login'); ?>" method="post" id="form-login">
                                        <?php echo $this->session->flashdata('error'); ?>
                                        <?php echo $this->session->flashdata('message'); ?>
                                        <?php echo $this->session->flashdata('success'); ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" value="<?php echo set_value('email') ?>" name="email" id="email" aria-describedby="emailHelp" placeholder="Username">
                                            <?php echo "<span class='text-danger'>" . form_error('email') . "</span>"; ?>
                                            <?php echo "<span class='text-danger'>" . $this->session->flashdata('error_email') . "</span>"; ?>

                                            <div class="invalid-feedback"></div>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                            <?php echo "<span class='text-danger'>" . form_error('password') . "</span>"; ?>
                                            <?php echo "<span class='text-danger'>" . $this->session->flashdata('error_password') . "</span>"; ?>
                                            <div class="invalid-feedback"></div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                    <a class="small" href="<?php echo site_url('reset'); ?>">Forgot Password?</a>
                  </div> -->
                                    <!-- <div class="text-center">
                    <a class="small" href="<?php echo site_url('registrasi'); ?>">Create an Account!</a>
                  </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <!-- <script src="<?php echo base_url() ?>assets/jquery/jquery-3.2.1.min.js"></script> -->
    <script type="text/javascript">
        $(function() {
            if ($('.alert').show()) {
                hilang();
            }
        });

        function hilang() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 4000);
        }
    </script>

</body>

</html>