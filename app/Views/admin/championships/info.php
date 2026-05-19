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
                    'value' => $championship['logo'] ?? ''
                ]) ?>
                <div class="row col-10">
                    <div class="form-group col-6">
                        <label>Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="<?= $championship['name'] ?? ''; ?>" placeholder="Digite o nome da equipe" required>
                        <?php if (!empty($errors['name'])) { ?>
                            <span class="text-danger"><?= $errors['name']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group col-6">
                        <label>Kartodromo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="kartodrome" value="<?= $championship['kartodrome'] ?? ''; ?>" placeholder="Digite o nome da equipe" required>
                        <?php if (!empty($errors['kartodrome'])) { ?>
                            <span class="text-danger"><?= $errors['kartodrome']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Temporada</label>
                        <select name="season" id="season" class="form-control">
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                <?php $year = date('Y'); ?>
                                <option value="<?= $year + $i; ?>"><?= $year + $i; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['season'])) { ?>
                            <span class="text-danger"><?= $errors['season']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Número de Etapas</label>
                        <input type="number" class="form-control" name="rounds" value="<?= $championship['rounds'] ?? ''; ?>">
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
                    <input type="number" class="form-control" name="pilot_max" value="<?= $championship['pilot_max'] ?? ''; ?>">
                    <?php if (!empty($errors['pilot_max'])) { ?>
                        <span class="text-danger"><?= $errors['pilot_max']; ?></span>
                    <?php } ?>
                </div>
                <div class="form-group col-3">
                    <label>Máx. de Equipes</label>
                    <input type="number" class="form-control" name="team_max" value="<?= $championship['team_max'] ?? ''; ?>">
                    <?php if (!empty($errors['team_max'])) { ?>
                        <span class="text-danger"><?= $errors['team_max']; ?></span>
                    <?php } ?>
                </div>
                <div class="form-group col-2 d-flex">
                    <div class="form-check form-switch align-items-end mb-2">
                        <input class="form-check-input" name="enable_fastest_lap" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1" <?= isset($championship['enable_fastest_lap']) && $championship['enable_fastest_lap'] == 1 ? 'checked' : ''; ?> onclick="toggleFastestLap(this)">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Melhor Volta</label>
                    </div>
                </div>
                <div id="fastest_lap_points" class="form-group col-3" <?= isset($championship['enable_fastest_lap']) && $championship['enable_fastest_lap'] == 1 ? '' : 'style="display: none;"'; ?>>
                    <label>Pontuação Melhor Volta</label>
                    <input type="number" class="form-control" name="fastest_lap_points" value="<?= $championship['fastest_lap_points'] ?? ''; ?>" <?= isset($championship['enable_fastest_lap']) && $championship['enable_fastest_lap'] == 1 ? '' : 'disabled'; ?>>
                    <?php if (!empty($errors['fastest_lap_points'])) { ?>
                        <span class="text-danger"><?= $errors['fastest_lap_points']; ?></span>
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
                        <?php $points_system = json_decode($championship['points_system_json']); ?>
                        <?php foreach ($points_system as $key => $point) { ?>
                            <div class="position-item">
                                <span class="position-label"><?= $key +1; ?>º</span>
                                <div class="position-input-wrapper">
                                    <input type="number" name="points_system[]" class="form-control scoring-input" value="<?= $point; ?>">
                                    <button type="button" class="btn-remove-position" onclick="removeItem(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
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


<script>
    $(document).ready(function() {
        $('.btn-scoring-add').on('click', function () {
            $position = $('.position-item').length

            $html = `
                    <div class="position-item">
                        <span class="position-label">${$position + 1}º</span>
                        <div class="position-input-wrapper">
                            <input type="number" name="points_system[]" class="form-control scoring-input" value="">
                            <button type="button" class="btn-remove-position" onclick="removeItem(this)">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>`;

            $('.scoring-grid').append($html)
        });
    });

    function removeItem(element) {
        $(element).closest('.position-item').remove();

        $('.position-item').each(function(index) {
            $(this).find('.position-label').text((index + 1) + 'º');
        });
    }

    function toggleFastestLap(element) {
        if ($(element).is(':checked')) {
            $('#fastest_lap_points').show();
            $('#fastest_lap_points input').prop('disabled', false);
        } else {
            $('#fastest_lap_points').hide();
            $('#fastest_lap_points input').prop('disabled', true);
        }
    }
</script>