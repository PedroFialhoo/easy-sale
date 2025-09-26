<?php
     require_once('Venda.php');
     require_once('Produto.php');
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = $_POST['cx_id'];
        $nome = $_POST['cx_nome'];
        $valor = $_POST['cx_valor'];
        $estoque = $_POST['cx_estoque'];
   
        $p = new Produto($id, $nome, $valor, $estoque);

        $p->registrar();
     }

     function calcularTotal($venda){
      //  $produto = buscarProduto();
      //  $valorTotal = $produto -> valor * $venda -> quantidade; 
     }

     function buscarProduto($nome){
        // $produto = 
        // return $produto;
     }
?>