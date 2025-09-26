<?php

    class Vendas{

        public $produto;
        public $quantidade;
        public $valor_total;
        public $data_venda;


        public function __construct(Produto $produto, $quantidade) {
            $this->$produto = $produto;
            $this->$quantidade = $quantidade;            
            $this->data_venda = date("d/m/Y H:i:s");
            $this->valor_total = $quantidade * $produto->valor;
        }
        
    }





?>