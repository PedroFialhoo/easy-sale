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

    public function buscarProduto($nome) {
        $sql = "SELECT * FROM produto WHERE nome = :nome";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            $produto = new Produto($dados['idProduto'], $dados['nome'], $dados['valor'], $dados['estoque']);
            return $produto;
        }

        return null; // se não encontrou nada
    }
  }
?>