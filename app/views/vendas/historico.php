<?php
require_once __DIR__ . '/../../models/Database.php';
require_once __DIR__ . '/../../../config/Conexao.php';

$c = new Conexao();
$d = new Database($c);
$vendas = $d->buscarTodosVendas(); // Retorna array de objetos Vendas ou null
?>
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


<h2>Histórico de Vendas</h2>

<table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>ID da Venda</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
            <th>Data da Venda</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($vendas)): ?>
            <?php foreach ($vendas as $index => $venda): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($venda->produto->nome); ?></td>
                    <td><?php echo $venda->quantidade; ?></td>
                    <td>R$ <?php echo number_format($venda->valor_total, 2, ',', '.'); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($venda->data_venda)); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Nenhuma venda registrada ainda.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
