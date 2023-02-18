<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banco_model extends CI_Model {

    public function listarTabelas()
    {
        return $this->db->query("SHOW TABLES")
                        ->result_array();
    }

    public function listarColunas($tabela)
    {
        return $this->db->query("DESC $tabela")
                        ->result_array();
    }

    public function consultar($sql)
    {
        return $this->db->query($sql)
                        ->result_array();
    }
}