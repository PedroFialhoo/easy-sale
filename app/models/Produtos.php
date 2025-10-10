<?php
    require_once __DIR__ . '/../../config/Conexao.php';
    class Produto{

        public $id;
        public $nome;
        public $valor;
        public $estoque;

        public function __construct($id, $nome, $valor, $estoque) {
            $this->id = $id;
            $this->nome = $nome;
            $this->valor = $valor;
            $this->estoque = $estoque;
        }

        public function registrar(){            
            $c = new Conexao();
            $d = new Database($c);
            $d->inserirProduto($this->nome, $this->valor, $this->estoque);
        }
    }

?>