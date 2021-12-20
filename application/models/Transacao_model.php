<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transacao_model extends CI_Model {

    public function consultar_saldo($id)
    {
        return $this->db->select('sum(valor) as saldo')
                        ->from('transacoes')
                        ->where('id_usuario', $id)
                        ->get()
                        ->result_array();
    }

    public function consultar_historico($id)
    {   
        return $this->db->from('transacoes')
                        ->where('id_usuario', $id)
                        ->order_by('datahora', 'DESC')
                        ->get()
                        ->result_array();
    }

    public function salvar($request)
	{
        if ($this->db->insert('transacoes', $request))
            return $this->db->insert_id();

        return false;
	}
}