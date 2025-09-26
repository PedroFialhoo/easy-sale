<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Loja MVC</title>
  <link rel="stylesheet" href="/assets/styles.css"> <!-- opcional -->
</head>
<body>
  <header>
    <h1>Loja Virtual</h1>
    <nav>
      <a href="index.php?controller=produto&action=listar">Produtos</a> |
      <a href="index.php?controller=venda&action=historico">Histórico de Vendas</a>
    </nav>
  </header>

  <main>
    <?php if (!empty($_SESSION['success'])): ?>
      <div style="color:green"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['error'])): ?>
      <div style="color:red"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
