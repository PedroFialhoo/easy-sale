<?php
    require_once 'Conexao.php';
    class Produto{

        public $nome;
        public $valor;
        public $estoque;

        public function __construct($nome, $valor, $estoque) {
            $this->nome = $nome;
            $this->valor = $valor;
            $this->estoque = $estoque;
        }

        public function registrar(){
            // $dao = new Conexao();

        }
    }

?>