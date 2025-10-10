<?php
require_once __DIR__ . '/../../controllers/ProdutoController.php';
require_once __DIR__ . '/../../controllers/VendasController.php';

$produtoController = new ProdutoController();
$vendaController = new VendasController();

$produtos = $produtoController->buscarTodosProdutos();
$mensagemVenda = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idProduto'])) {
    $produtoController->buscarTodosProdutos();
    $mensagemVenda = $vendaController->processarRequest();
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <style>
    body { 
        font-family: Arial; 
        display: flex; 
        justify-content: center; 
        min-height: 100vh; 
        background: #f2f2f2; 
        margin: 0; 
        padding: 20px 0;
    }

    .container { 
        background: #fff; 
        padding: 30px 40px; 
        border-radius: 10px; 
        box-shadow: 0 0 10px rgba(0,0,0,0.2); 
        width: 90%; 
        max-width: 900px; 
        box-sizing: border-box;
    }

    h2 { 
        text-align: center; 
        margin-bottom: 20px; 
        color: #333; 
    }

    table { 
        border-collapse: collapse; 
        width: 100%; 
        margin: 0 auto; 
    }

    th, td { 
        padding: 10px 12px; 
        text-align: center; 
        border: 1px solid #ccc; 
        font-size: 14px;
    }

    th { 
        background-color: #f2f2f2; 
        font-weight: bold;
    }

    input[type=number] { 
        width: 60px; 
        padding: 5px; 
        border-radius: 5px; 
        border: 1px solid #ccc; 
        text-align: center;
    }

    button { 
        padding: 6px 12px; 
        border: none; 
        border-radius: 5px; 
        background: #28a745; 
        color: white; 
        font-size: 14px; 
        cursor: pointer; 
        transition: 0.3s; 
    }

    button:hover { 
        background: #218838; 
    }

    button:disabled { 
        background-color: #ccc; 
        cursor: not-allowed; 
    }

    .mensagem, .success { 
        text-align: center; 
        font-weight: bold; 
        color: green; 
        margin: 20px auto; 
        padding: 20px; 
        border: 1px solid #ccc; 
        border-radius: 15px; 
        background-color: #f2f2f2; 
    }
</style>

</head>
<body>



<h2 style="text-align:center;">Produtos Disponíveis</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Estoque</th>
            <th>Comprar</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $p): ?>
                <tr>
                    <td><?= $p->idProduto ?></td>
                    <td><?= htmlspecialchars($p->nome) ?></td>
                    <td>R$ <?= number_format((float)$p->valor, 2, ',', '.') ?></td>
                    <td><?= $p->estoque ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="idProduto" value="<?= $p->idProduto ?>">
                            <input type="number" name="quantidade" value="1" min="1" max="<?= max(1, $p->estoque) ?>">
                            <button type="submit" <?= $p->estoque <= 0 ? 'disabled' : '' ?>>Comprar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Nenhum produto encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

    <?php if ($mensagemVenda): ?>
        <div class="mensagem"><?= htmlspecialchars($mensagemVenda) ?></div>
    <?php endif; ?>
</body>
</html>
