<?php
    require_once __DIR__ . '/../../config/Conexao.php';
    class Produto{

        public $idProduto;
        public $nome;
        public $valor;
        public $estoque;

        public function __construct($nome, $valor, $estoque, $idProduto = null) {
            $this->nome = $nome;
            $this->valor = $valor;
            $this->estoque = $estoque;
            $this->idProduto = $idProduto;
        }

        public function registrar(){            
            $c = new Conexao();
            $d = new Database($c);
            $resposta = $d->inserirProduto($this->nome, $this->valor, $this->estoque);
            return $resposta;
        }
    }

?>