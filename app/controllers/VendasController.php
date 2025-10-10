<?php
     require_once('Venda.php');
     require_once('Produto.php');
     require_once('ProdutoController.php');

     if($_SERVER['REQUEST_METHOD']=='POST'){
        $produto = $_POST['cx_produto'];
        $quantidade = $_POST['cx_quantidade'];

        $objProduto = buscarProduto($produto);        

        $venda = new Vendas($objProduto, $quantidade);
     }
?>