<?php
require_once __DIR__ . '/../models/Vendas.php'; 
require_once __DIR__ . '/../models/Produtos.php';
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../../config/Conexao.php';

class ProdutoController {

    public function registrarProduto($nome, $valor, $estoque) {
        $p = new Produto($nome, $valor, $estoque);
        $resposta = $p->registrar();
        return $resposta;
    }

    public function buscarProduto($idProduto) {
        $c = new Conexao();
        $d = new Database($c);
        return $d->buscarProduto($idProduto);
    }

    public function processarRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['cx_id'];
            $nome = $_POST['cx_nome'];
            $valor = $_POST['cx_valor'];
            $estoque = $_POST['cx_estoque'];
            $this->registrarProduto($id, $nome, $valor, $estoque);
        }
    }

    public function buscarTodosProdutos() {
        $c = new Conexao();
        $d = new Database($c);
        return $d->buscarTodosProdutos();
    }
}
?>
