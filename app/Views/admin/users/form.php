<?= view('layouts/header') ?>
<?php $errors = session()->getFlashdata('errors'); ?>

<h1 class="h3 mb-4 text-white-800"><?= $title; ?></h1>

<div class="card card-dark mb-4">
    <div class="card-body py-1">
        <form id="formUser" method="post" action="<?= $action; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nome <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="<?= $user['name'] ?? ''; ?>" placeholder="Digite o nome" required>
                </div>
                <div class="form-group">
                    <label>Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="username" value="<?= $user['username'] ?? ''; ?>" placeholder="Digite o username" required>
                </div>
                <div class="form-group">
                    <label>E-mail <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="<?= $user['email'] ?? ''; ?>" placeholder="Digite o e-mail do usuário" required>
                </div>
                <div class="form-group">
                    <label>Senha <?= empty($user['id']) ? '<span class="text-danger">*</span>' : ''; ?></label>
                    <input type="password" class="form-control" name="password" placeholder="Digite a senha" <?= empty($user['id']) ? 'required' : ''; ?>>
                    <?php if (!empty($errors['password'])) { ?>
                        <span class="text-danger"><?= $errors['password']; ?></span>
                    <?php } ?>
                </div>
                <input type="hidden" class="form-control" name="role" value="admin">
                <div class="form-check form-switch">
                    <input class="form-check-input" name="status" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1" <?= isset($user['status']) && $user['status'] == 1 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Ativo</label>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('admin/users'); ?>" class="btn btn-secondary"> Cancelar </a>
                <button type="submit" class="btn btn-primary"> Salvar </button>
            </div>
        </form>
    </div>
</div>


<?= view('layouts/footer') ?>