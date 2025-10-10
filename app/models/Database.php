<?php
require_once __DIR__ . '/Produtos.php';
require_once __DIR__ . '/Vendas.php';
  class Database{
    private $pdo;
    public function __construct(Conexao $conexao)
    {
      $this -> pdo = $conexao -> getConexao();
    }

    public function inserirProduto($nome, $valor, $estoque) {
      try {
          $sql = "INSERT INTO produto (nome, valor, estoque) VALUES (:nome, :valor, :estoque)";
          $stmt = $this->pdo->prepare($sql);
          $stmt->bindParam(':nome', $nome);
          $stmt->bindParam(':valor', $valor);
          $stmt->bindParam(':estoque', $estoque);
          if ($stmt->execute()) {
              return "Produto inserido com sucesso!";
          } else {
              return "Erro ao inserir o produto.";
          }
      } catch (Exception $e) {
          return "Erro: " . $e->getMessage();
      }
  } 

    public function buscarProduto($idProduto) {
        $sql = "SELECT * FROM produto WHERE idProduto = :idProduto";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idProduto', $idProduto, PDO::PARAM_STR);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            $produto = new Produto($dados['nome'], $dados['valor'], $dados['estoque'], $dados['idProduto']);
            return $produto;
        }

        return null; 
    }

    public function buscarTodosProdutos() {
      $sql = "SELECT * FROM produto";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
      $produtos = [];
  
      if ($dados) {
          foreach ($dados as $dado) {
              $produto = new Produto($dado['nome'], $dado['valor'], $dado['estoque'], $dado['idProduto']);
              $produtos[] = $produto;
          }
          return $produtos; 
      }
  
     return null;
  }
  

    public function registrarVenda($idProduto, $quantidade, $valorTotal) {
      try {
        $sql = "INSERT INTO venda (idProduto, quantidade, valorTotal) 
        VALUES (:idProduto, :quantidade, :valorTotal)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idProduto', $idProduto);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':valorTotal', $valorTotal);
          if ($stmt->execute()) {
              $this->atualizarEstoque($idProduto, $quantidade);
              return "Produto comprado com sucesso!";
          } else {
              return "Erro ao comprar o produto.";
          }
        } catch (Exception $e) {
            return "Erro: " . $e->getMessage();
        }
    }

    public function atualizarEstoque($idProduto, $quantidadeVendida) {
      $sql = "UPDATE produto SET estoque = estoque - :quantidade WHERE idProduto = :idProduto";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(':quantidade', $quantidadeVendida);
      $stmt->bindParam(':idProduto', $idProduto);
      $stmt->execute();
  }

  public function buscarTodosVendas() {
    $sql = "SELECT * FROM venda";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $vendas = [];

    if ($dados) {
        foreach ($dados as $dado) {
            $produtoObj = $this->buscarProduto($dado['idProduto']);
            $venda = new Vendas($produtoObj, $dado['quantidade'], $dado['valorTotal'], $dado['dataVenda']);
            $vendas[] = $venda;
        }
        return $vendas; 
    }

   return null;
}


  }
?>