<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		$this->load->model('usuario_model');
		$this->load->model('transacao_model');

		$usuarios = $this->usuario_model->listar();

		foreach($usuarios as $idx => $usuario)
			$usuarios[$idx]['saldo'] = $this->transacao_model->consultar_saldo($usuario['id'])[0]['saldo']; 

		$this->load->view('layouts/cabecalho');
        $this->load->view('geral/index', ['usuarios' => $usuarios]);
        $this->load->view('layouts/rodape');
	}

	public function cadastro()
	{
		$this->load->view('layouts/cabecalho');
        $this->load->view('geral/cadastro');
        $this->load->view('layouts/rodape');
	}

	public function salvar()
	{
		$request = [
            'nome'	=> $this->input->post('nome'),
            'banco' => $this->input->post('banco')
        ];

        $this->load->model('usuario_model');
		$this->load->model('transacao_model');

        $insert_usuario = $this->usuario_model->salvar($request);
	
        if ($insert_usuario) {
			$request = [
				'id_usuario'=> $insert_usuario,
				'operacao' 	=> 'credito',
				'valor'		=> $this->input->post('valor'),
				'descricao'	=> 'Valor Inicial',
				'datahora'  => date('Y-m-d H:i:s'),
			];

			$insert_transacao = $this->transacao_model->salvar($request);

			if($insert_transacao)
				$this->session->set_flashdata('msg', ['tipo' => 'success', 'texto' => 'Operação realizada com sucesso!']);
			else
				$this->session->set_flashdata('msg', ['tipo' => 'warnig', 'texto' => 'Cadastro realizado, mas não foi possível adicionar o valor incial!']);
		
			redirect('usuario/cadastro');
		}

		$this->session->set_flashdata('msg', ['tipo' => 'danger', 'texto' => 'Erro ao realizar cadastro!']);
        redirect('usuario/cadastro');
	}
}