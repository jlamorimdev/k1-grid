<?= view('layouts/header') ?>

<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Usuários</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
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
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <td><?= $user['status'] == 1 ? 'Ativo' : 'Inativo'; ?></td>
                        <td class="text-right">
                            <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            <button class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6" class="text-right">
                            <button class="btn btn-success btn-sm gap-2">
                                <span>Novo Usuário</span>
                            </button>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>