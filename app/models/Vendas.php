<?php
    
    require_once __DIR__ . '/../../config/Conexao.php';

    class Vendas{

        public $produto;
        public $quantidade;
        public $valor_total;
        public $data_venda;


        public function __construct(Produto $produto, $quantidade, $valor_total = null, $data_venda= null) {
            $this->produto = $produto;
            $this->quantidade = $quantidade;           
            if($valor_total == null){                
                $this->valor_total = $quantidade * $produto->valor;
            }
            else{
                $this->valor_total = $valor_total;
            }
            $this->data_venda = $data_venda;
        }
        
        public function registrar(){            
            $c = new Conexao();
            $d = new Database($c);
            $resposta = $d->registrarVenda($this->produto->idProduto, $this->quantidade, $this->valor_total);
            return $resposta;
        }
    }





?>