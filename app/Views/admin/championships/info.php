<?= view('layouts/header') ?>
<link rel="stylesheet" href="<?= base_url('assets/admin/css/championship.css') ?>">

<?php $errors = session()->getFlashdata('errors'); ?>

<div class="championship-hero">
    <div>
        <div class="d-flex align-items-center gap-3">
            <h1 class="championship-title">
                <?= $championship['name']; ?>
            </h1>

            <span class="badge badge-success">
                ATIVO
            </span>
        </div>

        <div class="championship-meta">
            <span>Temporada: <?= $championship['season']; ?></span>
            <span>•</span>
            <span>Kartódromo: <?= $championship['kartodrome']; ?></span>
            <span>•</span>
            <span><?= $championship['rounds']; ?> Etapas</span>
        </div>
    </div>
</div>

<ul class="championship-tabs">
    <li> <a id="tab-classification" onclick="changeTab('classification')" class="active"> Classificação </a> </li>
    <li> <a id="tab-rounds" onclick="changeTab('rounds')" class=""> Etapas </a> </li>
    <li> <a id="tab-pilots" onclick="changeTab('pilots')" class=""> Pilotos </a> </li>
    <li> <a id="tab-teams" onclick="changeTab('teams')" class=""> Equipes </a> </li>
    <li> <a id="tab-settings" onclick="changeTab('settings')" class=""> Configurações </a> </li>
</ul>

<div id="classification" class="championship-tab-div">
    <div class="card card-dark mb-4">
        <div class="card-header">
            <span class="card-title">CLASSIFICAÇÃO</span>
        </div>
    </div>
</div>

<div id="rounds" class="championship-tab-div" style="display: none">
    <div class="card card-dark mb-4">
        <div class="card-header">
            <span class="card-title">ETAPAS</span>
        </div>
    </div>
</div>

<?= view('admin/championships/tabs/pilots') ?>

<?= view('admin/championships/tabs/teams') ?>

<div id="settings" class="championship-tab-div" style="display: none">
    <form id="formChampionship" method="post" action="<?= $action; ?>" enctype="multipart/form-data">
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
                                    <span class="position-label"><?= $key + 1; ?>º</span>
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
</div>

<script src="<?= base_url('assets/admin/js/components/image-upload.js') ?>"></script>
<?= view('layouts/footer') ?>

<script>
    const championship_id = <?= $championship['id']; ?>;

    $(document).ready(function() {
        $('.btn-scoring-add').on('click', function() {
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

        loadTeamsOptions();
        loadChampionshipTeams();
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

    function changeTab(active_tab) {
        $('.championship-tab-div').hide();
        $('.championship-tabs a').removeClass('active');
        $(`#tab-${active_tab}`).addClass('active');
        $(`#${active_tab}`).show();
    }

    function loadTeamsOptions() {
        $.ajax({
            url: '<?= base_url('/admin/championships/getAvailableTeams'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {

                let html = `
                    <option value="">
                        Selecione uma equipe
                    </option>
                `;

                response.forEach(team => {

                    html += `
                        <option
                            value="${team.id}"
                            data-logo="${team.logo}"
                        >
                            ${team.name}
                        </option>
                    `;
                });

                $('#team_id').html(html);

                initTeamSelect();
            }
        });
    }

    function initTeamSelect() {
        if ($('#team_id').hasClass('select2-hidden-accessible')) {
            $('#team_id').select2('destroy');
        }

        $('#team_id').select2({
            placeholder: 'Selecione uma equipe',

            templateResult: formatTeamOption,
            templateSelection: formatTeamOption,

            escapeMarkup: function(markup) {
                return markup;
            }
        });

    }

    function formatTeamOption(team) {
        if (!team.id) {
            return team.text;
        }

        let logo = $(team.element).data('logo');

        return `
            <div class="team-select-option">
                <img src="${logo}"
                    class="team-select-logo">

                <span>
                    ${team.text}
                </span>
            </div>
        `;
    }

    function loadChampionshipTeams() {
        $.ajax({
            url: '<?= base_url('/admin/championships/getChampionshipTeams'); ?>/' + championship_id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let html = '';
                if (response.length === 0) {
                    html = `
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Nenhuma equipe vinculada ao campeonato.
                            </td>
                        </tr>
                    `;
                } else {
                    response.forEach(team => {
                        html += `
                            <tr id="team-${team.id}" class="team-row" style="--team-color: ${team.color};">
                                <td>
                                    <div class="d-flex align-items-center gap-4">
                                        ${team.id}
                                    </div>
                                </td>
                                <td>
                                    <div class="team-info">
                                        <div class="team-logo">
                                            <img src="${team.logo}" alt="">
                                        </div>
                                        <div class="team-content">
                                            <div class="team-name">
                                                ${team.name}
                                            </div>
                                            <small class="team-championship">
                                                &nbsp;
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <span class="team-color" style="background: ${team.color}"> </span>
                                        ${team.color}
                                    </div>
                                </td>
                                <td class="text-right">
                                    <button type="button" class="btn-remove-team" onclick="removeTeam(${team.id})">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                }
                $('#championship-teams-table').html(html);
                
                if (response.length >= <?= $championship['team_max']; ?>) {
                    $('.quick-create-inline').hide();
                    $('.championship-team-actions').addClass('championship-limit-reached');
                    $('.limit-subtitle').text(response.length + ' / <?= $championship['team_max']; ?> equipes cadastradas')
                } else {
                    $('.quick-create-inline').show();
                    $('.championship-team-actions').removeClass('championship-limit-reached');
                }
            }
        });
    }

    function removeTeam(team_id) {
        if (!team_id) {
            return;
        }

        showLoading();

        $.ajax({
            url: '<?= base_url('admin/championships/removeTeam'); ?>',
            type: 'POST',
            data: {
                team_id: team_id
            },
            dataType: 'json',
            beforeSend: function () {
                $('#team-'+team_id).remove();
            },
            success: function(response) {
                hideLoading();
                loadTeamsOptions();
                loadChampionshipTeams();
            },
            error: function() {
                hideLoading();
            }
        });
    }

    $('#btn-add-team').on('click', function () {
        let team_id = $('#team_id').val();

        if (!team_id) {
            return;
        }

        showLoading();

        $.ajax({
            url: '<?= base_url('admin/championships/addTeam'); ?>',
            type: 'POST',
            data: {
                championship_id: championship_id,
                team_id: team_id
            },
            dataType: 'json',
            success: function(response) {
                loadTeamsOptions();
                loadChampionshipTeams();
                hideLoading();
            }
        });
    });

    function toggleCreateTeam(show = true) {

        if (show) {
            $('#create-team-card').slideDown(180);
        } else {
            $('#create-team-card').slideUp(180);
        }

    }

    $('#btn-create-team').on('click', function () {
        let form = $('#form-create-team')[0];
        let formData = new FormData(form);

        formData.append(
            'championship_id',
            championship_id
        );

        showLoading();

        $.ajax({
            url: '<?= base_url('admin/championships/createTeam'); ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                hideLoading();

                if (!response.success) {
                    alert(response.message);
                    return;
                }

                alert(response.message);

                $('#form-create-team')[0].reset();
                toggleCreateTeam(false);
                loadTeamsOptions();
                loadChampionshipTeams();
            }
        });
    });

</script>