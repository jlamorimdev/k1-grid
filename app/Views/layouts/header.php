<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K1 Grid</title>

    <!-- SB Admin 2 CSS -->
    <link href="<?= base_url('assets/sb-admin-2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/sb-admin-2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/theme.css') ?>">
</head>

<body id="page-top">

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion k1-sidebar" id="accordionSidebar">

        <!-- Logo -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center px-4" href="#">
            <img src="<?= base_url('assets/img/logo_k1.png') ?>" class="sidebar-logo">
        </a>

        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-user-astronaut"></i>
                <span>Pilotos</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-flag-checkered"></i>
                <span>Corridas</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-users"></i>
                <span>Equipes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-trophy"></i>
                <span>Campeonatos</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-chart-line"></i>
                <span>Resultados</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-calendar-alt"></i>
                <span>Calendário</span>
            </a>
        </li>

        <div class="sidebar-divider"></div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/users') ?>">
                <i class="fas fa-user-cog"></i>
                <span>Usuários</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Sair</span>
            </a>
        </li>

    </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand bg-dark-secondary topbar mb-4 static-top shadow text-white">

            <!-- Título à esquerda -->
            <span class="navbar-text">
                Bem-vindo ao K1 Grid 🏎️
            </span>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Divider -->
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
                    role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?= session()->get('user_name'); ?>
                        </span>

                        <img class="img-profile rounded-circle"
                            src="<?= base_url('assets/img/user_logo.png') ?>">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Perfil
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="<?= base_url('logout') ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Sair
                        </a>
                    </div>
                </li>

            </ul>

            </nav>

            <div class="container-fluid">