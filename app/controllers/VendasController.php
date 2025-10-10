<?php
require_once __DIR__ . '/../models/Vendas.php'; 
require_once __DIR__ . '/../models/Produtos.php';
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../../config/Conexao.php';

class VendasController {

    public function processarRequest() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idProduto = $_POST['idProduto'];
            $quantidade = $_POST['quantidade'];

            $p = new ProdutoController();
            $produtoObj = $p->buscarProduto($idProduto);

            if (!$produtoObj) {
                return "Produto não encontrado.";
            }

            if ($quantidade > $produtoObj->estoque) {
                return "Quantidade solicitada maior que o estoque disponível.";
            }

            $venda = new Vendas($produtoObj, $quantidade);

            $resposta = $venda->registrar();
            if($resposta = "Produto comprado com sucesso!"){
               return "Venda realizada: {$produtoObj->nome}, Quantidade: {$quantidade}, Total: R$ " . number_format($venda->valor_total, 2, ',', '.');
            }
            else{
               return $resposta;
            }
            

        }
    }
}
?>
