<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('appModel');
    }

    public function index() {
        $this->consultar();
    }

    public function consultar($msg = null) {
        $param = array(
            'view' => 'gerador/app/index',
            'titulo' => 'Generator',
            'gerar' => 'gerador/app/gerar',
            'change_banco' => 'gerador/app/consultarSchemas',
            'change_schema' => 'gerador/app/consultarTabelas',
            'subtitulo' => 'Seu gerador de códigos favorito'
        );

        if (!is_null($msg)) {
            $param['mensagem'] = $msg;
        }

        $this->load->view('includes/core', $param);
    }

    public function consultarSchemas($banco) {
        switch ($banco) {
            case 'mysql':
                $consulta = $this->appModel->consultarSchemasMysql();
                break;
            case 'sqlsrv':
                $consulta = $this->appModel->consultarSchemasSqlSrv();
                break;
        }

        $param = array(
            'dataSource' => $consulta
        );
        $this->load->view('crud/json', $param);
    }

    public function consultarTabelas($banco, $schema) {
        switch ($banco) {
            case 'mysql':
                $consulta = $this->appModel->consultarTabelasMysql($schema);
                break;
            case 'sqlsrv':
                $consulta = $this->appModel->consultarTabelasSqlSrv($schema);
                break;
        }

        $param = array(
            'dataSource' => $consulta
        );
        $this->load->view('crud/json', $param);
    }

    public function gerar() {
        if ($dados = $this->input->post()) {
            switch ($dados['banco']) {
                case 'mysql':
                    $colunas = $this->appModel->descreverTabelaMysql($dados['schema'], $dados['tabela']);
                    foreach ($colunas as $coluna) {
                        if ($coluna->Key == 'PRI') {
                            $dados['pkey'] = $coluna->Field;
                            break;
                        }
                    }
                    break;
                case 'sqlsrv':
                    $colunas = $this->appModel->descreverTabelaSqlSrv($dados['schema'], $dados['tabela']);

                    //Fixei a primary key como o primeiro campo da consulta que está ordenada pela posição do campo no banco
                    $dados['pkey'] = $colunas[0]->Field;
                    $dados['tabela'] = $dados['schema'] . '.dbo.' . $dados['tabela'];
                    break;
            }
            $this->criarDiretorios($dados['modulo'], $dados['controller'], $dados['model']);
            $this->montarController($dados['modulo'], $dados['controller'], $dados['model'], $dados['titulo'], $dados['subtitulo']);
            $this->montarModel($dados['modulo'], $dados['model'], $dados['tabela'], $dados['pkey'], $dados['order_by']);
            $this->montarViews($colunas, $dados['modulo'], $dados['controller'], $dados['pkey']);
//            mostrar mensagem de sucesso
            redirect('gerador/app/consultar/success');
        }
    }

    private function criarDiretorios($modulo, $controller, $model) {
        $tmp_generator = 'tmp/generator/';
        $dir_modulo = $tmp_generator . $modulo . '/';

        if (!is_dir($tmp_generator) && !file_exists($tmp_generator)) {
            mkdir($tmp_generator, 0777);
        }

        if (!file_exists($dir_modulo)) {
            //Cria o modulo
            mkdir($dir_modulo, 0777);
        }

        //Cria a pasta Controller e o arquivo
        if (!file_exists($dir_modulo . 'controllers/')) {
            mkdir($dir_modulo . 'controllers/', 0777);
        }
        if (!file_exists($dir_modulo . 'controllers/' . $controller . '.php')) {
            fopen($dir_modulo . 'controllers/' . $controller . '.php', 'w');
        }

        //Cria a pasta Model e o arquivo
        if (!file_exists($dir_modulo . 'models/')) {
            mkdir($dir_modulo . 'models/', 0777);
        }
        if (!file_exists($dir_modulo . 'models/' . $model . '.php')) {
            fopen($dir_modulo . 'models/' . $model . '.php', 'w');
        }

        //Cria a pasta Views e o Index, Form e Custom
        if (!file_exists($dir_modulo . 'views/')) {
            mkdir($dir_modulo . 'views/', 0777);
        }
        if (!file_exists($dir_modulo . 'views/' . strtolower($controller) . '/')) {
            mkdir($dir_modulo . 'views/' . strtolower($controller) . '/', 0777);
            fopen($dir_modulo . 'views/' . strtolower($controller) . '/index.php', 'w');
            fopen($dir_modulo . 'views/' . strtolower($controller) . '/form.php', 'w');
            fopen($dir_modulo . 'views/' . strtolower($controller) . '/custom.php', 'w');
        }
    }

    private function montarController($modulo, $controller, $model, $titulo, $subtitulo) {
        $content = "<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class " . $controller . " extends MX_Controller {

    public function __construct() {
        parent::__construct();
        \$this->load->model('" . $model . "');
    }

    public function index(){
        \$this->consultar();
    }
    
    public function consultar(\$filtro = null, \$retorno = null) {
        if (is_null(\$filtro) && is_null(\$retorno)) {
            \$param = array(
                'view' => '" . $modulo . "/" . strtolower($controller) . "/index',
                'titulo' => '" . $titulo . "',
                'subtitulo' => '" . $subtitulo . "',
                'json' => '" . $modulo . "/" . $controller . "/consultar/null/json',
                'editar' => '" . $modulo . "/" . $controller . "/editar',
                'salvar' => '" . $modulo . "/" . $controller . "/salvar',
                'excluir' => '" . $modulo . "/" . $controller . "/remover'
            );
            \$this->load->view('includes/core', \$param);
        }
         if (!is_null(\$retorno) && \$retorno == 'json') {
            \$consulta = \$this->" . $model . "->consultar(null, \$retorno);
            \$param = array(
                'dataSource' => \$consulta
            );
            \$this->load->view('crud/json', \$param);
        }
    }
    
     public function consultarFiltro(\$filtro, \$retorno = null) {
            \$consulta = \$this->" . $model . "->consultar(\$filtro, \$retorno);
            \$param = array(
                'dataSource' => \$consulta
            );
            \$this->load->view('crud/json', \$param);
    }

    public function form() {
        \$param = array(
            'view' => '" . $modulo . "/form',
            'custom' => 'true',
            'modulo' => 'true'
        );
        \$this->load->view('includes/core', \$param);
    }

    public function salvar() {
        if (\$this->input->server('REQUEST_METHOD') == 'POST') {
            \$post = \$this->input->post();
            if (\$result = \$this->" . $model . "->salvar(\$post)) {
                \$this->setSessionMessage('Operação realizada com sucesso', 'alert alert-success');
            } else {
                \$this->setSessionMessage('Falha ao realizar operação favor verificar os dados e tentar novamente', 'alert alert-danger');
            }
        }
        redirect(base_url('" . $modulo . "/" . $controller . "/consultar'));
    }

    public function editar(\$id) {
        \$result = \$this->consultarFiltro(\$id, 'json');
    }

    public function remover(\$id) {
        if (\$this->input->server('REQUEST_METHOD') == 'POST') {
            \$this->" . $model . "->excluir(\$id);
        }
    }

    public function todos() {
        return \$consulta = \$this->" . $model . "->consultar();
    }
}";
        return file_put_contents("tmp/generator/$modulo/controllers/$controller.php", $content);
    }

    private function montarModel($modulo, $model, $tabela, $pkey, $order_by) {
        $content = "<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class " . $model . " extends Crud {

    private \$table = '" . $tabela . "';
    private \$primary_key = '" . $pkey . "';

    public function __construct() {
        parent::__construct();
        //\$this->output->enable_profiler(true);
    }

    public function consultar(\$filter = null) {

        if (is_array(\$filter)) {
            \$filtros = array();
            foreach (\$filter as \$key => \$value) {
                \$filtros[\$key] = \$value;
            }
            \$dados = Array(
                'table' => \$this->table,
                'fields' => \$filtros,
                'operator' => 'and',
                'order_by' => '" . $order_by . "',
                'order_type' => 'asc'
            );
        }
        if (is_numeric(\$filter)) {
            \$dados = Array(
                'table' => \$this->table,
                'fields' => array(\$this->primary_key => \$filter),
                'operator' => '=',
                'order_by' => '" . $order_by . "',
                'order_type' => 'asc'
            );
        }
        if (empty(\$filter)) {
            \$dados = Array(
                'table' => \$this->table,
                'order_by' => '" . $order_by . "',
                'order_type' => 'asc'
            );
        }
        return \$this->select(\$dados);
    }

    public function salvar(\$dados) {
        if (!empty(\$dados[\$this->primary_key])) {
            return \$this->atualizar(\$dados);
        } else {
            return \$this->inserir(\$dados);
        }
    }

    private function atualizar(\$var) {
        foreach (\$var as \$campos => \$valores) {
            \$fields[\$campos] = \$valores;
        }
        \$criterios = Array(
            \$this->primary_key => \$fields[\$this->primary_key]
        );
        unset(\$fields[\$this->primary_key]);
        \$filter = Array(
            'table' => \$this->table,
            'fields' => \$fields,
            'criteria' => \$criterios
        );
        \$dados = \$this->update(\$filter);
        return \$dados;
    }

    private function inserir(\$var) {
        if (empty(\$var[\$this->primary_key])) {
            unset(\$var[\$this->primary_key]);
        }
        foreach (\$var as \$campos => \$valores) {
            \$fields[\$campos] = \$valores;
        }
        \$filter = Array(
            'table' => \$this->table,
            'fields' => \$fields
        );
       \$dados = \$this->insert(\$filter);
        return \$dados;
    }

    public function excluir(\$id) {
        \$fields = Array(
            \$this->primary_key => \$id
        );
        \$filter = Array(
            'table' => \$this->table,
            'fields' => \$fields
        );
        \$dados = \$this->delete(\$filter);
        return \$dados;
    }

}";
        return file_put_contents("tmp/generator/$modulo/models/$model.php", $content);
    }

    private function montarViews($colunas, $modulo, $controller, $pkey) {
        $form = '<div class="card-body">
    <!-- CAMPO HIDDEN UTILIZADO PARA EDIÇÃO -->
    <input type="text" name="' . $pkey . '" id="' . $pkey . '" class="form-control" hidden />
    <div class="form-row">';
        foreach ($colunas as $coluna) {
            if ($coluna->Field != $pkey) {
                $form .= '
        <div class="form-group col-md-6 col-xs-12">
            <label>' . ucwords(strtolower($coluna->Field)) . '</label>
                <input type="' . ($coluna->Type == "date" || $coluna->Type == "datetime" || substr($coluna->Type, 0, 3) == "dt_" ? "date" : "text") . '" name="' . $coluna->Field . '" id="' . $coluna->Field . '" class="form-control"' . ($coluna->Null == "NO" ? " required" : "") . ' />
        </div>';
            }
        }
        $form .= '
    </div>
    <div class="form-row">
        <button type="submit" id="salvar" class="btn btn-success">
            Salvar
        </button>
        <button type="button" id="fechar" class="btn btn-primary" data-dismiss="modal">
            Fechar
        </button>
    </div>
</div>';
        file_put_contents("tmp/generator/$modulo/views/" . strtolower($controller) . "/form.php", $form);

        $index = '<div class="content">
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
                            <thead class="text-primary">';
        foreach ($colunas as $coluna) {
            $index .= '
                                <th>' . ucwords(strtolower($coluna->Field)) . '</th>';
        }
        $index .= '
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
                    <?php $this->load->view("' . $modulo . '/' . strtolower($controller) . '/form")?>
                </form>
            </div>
        </div>
    </div>
</div>';
        file_put_contents("tmp/generator/$modulo/views/" . strtolower($controller) . "/index.php", $index);

        $custom = "<script type='text/javascript'>

            $(document).ready(function () {
                $('#datatables').DataTable({
                    ajax: '<?php echo base_url(\$json); ?>',
                    columns:
                            [";
        foreach ($colunas as $coluna) {
            $custom .= "
                                {
                                    'data': '" . $coluna->Field . "',
                                    'visible': true,
                                    'render': function (data, type, row, meta) {
                                        return data;
                                    }
                                },";
        }
        $custom .= " {
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
                            url: '<?php echo base_url(\$excluir); ?>/' + id,
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
                        url: '<?php echo base_url(\$editar); ?>/' + id,
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

        </script>";
        file_put_contents("tmp/generator/$modulo/views/" . strtolower($controller) . "/custom.php", $custom);
        return;
        //$custom = '';
    }

}
