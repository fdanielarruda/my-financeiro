<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transacao extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $this->load->model('usuario_model');
        $usuarios = $this->usuario_model->listar();

        $this->load->view('layouts/cabecalho');
        $this->load->view('geral/transacao', ['usuarios' => $usuarios]);
        $this->load->view('layouts/rodape');
	}      

    public function historico($id)
	{
		$this->load->model('transacao_model');
		$transacoes = $this->transacao_model->consultar_historico($id);
        $saldo = $this->transacao_model->consultar_saldo($id)[0]['saldo'];

        $this->load->view('layouts/cabecalho');
        $this->load->view('geral/historico', ['transacoes' => $transacoes, 'saldo' => $saldo]);
        $this->load->view('layouts/rodape');
	}

    public function salvar()
	{
        $request = [
            'id_usuario'=> $this->input->post('usuario'),
            'operacao'  => $this->input->post('operacao'),
            'valor'     => $this->input->post('valor'), 
            'descricao' => $this->input->post('descricao'), 
            'datahora'  => date('Y-m-d H:i:s'),
        ];

        if ($request['operacao'] == 'debito' && $request['valor'] > 0)
            $request['valor'] = - $request['valor'];
        else if ($request['operacao'] == 'credito' && $request['valor'] < 0)
            $request['valor'] = abs($request['valor']);

        $this->load->model('transacao_model');
        $insert = $this->transacao_model->salvar($request);
	
        if ($insert)
            $this->session->set_flashdata('msg', ['tipo' => 'success', 'texto' => 'Operação realizada com sucesso!']);
        else
            $this->session->set_flashdata('msg', ['tipo' => 'danger', 'texto' => 'Erro ao realizar cadastro!']);

        redirect('transacao');
    }
}