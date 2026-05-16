<?= view('layouts/header') ?>
<?php $errors = session()->getFlashdata('errors'); ?>

<h1 class="h3 mb-4 text-white-800"><?= $title; ?></h1>

<form id="formTeam" method="post" action="<?= $action; ?>" enctype="multipart/form-data">
    <div class="card card-dark mb-4">
        <div class="card-header">
            <span class="card-title">IDENTIDADE DO CAMPEONATO</span>
        </div>
        <div class="card-body py-3">
            <div class="row">
                <?= view('admin/components/image_upload', [
                    'name'  => 'logo',
                    'label' => 'Logo',
                    'class' => 'form-group col-2',
                    'value' => $team['logo'] ?? ''
                ]) ?>
                <div class="row col-10">
                    <div class="form-group col-6">
                        <label>Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="<?= $team['name'] ?? ''; ?>" placeholder="Digite o nome da equipe" required>
                        <?php if (!empty($errors['name'])) { ?>
                            <span class="text-danger"><?= $errors['name']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group col-6">
                        <label>Kartodromo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="<?= $team['name'] ?? ''; ?>" placeholder="Digite o nome da equipe" required>
                        <?php if (!empty($errors['name'])) { ?>
                            <span class="text-danger"><?= $errors['name']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Temporada</label>
                        <select name="championship_id" id="championship_id" class="form-control">
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                <?php $year = date('Y'); ?>
                                <option value="<?= $year + $i; ?>"><?= $year + $i; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['championship_id'])) { ?>
                            <span class="text-danger"><?= $errors['championship_id']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Número de Etapas</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-dark mb-4">
        <div class="card-header">
            <span class="card-title">CONFIGURAÇÕES DO CAMPEONATO</span>
        </div>
        <div class="card-body py-3">
            <div class="row">
                <div class="form-group col-3">
                    <label>Máx. de Pilotos</label>
                    <input type="number" class="form-control" name="name" value="<?= $team['name'] ?? ''; ?>">
                    <?php if (!empty($errors['name'])) { ?>
                        <span class="text-danger"><?= $errors['name']; ?></span>
                    <?php } ?>
                </div>
                <div class="form-group col-3">
                    <label>Máx. de Equipes</label>
                    <input type="number" class="form-control" name="name" value="<?= $team['name'] ?? ''; ?>">
                    <?php if (!empty($errors['name'])) { ?>
                        <span class="text-danger"><?= $errors['name']; ?></span>
                    <?php } ?>
                </div>
                <div class="form-group col-2 d-flex">
                    <div class="form-check form-switch align-items-end mb-2">
                        <input class="form-check-input" name="enable_fastest_lap" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1" <?= isset($championship['enable_fastest_lap']) && $championship['enable_fastest_lap'] == 1 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Melhor Volta</label>
                    </div>
                </div>
                <div class="form-group col-3 d-none">
                    <label>Pontuação Melhor Volta</label>
                    <input type="number" class="form-control" name="name" value="<?= $team['name'] ?? ''; ?>" disabled>
                    <?php if (!empty($errors['name'])) { ?>
                        <span class="text-danger"><?= $errors['name']; ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="card card-dark scoring-card">
                <div class="scoring-header">
                    <div class="scoring-title-wrapper">
                        <h5 class="scoring-title">
                            SISTEMA DE PONTUAÇÃO
                        </h5>
                        <span class="scoring-subtitle">
                            <i class="fas fa-info-circle"></i>
                            Defina a pontuação para cada posição
                        </span>
                    </div>
                    <button type="button" class="btn btn-scoring-add">
                        <i class="fas fa-plus"></i>
                        <span>Adicionar Posição</span>
                    </button>
                </div>
                <div class="scoring-body">
                    <div class="scoring-grid">
                        <div class="position-item">
                            <span class="position-label">1º</span>
                            <div class="position-input-wrapper">
                                <input type="number" class="form-control scoring-input" value="14">
                                <button type="button" class="btn-remove-position">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-form-actions">
        <a href="<?= base_url('admin/championships'); ?>" class="btn btn-secondary"> Cancelar </a>
        <button class="btn-racing-submit">
            <span class="kart-icon"> <?= file_get_contents(FCPATH . 'assets/img/kart_icon.svg') ?> </span>
            <span class="btn-text"> Salvar Campeonato </span>
        </button>
    </div>
</form>


<script src="<?= base_url('assets/admin/js/components/image-upload.js') ?>"></script>
<?= view('layouts/footer') ?>