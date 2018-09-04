<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title "><?php echo $titulo ?></h4>
                        <p class="card-category"><?php echo $subtitulo ?></p>
                        <!-- BOTÃO ADICIONAR QUE CHAMA O MODAL -->
                        <button type="button" id="btn_adicionar" class="btn btn-success" data-toggle="modal" data-target="#modal_adicionar">
                            Adicionar
                        </button>
                    </div>
                    <!-- CRIAR UMA TABELA OU ALGO PARA VISUALIZAR OS DADOS INSERIDOS NA TABELA-->
                    <div class="table-responsive">
                        <table class="table" id="datatables" name="datatables" cellspacing="0" >
                            <thead class="text-primary">
                                <th>Id_campo</th>
                                <th>Desc_campo</th>
                                <th>Tipo_campo</th>
                                <th>Id_pai</th>
                                <th>Name</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_adicionar" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">ADICIONAR</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url("$salvar"); ?>" enctype="multipart/form-data">
                    <?php $this->load->view("test/test/form")?>
                </form>
            </div>
        </div>
    </div>
</div>