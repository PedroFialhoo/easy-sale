<?php
     require_once('Venda.php');
     require_once('Produto.php');
     require_once('PDO.php');
     require_once('Conexao.php');

     if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = $_POST['cx_id'];
        $nome = $_POST['cx_nome'];
        $valor = $_POST['cx_valor'];
        $estoque = $_POST['cx_estoque'];
   
        $p = new Produto($id, $nome, $valor, $estoque);

        $p->registrar();
     }

     function buscarProduto($nome){
        $c = new Conexao();
        $d = new Database($c);
        $produto = $d->buscarProduto($nome);
        return $produto;
     }
?>