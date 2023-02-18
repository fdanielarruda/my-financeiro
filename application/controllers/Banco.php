<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banco extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        $this->load->model('banco_model');
        $result = $this->consultarTabelasDisponiveis();

        $this->load->view('layouts/cabecalho');
        $this->load->view('geral/banco', ['tabelas' => $result]);
        $this->load->view('layouts/rodape');
	}    

    public function consultar()
    {
        $this->load->model('banco_model');
        
        $sql = $this->input->post('sql');
        $result = $this->banco_model->consultar($sql);
        $tabelas = $this->consultarTabelasDisponiveis();
        
        $this->load->view('layouts/cabecalho');
        $this->load->view('geral/banco', ['tabelas' => $tabelas, 'resultados' => $result, 'sql' => $sql]);
        $this->load->view('layouts/rodape');
    }

    public function consultarTabelasDisponiveis()
    {
        $this->load->model('banco_model');
        $tabelas = $this->banco_model->listarTabelas();

        foreach ($tabelas as $tabela) {
            $use_tabela = $tabela['Tables_in_financeiro'];
            $colunas = $this->banco_model->listarColunas($use_tabela);

            foreach ($colunas as $coluna) {
                $use_colunas[] = $coluna['Field'];
            }

            $result[] = array(
                'tabela' => $use_tabela,
                'colunas' => $use_colunas
            );

            $use_tabela = [];
            $use_colunas = [];
        }

        return $result;
    }
}