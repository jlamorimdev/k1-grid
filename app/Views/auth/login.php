<!DOCTYPE html>
<html lang="en">

<head>

    <title>SB Admin 2 - Login</title>
    <link href="/assets/sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/assets/sb-admin-2/css/login.css" rel="stylesheet">

</head>

<body class="bg-login">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 bg-card-login">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="/assets/img/f1_logo.svg" alt="" class="mb-4">
                                    </div>
                                    <form class="user" action="<?= base_url('login'); ?>" id="login-form" class="mb-2" method="POST">
                                        <label for="">E-mail</label>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                        <label for="">Senha</label>
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="d-flex">
                                            <button class="btn btn-primary btn-user btn-block btn-login">
                                                Entrar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="/assets/sb-admin-2/vendor/jquery/jquery.min.js"></script>
</body>

</html>