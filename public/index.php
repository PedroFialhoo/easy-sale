<?php
$page = $_GET['page'] ?? 'home';

$allowed_pages = [
    'cadastrar' => '../app/views/produtos/CadastrarProduto.php',
    'listar'    => '../app/views/produtos/listar.php',
    'historico' => '../app/views/vendas/historico.php'
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Easy Sale - Painel</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; display:flex; align-items: center; justify-content: center; flex-flow: column wrap; }
        nav { margin-bottom: 30px; }
        nav a { margin-right: 15px; text-decoration: none; color: #fff; background: #007bff; padding: 8px 12px; border-radius: 4px; }
        nav a:hover { background: #0056b3; }
        #conteudo { border: 1px solid #ccc; border-radius: 4px; padding: 20px; }
    </style>
</head>
<body>
    <?php
        include('../app/views/template/header.php');
    ?>
    

    <div id="conteudo">
        <?php
        if (isset($allowed_pages[$page])) {
            include $allowed_pages[$page];
        } else {
            echo "<h2>Bem-vindo ao Painel!</h2><p>Escolha uma opção no menu.</p>";
        }
        ?>
    </div>
    <?php
        include('../app/views/template/footer.php');
    ?>

</body>
</html>
