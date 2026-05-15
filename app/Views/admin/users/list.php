<?= view('layouts/header') ?>

<h1 class="h3 mb-4 text-white-800"><?= $title; ?></h1>

<div class="card card-dark mb-4">
    <div class="card-body py-1">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['id']; ?></td>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td><?= $user['status'] == 1 ? 'Ativo' : 'Inativo'; ?></td>
                            <td class="text-right">
                                <a href="<?= base_url('admin/users/delete/'.$user['id']); ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                <a href="<?= base_url('admin/users/edit/'.$user['id']); ?>" class="btn btn-dark btn-sm"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="7" class="text-right">
                            <a href="<?= base_url('admin/users/create'); ?>" class="btn btn-primary btn-sm"> <span>Novo Usuário</span> </a>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>