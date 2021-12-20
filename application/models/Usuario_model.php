<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function listar()
    {
        return $this->db->from('usuario')
                        ->order_by('nome', 'ASC')
                        ->order_by('banco', 'ASC')
                        ->get()
                        ->result_array();
    }

    public function salvar($request)
	{
        return $this->db->insert('usuario', $request);
	}
}