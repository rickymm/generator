<script type='text/javascript'>

            $(document).ready(function () {
                $('#datatables').DataTable({
                    ajax: '<?php echo base_url($json); ?>',
                    columns:
                            [
                                {
                                    'data': 'id_campo',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'desc_campo',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'tipo_campo',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'id_pai',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },
                                {
                                    'data': 'name',
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
                            ],
						responsive: true			
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