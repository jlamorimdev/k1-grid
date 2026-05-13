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

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="userModalTitle">Alterar Senha</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="formUser" method="post" action="<?= base_url('admin/users/new'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="role" class="form-control" required>
                            <option value="">Selecione</option>
                            <option value="admin">Admin</option>
                            <option value="pilot">Piloto</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Selecione</option>
                            <option value="1">Habilitado</option>
                            <option value="0">Desabilitado</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
                    <button type="submit" class="btn btn-primary"> Salvar </button>
                </div>
            </form>

        </div>
    </div>
</div>

<?= view('layouts/footer') ?>