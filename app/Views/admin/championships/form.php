<?= view('layouts/header') ?>
<?php $errors = session()->getFlashdata('errors'); ?>

<h1 class="h3 mb-4 text-white-800"><?= $title; ?></h1>

<div class="card card-dark mb-4">
    <div class="card-body py-1">
        <form id="formTeam" method="post" action="<?= $action; ?>" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                    <?= view('admin/components/image_upload', [
                        'name'  => 'logo',
                        'label' => 'Logo',
                        'class' => 'form-group col-2',
                        'value' => $team['logo'] ?? ''
                    ]) ?>
                    <div class="row col-10">
                        <div class="form-group col-12">
                            <label>Nome <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="<?= $team['name'] ?? ''; ?>" placeholder="Digite o nome da equipe" required>
                            <?php if (!empty($errors['name'])) { ?>
                                <span class="text-danger"><?= $errors['name']; ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group col-2">
                            <label>Cor da Equipe</label>
                            <input type="color" class="form-control" name="color" value="<?= $team['color'] ?? ''; ?>" placeholder="Digite o username" required>
                        </div>
                        <div class="form-group col-10">
                            <label>Campeonato</label>
                            <select name="championship_id" id="championship_id" class="form-control">
                                <option value="">Selecione o campeonato</option>
                            </select>
                            <?php if (!empty($errors['championship_id'])) { ?>
                                <span class="text-danger"><?= $errors['championship_id']; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('admin/teams'); ?>" class="btn btn-secondary"> Cancelar </a>
                <button class="btn-racing-submit">
                    <span class="kart-icon">
                        <?= file_get_contents(FCPATH . 'assets/img/kart_icon.svg') ?>
                    </span>
                    <span class="btn-text">
                        Salvar Campeonato
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url('assets/admin/js/components/image-upload.js') ?>"></script>
<?= view('layouts/footer') ?>