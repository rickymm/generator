<script type='text/javascript'>

            $(document).ready(function () {
                $('#datatables').DataTable({
                    ajax: '<?php echo base_url($json); ?>',
                    columns:
                            [
                                {
                                    'data': 'Id',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Sequencia',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Ano',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Protocolo',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Agente',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'InicioAtendimento',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'FinalAtendimento',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Promocao',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Parceiro',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Cupom',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Site',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Nome',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Sobrenome',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Sexo',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Cpf',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Email',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Gsm',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Tel',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Logradouro',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Numero',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Complemento',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Bairro',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Cidade',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Estado',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Cep',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Linha_Produto',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Produto',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'numero_produo',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'qde',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'valor_unitario',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'suporte_envio',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'tipo_pagamento',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'organismo',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'agencia',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'numero_conta',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'cvv',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'data_vencimento',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'frequencia',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Fracionamento',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'melhor_data',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'pagamento',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'status_resposta',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'descricao_resposta',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'CallId',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'TelefoneContatado',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'IdCelula',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'mailing_id',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Venda_Efetuada',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'caso_nao_motivo',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'caso_nao_observacao',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'PessoaCerta',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Ofertou',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'AceitouOferta',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Motivo',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Atendeu',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'Insatisfacao',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                }, {
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return `<td class='td-actions text-right'><button type='button' rel='tooltip' id='btn_editar' title='Editar' class='btn btn-primary btn-link btn-sm'><i class='material-icons'>edit</i></button><button type='button' rel='tooltip' title='Excluir' id='btn_excluir' name='btn_excluir' class='btn btn-danger btn-link btn-sm'><i class='material-icons'>close</i></button></td>`;
                                    }
                                }
                            ] 
                });

                //Função para remoção do item da linha selecionada dinamicamente
                $('body').on('click', '#btn_excluir', function () {
                    var row = $(this).parents('tr')[0];
                    var id = row.cells[0].innerText;
                    if (confirm('Deseja realmente excluir esse registro?')) {
                        $.ajax({
                            url: '<?php echo base_url($excluir); ?>/' + id,
                            method: 'POST',
                            success: function (data) {
                                location.reload();
                            },
                            error: function () {
                                console.log('alguma coisa deu errado no servidor..');
                            }
                        });
                    }
                });
                
                $('body').on('click', '#btn_editar', function () {
                    var row = $(this).parents('tr')[0];
                    var id = row.cells[0].innerText;
                    $.ajax({
                        url: '<?php echo base_url($editar); ?>/' + id,
                        method: 'POST',
                        success: function (data) {
                            var obj = data.data[0];
                            $.each(obj, function (k, val) {
                                $('#' + k).val(val);
                            });
                            $('#modal_adicionar').modal('show');
                        },
                        error: function () {
                            console.log('alguma coisa deu errado no servidor..');
                        }
                    });
                });

                $('body').on('click', '#btn_adicionar', function () {
                    $('#modal_adicionar').modal('show');
                    $('input').each(function () {
                        $(this).val('');
                    });
                });
            });

        </script>