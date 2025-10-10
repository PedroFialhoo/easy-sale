<?php

require_once __DIR__ . '/../../controllers/ProdutoController.php';


$produtoController = new ProdutoController();
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['cx_nome'];
    $valor = $_POST['cx_valor'];
    $estoque = $_POST['cx_estoque'];

    $produtoController->registrarProduto($nome, $valor, $estoque);
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        body { font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f2f2f2; margin:0; }
        .container { background: #fff; padding: 30px 40px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2); width: 350px; }
        h2 { text-align: center; margin-bottom: 20px; color: #333; }
        label { display: block; margin-top: 10px; font-weight: bold; color: #555; }
        input { width: 100%; padding: 8px 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box; }
        button { width: 100%; padding: 10px; margin-top: 20px; border: none; border-radius: 5px; background: #28a745; color: white; font-size: 16px; cursor: pointer; transition:0.3s; }
        button:hover { background: #218838; }
        .success { margin-top: 15px; color: green; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Produto</h2>
        <form method="POST">
            <label for="cx_nome">Nome</label>
            <input type="text" name="cx_nome" id="cx_nome" required>

            <label for="cx_valor">Valor</label>
            <input type="number" step="0.01" name="cx_valor" id="cx_valor" required>

            <label for="cx_estoque">Estoque</label>
            <input type="number" name="cx_estoque" id="cx_estoque" required>

            <button type="submit">Cadastrar Produto</button>
        </form>

        <?php if($mensagem): ?>
            <div class="success"><?= $mensagem ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
