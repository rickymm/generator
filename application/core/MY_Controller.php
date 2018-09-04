<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
    }

    public function insert($dados) {
        if (isset($dados)) {
            $result = $this->crud_model->insert($dados);
            return $result;
        } else {
            return 0;
        }
    }

    public function update($dados) {
        if (isset($dados)) {
            $result = $this->crud_model->update($dados);
            return $result;
        } else {
            return 0;
        }
    }

    public function delete($dados) {
        if (isset($dados)) {
            $result = $this->crud_model->delete($dados);
            return $result;
        } else {
            return 0;
        }
    }

    public function getAll($dados) {
        $consulta = $this->crud_model->getAll($dados);
        return $consulta;
    }

    public function select($dados = null) {
        $consulta = $this->crud_model->getWithFilter($dados);
        return $consulta;
    }

    public function selectWithJoin($dados = null) {
        $consulta = $this->crud_model->getWithJoin($dados);
        return $consulta;
    }

    public function customSQL($query) {
        if (isset($query)) {
            $results = $this->crud_model->custom_sql($query);
            return $results;
        } else {
            return null;
        }
    }

    public function customInsert($query) {
        if (isset($query)) {
            $results = $this->crud_model->custom_insert($query);
            return $results;
        } else {
            return null;
        }
    }

    public function customUpdate($query) {
        if (isset($query)) {
            $results = $this->crud_model->custom_update($query);
            return $results;
        } else {
            return null;
        }
    }

    public function customDelete($query) {
        if (isset($query)) {
            $results = $this->crud_model->custom_delete($query);
            return $results;
        } else {
            return null;
        }
    }

}

class Crud extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

}
