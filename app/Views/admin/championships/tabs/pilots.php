<div id="pilots" class="championship-tab-div" style="display: none">
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <div class="card-title-wrapper">
                                <span class="card-title">Pilotos Inscritos</span>
                                <span class="card-subtitle">Gerencie os pilotos que estão participando deste campeonato.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 7%;">#</th>
                                            <th style="width: 40%;">Piloto</th>
                                            <th style="width: 7%;">Equipe</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="championship-pilots-table">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dark championship-team-actions">
                        <div class="card-header">
                            <div class="card-title-wrapper">
                                <span class="card-title"><i class="fas fa-flag-checkered mr-2"></i>INSCREVER PILOTO</span>
                                <span class="card-subtitle">Selecione um piloto para inscrever neste campeonato.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Piloto</label>
                                    <select name="pilot_id" id="pilot_id" class="form-control"> </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Equipe</label>
                                    <select name="pilot_id" id="pilot_team_id" class="form-control"> </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ms-auto">
                            <button id="btn-add-team" type="button" class="btn btn-primary">
                                <span class="kart-icon"> <?= file_get_contents(FCPATH . 'assets/img/kart_icon.svg') ?> </span>
                                <span class="btn-text">
                                    Inscrever
                                </span>
                            </button>
                        </div>
                        <div class="championship-limit-overlay">
                            <span class="limit-title">
                                Limite de pilotos atingido
                            </span>

                            <span class="limit-subtitle">
                                <?= $championship['team_max']; ?> /
                                <?= $championship['team_max']; ?>
                                pilotos inscritos
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-4 mt-2">
                    <div class="quick-create-inline">
                        <span class="quick-create-text">
                            Não encontrou o piloto?
                        </span>
                        <button type="button" class="btn-quick-inline" onclick="toggleCreatePilot(true)">
                            <i class="fas fa-plus"></i>
                            Cadastrar Novo Piloto
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div id="create-pilot-card" class="card card-dark mt-3" style="display: none;">
                        <div class="card-header">
                            <div class="card-title-wrapper">
                                <span class="card-title">
                                    Criar Novo Piloto
                                </span>
                                <span class="card-subtitle">
                                    Cadastre rapidamente um novo piloto e inscreva-o no campeonato.
                                </span>
                            </div>
                            <button type="button" class="btn-close-card" onclick="toggleCreatePilot(false)"> <i class="fas fa-times"></i> </button>
                        </div>
                        <form id="form-create-pilot">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-7">
                                        <label>Nome da Equipe</label>
                                        <input type="text" class="form-control" name="team_name" placeholder="Informe o nome da equipe">
                                    </div>

                                    <div class="form-group col-5">
                                        <label>Cor da Equipe</label>
                                        <input type="color" class="form-control" name="team_color" value="#fff">
                                    </div>
                                    <?= view('admin/components/image_upload', [
                                        'name'  => 'team_logo',
                                        'class' => 'col-12',
                                        'label' => 'Logo da Equipe',
                                        'value' => '',
                                    ]) ?>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" onclick="toggleCreatePilot(false)"> Cancelar </button>
                            <button type="button" class="btn btn-primary" id="btn-create-team">
                                <i class="fas fa-link"></i>
                                Cadastrar e Inscrever
                            </button>
                        </div>
                    </div>
                </div> <!-- COL CREATE TEAM -->
            </div>
        </div>
    </div>
</div>