<?= view('layouts/header') ?>

<h1 class="h3 mb-4 text-white-800"><?= $title; ?></h1>

<div class="card card-dark mb-4">
    <div class="card-body py-1">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th style="width: 5%;">ID</th>
                        <th style="width: 45%;">Campeonato</th>
                        <th style="width: 25%;">Local</th>
                        <th>Data de Criação</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($championships as $championship) : ?>
                        <tr class="team-row">
                            <td>
                                <div class="d-flex align-items-center gap-4">
                                    <?= $championship['id']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="team-info">
                                    <div class="team-logo">
                                        <?php if (!empty($championship['logo'])) { ?>
                                            <img src="<?= base_url($championship['logo']); ?>" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="team-content">
                                        <div class="team-name">
                                            <?= $championship['name']; ?>
                                        </div>
                                        <small class="team-championship">
                                            <?= $championship['season'] ?? '-'; ?>
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="team-content">
                                    <div class="team-name">
                                        <?= $championship['kartodrome']; ?>
                                    </div>
                                </div>
                            </td>
                            <td><?= date('d/m/Y', strtotime($championship['created_at'])); ?></td>
                            <td class="text-right">
                                <a href="<?= base_url('admin/championships/delete/' . $championship['id']); ?>" class="btn btn-danger mr-1"><i class="far fa-trash-alt"></i></a>
                                <a href="<?= base_url('admin/championships/edit/' . $championship['id']); ?>" class="btn btn-dark"><i class="far fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="7" class="text-right">
                            <a href="<?= base_url('admin/championships/create'); ?>" class="btn btn-primary  "> <span>Novo Campeonato</span> </a>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>