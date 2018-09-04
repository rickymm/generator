<!--SELECTIZE.JS-->
<script type="text/javascript" src="<?php echo base_url('assets/plugins') ?>/selectize/dist/js/standalone/selectize.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins') ?>/selectize/dist/css/selectize.css" />
<!--TOASTR.JS-->
<script type="text/javascript" src="<?php echo base_url('assets/plugins') ?>/toastr/build/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins') ?>/toastr/build/toastr.min.css" />
<style type="text/css">
    .destaque{
        color: red;
    }
</style>
<script type="text/javascript">

    $(document).ready(function () {
        $('.div_schema').hide();
        $('.div_tabela').hide();
        <?php if(isset($mensagem)){ ?>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.success('Pasta criada com sucesso, checar na raiz do projeto em tmp/generator/...', 'Sucesso');
        <?php } ?>
        $('#banco').on('change', function () {
            var banco = $(this).val();
            $.ajax({
                url: "<?php echo base_url($change_banco); ?>/" + banco,
                type: "POST",
                success: function (r) {
                    $('#schema').html('');
                    var options = '<option selected>--Schemas--</option>';
                    for (var i = 0; i < r.data.length; i++) {
                        var el = r.data[i];
                        options += '<option value="' + el.name + '">' + el.name + '</option>';
                    }
                    $('#schema').append(options);
                    $('.div_schema').show();
                    $('.div_tabela').hide();
                }
            });
        });

        $('#schema').on('change', function () {
            var banco = $('#banco').val();
            var schema = $(this).val();
            $.ajax({
                url: "<?php echo base_url($change_schema); ?>/" + banco + "/" + schema,
                type: "POST",
                success: function (r) {
                    $('#tabela').html('');
                    var options = '<option selected>--Tabelas--</option>';
                    for (var i = 0; i < r.data.length; i++) {
                        var el = r.data[i];
                        options += '<option value="' + el.name + '">' + el.name + '</option>';
                    }
                    $('#tabela').append(options);
                    $('.div_tabela').show();
                }
            });
        });
    });

</script>