<?php
require_once __DIR__ . '/../models/Vendas.php'; 
require_once __DIR__ . '/../models/Produtos.php';
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../../config/Conexao.php';

class ProdutoController {

    public function registrarProduto($id, $nome, $valor, $estoque) {
        $p = new Produto($id, $nome, $valor, $estoque);
        $p->registrar();
    }

    public function buscarProduto($nome) {
        $c = new Conexao();
        $d = new Database($c);
        return $d->buscarProduto($nome);
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
}
?>
