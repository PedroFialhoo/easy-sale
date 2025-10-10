<?php
require_once __DIR__ . '/../../controllers/ProdutoController.php';

$produtoController = new ProdutoController();

$produto = $produtoController->buscarProduto("feijao");

$produtos = $produto ? [$produto] : [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            padding: 8px 12px;
            text-align: center;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
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
                <td><?= $p->id ?></td>
                <td><?= htmlspecialchars($p->nome) ?></td>
                <td>R$ <?= number_format($p->valor, 2, ',', '.') ?></td>
                <td><?= $p->estoque ?></td>
                <td>
                    <form action="index.php?controller=venda&action=adicionar" method="POST">
                        <input type="hidden" name="idProduto" value="<?= $p->id ?>">
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

</body>
</html>
