<?= view('layouts/header') ?>

<h1 class="h3 mb-4 text-white-800"><?= $title; ?></h1>

<div class="card card-dark mb-4">
    <div class="card-body py-1">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th style="width: 7%;">ID</th>
                        <th style="width: 65%;">Nome</th>
                        <th>Data de Criação</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($teams as $team) : ?>
                        <tr class="team-row" style="--team-color: <?= $team['color']; ?>">
                            <td>
                                <div class="d-flex align-items-center gap-4">
                                    <?= $team['id']; ?>
                                    <span class="team-color" style="background: <?= $team['color']; ?>"> </span>
                                </div>
                            </td>
                            <td>
                                <div class="team-info">
                                    <div class="team-logo">
                                        <?php if (!empty($team['logo'])) { ?>
                                            <img src="<?= base_url($team['logo']); ?>" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="team-content">
                                        <div class="team-name">
                                            <?= $team['name']; ?>
                                        </div>
                                        <small class="team-championship">
                                            <?= $team['championship_name'] ?? '-'; ?>
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td><?= date('d/m/Y', strtotime($team['created_at'])); ?></td>
                            <td class="text-right">
                                <a href="<?= base_url('admin/teams/delete/' . $team['id']); ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                <a href="<?= base_url('admin/teams/edit/' . $team['id']); ?>" class="btn btn-dark btn-sm"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="7" class="text-right">
                            <a href="<?= base_url('admin/teams/create'); ?>" class="btn btn-primary btn-sm"> <span>Nova Equipe</span> </a>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>