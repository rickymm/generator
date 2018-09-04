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
                                <th>Id</th>
                                <th>Sequencia</th>
                                <th>Ano</th>
                                <th>Protocolo</th>
                                <th>Agente</th>
                                <th>Inicioatendimento</th>
                                <th>Finalatendimento</th>
                                <th>Promocao</th>
                                <th>Parceiro</th>
                                <th>Cupom</th>
                                <th>Site</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Sexo</th>
                                <th>Cpf</th>
                                <th>Email</th>
                                <th>Gsm</th>
                                <th>Tel</th>
                                <th>Logradouro</th>
                                <th>Numero</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Cep</th>
                                <th>Linha_produto</th>
                                <th>Produto</th>
                                <th>Numero_produo</th>
                                <th>Qde</th>
                                <th>Valor_unitario</th>
                                <th>Suporte_envio</th>
                                <th>Tipo_pagamento</th>
                                <th>Organismo</th>
                                <th>Agencia</th>
                                <th>Numero_conta</th>
                                <th>Cvv</th>
                                <th>Data_vencimento</th>
                                <th>Frequencia</th>
                                <th>Fracionamento</th>
                                <th>Melhor_data</th>
                                <th>Pagamento</th>
                                <th>Status_resposta</th>
                                <th>Descricao_resposta</th>
                                <th>Callid</th>
                                <th>Telefonecontatado</th>
                                <th>Idcelula</th>
                                <th>Mailing_id</th>
                                <th>Venda_efetuada</th>
                                <th>Caso_nao_motivo</th>
                                <th>Caso_nao_observacao</th>
                                <th>Pessoacerta</th>
                                <th>Ofertou</th>
                                <th>Aceitouoferta</th>
                                <th>Motivo</th>
                                <th>Atendeu</th>
                                <th>Insatisfacao</th>
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
                    <?php $this->load->view("fasdsa/sadasds/form")?>
                </form>
            </div>
        </div>
    </div>
</div>