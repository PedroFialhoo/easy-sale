<?php
  class Database{
   private $pdo;
   public function __construct(Conexao $conexao)
   {
    $this -> pdo = $conexao -> getConexao();
   }

   public function inserirProduto($nome, $valor, $estoque) {
    $sql = "INSERT INTO produto (nome, valor, estoque) VALUES (:nome, :valor, :estoque)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':estoque', $estoque);
    return $stmt->execute();
}
  }
?>