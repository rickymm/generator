<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class appModel extends Crud {

    public function __construct() {
        parent::__construct();
    }
    
    /*** BEGIN:: Funções para alterar o banco ***/
    private function carregarMysql() {
        return $this->load->database('mysql', TRUE);
    }

    private function carregarSqlServer() {
        return $this->load->database('default', TRUE);
    }
    /*** END:: Funções para alterar o banco ***/
    
    //Consultar todos os schemas do banco MySQL
    public function consultarSchemasMysql() {
        $mysql = $this->carregarMysql();
        $query = "SELECT DISTINCT TABLE_SCHEMA AS name"
                ." FROM INFORMATION_SCHEMA.TABLES"
                ." ORDER BY 1";
        $retorno = $mysql->query($query);
        return $retorno->result();
    }

    //Consultar todas as tabelas do banco MySQL
    public function consultarTabelasMysql($schema) {
        $mysql = $this->carregarMysql();
        $query = "SELECT TABLE_NAME AS name"
                ." FROM INFORMATION_SCHEMA.TABLES" 
                ." WHERE TABLE_SCHEMA = '" . $schema . "'"
                ." ORDER BY 1";
        $retorno = $mysql->query($query);
        return $retorno->result();
    }

    public function descreverTabelaMysql($schema, $tabela) {
        $mysql = $this->carregarMysql();
        //checar se está funcionando essa função
        $query = "DESCRIBE " . $schema . "." . $tabela;
        $retorno = $mysql->query($query);
        return $retorno->result();
    }

    //Consultar todas os schemas do banco MS SQL Server
    public function consultarSchemasSqlSrv() {
        $sqlsrv = $this->carregarSqlServer();
        $query = "SELECT name FROM master.dbo.sysdatabases ORDER BY 1";
        $retorno = $sqlsrv->query($query);
        return $retorno->result();
    }

    //Consultar todas as tabelas do banco MS SQL Server
    public function consultarTabelasSqlSrv($schema) {
        $sqlsrv = $this->carregarSqlServer();
        $query = "SELECT TABLE_NAME AS name FROM " . $schema . ".INFORMATION_SCHEMA.TABLES ORDER BY 1";
        $retorno = $sqlsrv->query($query);
        return $retorno->result();
    }

    //Mostrar as colunas, tipo de dado da coluna e o tamanho maxima da tabela enviada por parametro
    public function descreverTabelaSqlSrv($schema, $tabela) {
        $sqlsrv = $this->carregarSqlServer();
        $query = "SELECT COLUMN_NAME AS Field, DATA_TYPE AS Type, IS_NULLABLE AS 'Null'"
                . " FROM " . $schema . ".INFORMATION_SCHEMA.COLUMNS WHERE table_name = '" . $tabela . "' ORDER BY ORDINAL_POSITION";
        $retorno = $sqlsrv->query($query);
        return $retorno->result();
    }

}
