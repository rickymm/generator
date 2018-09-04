<?php

class Crud_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
    }

    public function getAll($dados = null) {
        // Se forem definidos os campos do select ele aplica o filtro
        if (isset($dados['select']) && !empty($dados['select'])) {
            $this->db->select($dados['select'], false);
        }
        //Obtém todos os registros pegando por parâmetro apenas a tabela
        $results = $this->db->get($dados['table']);
        //Retorna o resultset com todos os registros
        return $results->result();
    }

    public function getWithFilter($dados = null) {
        // Se forem definidos os campos do select ele aplica o filtro
        if (isset($dados['select']) && !empty($dados['select'])) {
            $this->db->select($dados['select'], false);
        }
        if (isset($dados['order_by'])) {
            $this->db->order_by($dados['order_by'], $dados['order_type']);
        }
        //limit if exists 
        if (isset($dados['limit'])) {
            $this->db->limit($dados['limit']);
        }
        //group by
        if (isset($dados['group_by'])) {
            $this->db->group_by($dados['group_by']);
        }
        if (isset($dados['fields']) && !is_null($dados['fields'])) {
            if (is_array($dados['operator'])) {
                $i = 0;
                $operador = $dados['operator'];
                foreach ($dados['fields'] as $field => $value) {
                    if ($field === 0) {
                        $this->db->where($value);
                    } else {
                        switch ($operador[$i]) {
                            case 'and':
                                $this->db->where($field, $value);
                                break;
                            case 'or':
                                $this->db->or_where($field, $value);
                                break;
                            case 'in':
                                $this->db->where_in($field, explode(',', $value));
                                break;
                            default:
                                $this->db->where($field . $operador[$i] . $value);
                                break;
                        }
                    }
                    $i++;
                }
            } else {
                foreach ($dados['fields'] as $field => $value) {
                    if ($field === 0) {
                        $this->db->where($value);
                    } else {
                        switch ($dados['operator']) {
                            case 'and':
                                $this->db->where($field, $value);
                                break;
                            case 'or':
                                $this->db->or_where($field, $value);
                                break;
                            case 'in':
                                $this->db->where_in($field, $value);
                                break;
                            default:
                                $this->db->where($field . $dados['operator'] . $value);
                                break;
                        }
                    }
                }
            }
            $results = $this->db->get($dados['table']);
            return $results->result();
        } else {
            $results = $this->db->get($dados['table']);
            return $results->result();
        }
    }

    public function getWithJoin($dados) {
        //Significa q left join foi colocado antes e precisa ser executado
        $keyJoin = array_search("joins", array_keys($dados));
        $keyLeftJoin = array_search("left_joins", array_keys($dados));
        if (isset($dados['select']) && !empty($dados['select'])) {
            $this->db->select($dados['select'], false);
        }
        if (isset($dados['joins']) || isset($dados['left_joins']) || isset($dados['left_outer_joins'])) {
            if ($keyJoin > $keyLeftJoin) {
                //left join
                if (isset($dados['left_joins'])) {
                    foreach ($dados['left_joins'] as $table => $criteria) {
                        $this->db->join($table, $criteria, 'left');
                    }
                }
                //inner join
                if (isset($dados['joins'])) {
                    foreach ($dados['joins'] as $table => $criteria) {
                        $this->db->join($table, $criteria, 'inner');
                    }
                }
            } else {
                //inner join
                if (isset($dados['joins'])) {
                    foreach ($dados['joins'] as $table => $criteria) {
                        $this->db->join($table, $criteria, 'inner');
                    }
                }
                //left join
                if (isset($dados['left_joins'])) {
                    foreach ($dados['left_joins'] as $table => $criteria) {
                        $this->db->join($table, $criteria, 'left');
                    }
                }
                //left join
                if (isset($dados['left_outer_joins'])) {
                    foreach ($dados['left_outer_joins'] as $table => $criteria) {
                        $this->db->join($table, $criteria, 'left outer');
                    }
                }
            }
        }
        //group by
        if (isset($dados['group_by'])) {
            $this->db->group_by($dados['group_by']);
        }
        //order by
        if (isset($dados['order_by'])) {
            $this->db->order_by($dados['order_by'], $dados['order_type']);
        }
        //limit rows
        if (isset($dados['limit'])) {
            $this->db->limit($dados['limit']);
        }
        if (isset($dados['fields']) && !is_null($dados['fields'])) {
            if (is_array($dados['operator'])) {
                $i = 0;
                $operador = $dados['operator'];
                foreach ($dados['fields'] as $field => $value) {
                    if ($field === 0) {
                        $this->db->where($value);
                    } else {
                        switch ($operador[$i]) {
                            case 'and':
                                $this->db->where($field, $value);
                                break;
                            case 'or':
                                $this->db->or_where($field, $value);
                                break;
                            case 'in':
                                $this->db->where_in($field, explode(',', $value));
                                break;
                            default:
                                $this->db->where($field . $operador[$i] . $value);
                                break;
                        }
                    }
                    $i++;
                }
            } else {
                foreach ($dados['fields'] as $field => $value) {
                    if ($field === 0) {
                        $this->db->where($value);
                    } else {
                        switch ($dados['operator']) {
                            case 'and':
                                $this->db->where($field, $value);
                                break;
                            case 'or':
                                $this->db->or_where($field, $value);
                                break;
                            case 'in':
                                $this->db->where_in($field, $value);
                                break;
                            default:
                                $this->db->where($field . $dados['operator'] . $value);
                                break;
                        }
                    }
                }
            }
            $results = $this->db->get($dados['table']);
            return $results->result();
        } else {
            $results = $this->db->get($dados['table']);
            return $results->result();
        }
    }

    public function insert($dados) {
        //Cria um array vazio
        $record = array();
        // Cria um laço para obter todos os campos que serão inseridos
        foreach ($dados['fields'] as $field => $value) {
            $record[$field] = $value;
        }
        //Executa o insert e retorna a chave primária criada, se não retorna o erro de banco
        if ($this->db->insert($dados['table'], $record)) {
            $id = $this->db->insert_id();
            return $id;
        } else {
            return $error = $this->db->error();
        }
    }

    public function update($dados) {
        //Cria um array vazio
        $record = array();
        // Cria um laço para obter todos os campos que serão inseridos
        foreach ($dados['fields'] as $field => $value) {
            $record[$field] = $value;
        }
        // Adiciona os critérios para fazer o update
        if (isset($dados['criteria']) && !is_null($dados['criteria'])) {
            foreach ($dados['criteria'] as $field => $value) {
                $this->db->where($field, $value);
            }
        }
        //Executa o update
        if ($this->db->update($dados['table'], $record)) {
            $row_affected = $this->db->affected_rows();
            return $row_affected;
        } else {
            return $error = $this->db->error();
        }
    }

    public function delete($dados) {
        // Obtém os critérios para fazer o update
        if (isset($dados['fields']) && !is_null($dados['fields'])) {
            foreach ($dados['fields'] as $field => $value) {
                $this->db->where_in($field, $value);
            }
        }
        if ($this->db->delete($dados['table'])) {
            return $this->db->affected_rows();
        } else {
            return $this->db->error();
        }
    }

    public function custom_sql($query) {
        //Se a query estiver definida, executa a query e retorna o resultado obtido
        if (isset($query)) {
            $results = $this->db->query($query);
            return $results->result();
        } else {
            return $this->db->error();
        }
    }

    public function custom_insert($query) {
        //Se a query estiver definida, executa a query e retorna o resultado obtido
        if (isset($query)) {
            $results = $this->db->query($query);
            $id = $this->db->insert_id();
            return $id;
        } else {
            return $this->db->error();
        }
    }

    public function custom_update($query) {
        //Se a query estiver definida, executa a query e retorna o resultado obtido
        if (isset($query)) {
            $results = $this->db->query($query);
            $row_affected = $this->db->affected_rows();
            return $row_affected;
        } else {
            return $this->db->error();
        }
    }

    public function custom_delete($query) {
        //Se a query estiver definida, executa a query e retorna o resultado obtido
        if (isset($query)) {
            $results = $this->db->query($query);
            return $result;
        } else {
            return null;
        }
    }

}
