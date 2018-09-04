<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class sadasds extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('asdasdsa');
    }

    public function index(){
        $this->consultar();
    }
    
    public function consultar($filtro = null, $retorno = null) {
        if (is_null($filtro) && is_null($retorno)) {
            $param = array(
                'view' => 'fasdsa/sadasds/index',
                'titulo' => 'asdasd',
                'subtitulo' => 'asdasdas',
                'json' => 'fasdsa/sadasds/consultar/null/json',
                'editar' => 'fasdsa/sadasds/editar',
                'salvar' => 'fasdsa/sadasds/salvar',
                'excluir' => 'fasdsa/sadasds/remover'
            );
            $this->load->view('includes/core', $param);
        }
         if (!is_null($retorno) && $retorno == 'json') {
            $consulta = $this->asdasdsa->consultar(null, $retorno);
            $param = array(
                'dataSource' => $consulta
            );
            $this->load->view('crud/json', $param);
        }
    }
    
     public function consultarFiltro($filtro, $retorno = null) {
            $consulta = $this->asdasdsa->consultar($filtro, $retorno);
            $param = array(
                'dataSource' => $consulta
            );
            $this->load->view('crud/json', $param);
    }

    public function form() {
        $param = array(
            'view' => 'fasdsa/form',
            'custom' => 'true',
            'modulo' => 'true'
        );
        $this->load->view('includes/core', $param);
    }

    public function salvar() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $post = $this->input->post();
            if ($result = $this->asdasdsa->salvar($post)) {
                $this->setSessionMessage('Operação realizada com sucesso', 'alert alert-success');
            } else {
                $this->setSessionMessage('Falha ao realizar operação favor verificar os dados e tentar novamente', 'alert alert-danger');
            }
        }
        redirect(base_url('fasdsa/sadasds/consultar'));
    }

    public function editar($id) {
        $result = $this->consultarFiltro($id, 'json');
    }

    public function remover($id) {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->asdasdsa->excluir($id);
        }
    }

    public function todos() {
        return $consulta = $this->asdasdsa->consultar();
    }
}