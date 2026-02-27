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
                                <button type="button" class="btn btn-primary btn-sm btn-edit-user" data-toggle="modal" data-target="#userModal" data-id="<?= $user['id']; ?>" data-name="<?= $user['name']; ?>" data-username="<?= $user['username']; ?>" data-email="<?= $user['email']; ?>" data-role="<?= $user['role']; ?>" data-status="<?= $user['status']; ?>"><i class="far fa-edit"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="7" class="text-right">
                            <button type="button" class="btn btn-success btn-sm btn-new-user" data-toggle="modal" data-target="#userModal"> <span>Novo Usuário</span> </button>
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

<script>
    $(document).ready(function() {
        $('.btn-new-user').on('click', function () {
            $('#formUser [name="name"]').val('');
            $('#formUser [name="username"]').val('');
            $('#formUser [name="email"]').val('');
            $('#formUser [name="role"]').val('');
            $('#formUser [name="status"]').val('');
            $('#formUser [name="id"]').val('');
            $('#formUser [name="password"]').attr('required', true);
            $('#formUser').attr('action', '<?= base_url('admin/users/new'); ?>');
        });

        $('.btn-edit-user').on('click', function () {
            $edit_button = $(this);

            let id = $edit_button.data('id');
            let name = $edit_button.data('name');
            let username = $edit_button.data('username');
            let email = $edit_button.data('email');
            let role = $edit_button.data('role');
            let status = $edit_button.data('status');

            $('#formUser [name="name"]').val(name);
            $('#formUser [name="username"]').val(username);
            $('#formUser [name="email"]').val(email);
            $('#formUser [name="password"]').attr('required', false);
            $('#formUser [name="role"]').val(role);
            $('#formUser [name="status"]').val(status);
            $('#formUser').attr('action', '<?= base_url('admin/users/update/'); ?>'+id);
        });
    });
</script>
