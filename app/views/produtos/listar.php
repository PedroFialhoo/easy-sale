<h2>🛍️ Produtos disponíveis</h2>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Valor (R$)</th>
      <th>Estoque</th>
      <th>Cadastrado em</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($produtos)): ?>
      <?php foreach ($produtos as $p): ?>
        <tr>
          <td><?php echo $p['idProduto']; ?></td>
          <td><?php echo htmlspecialchars($p['nome']); ?></td>
          <td>R$ <?php echo number_format($p['valor'], 2, ',', '.'); ?></td>
          <td><?php echo $p['estoque']; ?></td>
          <td><?php echo date('d/m/Y H:i:s', strtotime($p['criado_em'])); ?></td>
          <td>
            <?php if ($p['estoque'] > 0): ?>
              <form method="POST" action="index.php?controller=vendas&action=comprar" style="display:inline;">
                <input type="hidden" name="idProduto" value="<?php echo $p['idProduto']; ?>">
                <input type="number" name="quantidade" value="1" min="1" max="<?php echo $p['estoque']; ?>" required>
                <button type="submit">Comprar</button>
              </form>
            <?php else: ?>
              <span style="color: red; font-weight: bold;">Esgotado</span>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="6" style="text-align:center;">Nenhum produto cadastrado.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
