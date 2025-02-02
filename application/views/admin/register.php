<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <style>
        .login-container {
            /* display: flex; */
            /* align-items: center; */
            justify-content: center;
            min-height: 100vh;
        }

        .login-card {
            max-width: 500px;
            width: 100%;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container login-container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6 login-card">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register</h1>
                            </div>
                            <form class="user" action="<?= site_url('adminpanel/register') ?>" method="POST">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nama_lengkap" class="form-control form-control-user" id="exampleInputPassword" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= site_url('adminpanel/index') ?>">Sudah ada akun?</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>