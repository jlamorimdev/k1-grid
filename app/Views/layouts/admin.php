<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>K1 Grid</title>

    <link href="<?= base_url('assets/sb-admin-2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/sb-admin-2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

<div id="wrapper">

    <?= $this->include('partials/sidebar') ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <?= $this->include('partials/topbar') ?>

            <div class="container-fluid">

                <?= $this->renderSection('content') ?>

            </div>
        </div>

        <?= $this->include('partials/footer') ?>

    </div>
</div>

<script src="<?= base_url('assets/sb-admin-2/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/sb-admin-2/js/sb-admin-2.min.js') ?>"></script>

</body>
</html>