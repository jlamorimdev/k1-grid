<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- SB Admin 2 CSS -->
    <link href="<?= base_url('assets/sb-admin-2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/sb-admin-2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/sb-admin-2/css/login.css') ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-login">

    <div class="login-wrapper">

        <!-- IMAGEM DE FUNDO -->
        <div class="login-bg"></div>

        <!-- CARD CENTRAL -->
        <div class="login-card">

            <h5 class="text-center text-white mb-2">Bem-vindo de volta!</h5>
            <p class="text-center text-muted mb-4">
                Faça login para acessar o painel administrativo.
            </p>
            

            <form action="<?= base_url('login'); ?>" method="POST">
                <div class="grid">
                    <div class="form-group g-col-12 col-12">
                        <input type="text" class="form-control form-control-login" name="username" placeholder="Usuário ou e-mail">
                    </div>
    
                    <div class="form-group g-col-12 col-12">
                        <input type="password" class="form-control form-control-login" name="password" placeholder="Senha">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <input type="checkbox"> <span class="text-muted">Lembrar de mim</span>
                    </div>
                    <a href="#" class="text-danger small">Esqueceu a senha?</a>
                </div>

                <button class="btn btn-login btn-block">
                    ENTRAR
                </button>

            </form>

            <div class="text-center mt-4 text-muted small">
                K1 Racing Admin Panel © 2026
            </div>

        </div>

    </div>

</body>