<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AlertaCompras extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AlertaComprasModel');
    }

    public function consultar($filtro = null, $retorno = null) {
        if (is_null($filtro) && is_null($retorno)) {
            $param = array(
                'view' => 'alertacompras/index',
                'titulo' => 'AlertaCompras',
                'subtitulo' => 'CRUD Alerta Compras',
                'custom' => 'true',
                'modulo' => 'true',
                'json' => 'encarte/alertacompras/consultar/null/json',
                'editar' => 'encarte/alertacompras/editar',
                'excluir' => 'encarte/alertacompras/remover'
            );
            $this->load->view('includes/core', $param);
        }
        if (is_numeric($filtro) && !is_null($retorno) && $retorno == 'json') {
            $consulta = $this->AlertaComprasModel->consultar($filtro, $retorno);
            $param = array(
                'dataSource' => $consulta
            );
            $this->load->view('core/crud/json', $param);
        } else if (is_numeric($filtro) || is_array($filtro)) {
            $consulta = $this->AlertaComprasModel->consultar($filtro);
            return $consulta;
        } else if (!is_null($retorno) && $retorno == 'json') {
            $consulta = $this->AlertaComprasModel->consultar(null, $retorno);
            $param = array(
                'dataSource' => $consulta
            );
            $this->load->view('core/crud/json', $param);
        }
    }

    public function form() {
        $param = array(
            'view' => 'alertacompras/form',
            'custom' => 'true',
            'modulo' => 'true'
        );
        $this->load->view('includes/core_single', $param);
    }

    public function salvar($modal = null) {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $post = $this->input->post();
            if ($result = $this->AlertaComprasModel->salvar($post)) {
                $this->setSessionMessage('Operação realizada com sucesso', 'alert alert-success');
            } else {
                $this->setSessionMessage('Falha ao realizar operação favor verificar os dados e tentar novamente', 'alert alert-danger');
            }
        }
        if ($modal == true) {
            return $result;
        } else {
            redirect(base_url('encarte/alertacompras/consultar'));
        }
    }

    public function editar($id) {
        $result = $this->consultar($id);
        $param = array(
            'dataSource' => $result
        );
        $this->load->view('core/crud/json', $param);
    }

    public function remover($id) {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->AlertaComprasModel->excluir($id);
        }
    }

    public function todos() {
        return $consulta = $this->AlertaComprasModel->consultar();
    }

}
