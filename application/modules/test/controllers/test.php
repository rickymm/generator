<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class test extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TestModel');
    }

    public function index(){
        $this->consultar();
    }
    
    public function consultar($filtro = null, $retorno = null) {
        if (is_null($filtro) && is_null($retorno)) {
            $param = array(
                'view' => 'test/test/index',
                'titulo' => 'Test',
                'subtitulo' => 'Test',
                'json' => 'test/test/consultar/null/json',
                'editar' => 'test/test/editar',
                'salvar' => 'test/test/salvar',
                'excluir' => 'test/test/remover'
            );
            $this->load->view('includes/core', $param);
        }
         if (!is_null($retorno) && $retorno == 'json') {
            $consulta = $this->TestModel->consultar(null, $retorno);
            $param = array(
                'dataSource' => $consulta
            );
            $this->load->view('crud/json', $param);
        }
    }
    
     public function consultarFiltro($filtro, $retorno = null) {
            $consulta = $this->TestModel->consultar($filtro, $retorno);
            $param = array(
                'dataSource' => $consulta
            );
            $this->load->view('crud/json', $param);
    }

    public function form() {
        $param = array(
            'view' => 'test/form',
            'custom' => 'true',
            'modulo' => 'true'
        );
        $this->load->view('includes/core', $param);
    }

    public function salvar() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $post = $this->input->post();
            if ($result = $this->TestModel->salvar($post)) {
                $this->setSessionMessage('Operação realizada com sucesso', 'alert alert-success');
            } else {
                $this->setSessionMessage('Falha ao realizar operação favor verificar os dados e tentar novamente', 'alert alert-danger');
            }
        }
        redirect(base_url('test/test/consultar'));
    }

    public function editar($id) {
        $result = $this->consultarFiltro($id, 'json');
       
    }

    public function remover($id) {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->TestModel->excluir($id);
        }
    }

    public function todos() {
        return $consulta = $this->TestModel->consultar();
    }
}