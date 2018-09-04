<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title "><?php echo $titulo ?></h4>
                        <p class="card-category"><?php echo $subtitulo ?></p>
                    </div>
                    <form action="<?php echo base_url($gerar) ?>" method="POST">
                        <div class="card-body">
                            <small class="destaque">
                                Seguir padrão de letras Maiúsculas e minúsculas destacadas em vermelho.
                            </small>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="bmd-label-floating">Módulo <small>(Ex: <span class="destaque">f</span>inanceiro)</small></label>
                                    <input type="text" id="modulo" name="modulo" class="form-control" required/>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="bmd-label-floating">Controller <small>(Ex: <span class="destaque">F</span>inanceiro)</small></label>
                                    <input type="text" id="controller" name="controller" class="form-control" required/>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="bmd-label-floating">Model <small>(Ex: <span class="destaque">F</span>inanceiro<span class="destaque">M</span>odel)</small></label>
                                    <input type="text" id="model" name="model" class="form-control" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="bmd-label-floating">Título</label>
                                    <input type="text" id="titulo" name="titulo" class="form-control" required/>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="bmd-label-floating">Subtítulo</small></label>
                                    <input type="text" id="subtitulo" name="subtitulo" class="form-control" required/>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="bmd-label-floating">Campo de ordenação</small></label>
                                    <input type="text" id="order_by" name="order_by" class="form-control" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <select id="banco" name="banco" class="form-control" required>
                                        <option value="" selected>--Banco--</option>
                                        <option value="sqlsrv">Sql Server</option>
                                        <option value="mysql">MySQL</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group div_schema">
                                    <select id="schema" name="schema" class="form-control" required>
                                        <option value="" selected>--Schemas--</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group div_tabela">
                                    <select id="tabela" name="tabela" class="form-control" required>
                                        <option value="" selected>--Tabelas--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                &nbsp;&nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary btn-round btn-fab">
                                    <i class="material-icons">add</i>
                                    <div class="ripple-container">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>