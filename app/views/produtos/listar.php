<h2>Produtos disponíveis</h2>
<table border="1" cellpadding="6" cellspacing="0">
  <thead>
    <tr><th>ID</th><th>Nome</th><th>Valor</th><th>Estoque</th><th>Comprar</th></tr>
  </thead>
  <tbody><?php
    foreach($produtos as $p): 
?>
<tr>
    <td><?php echo $p['id']; ?></td>
    <td><?php echo $p['nome']; ?></td>
    <td>R$ <?php echo number_format($p['valor'], 2, ',', '.'); ?></td>
    <td><?php echo $p['quantidade']; ?></td>
    <td> 
        <form action = "index.php?controller=venda&action=adicionar" method="POST">
            <input type = "hidden" name = "idProdut" value = "<?php echo $p['id']; ?>">
            <input type="number" name="quantidade" value = "1" min =" 1" max ="<?php echo max(1, $p['estoque']); ?>">
            <button type="submit"<?php echo $p['estoque'] <= 0 ?  'disabled' : ''; ?>>Comprar</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>