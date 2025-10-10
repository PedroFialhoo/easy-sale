<h2>📊 Histórico de Vendas</h2>
<table>
<thead>
    <tr>
      <th>ID da Venda</th>
      <th>Produto</th>
      <th>Quantidade</th>
      <th>Valor Total (R$)</th>
      <th>Data da Venda</th>
      <th>Registrado em</th>
    </tr>
</thead>
<tbody>
    <?php if (!empty($vendas)): ?>
    <?php foreach ($vendas as $v): ?>
        <tr>
          <td><?php echo $v['idVenda']; ?></td>
          <td><?php echo htmlspecialchars($v['produto']); ?></td>
          <td><?php echo $v['quantidade']; ?></td>
          <td>R$ <?php echo number_format($v['valorTotal'], 2, ',', '.'); ?></td>
          <td><?php echo date('d/m/Y', strtotime($v['dataVenda'])); ?></td>
          <td><?php echo date('d/m/Y H:i:s', strtotime($v['criado_em'])); ?></td>
        </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" style="text-align:center;">Nenhuma venda registrada ainda.</td>
        </tr>
    <?php endif; ?>
</tbody>
</table>
