<?php
class Conexao {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "loja_virtual";
    private $pdo;

    public function __construct() {
        $this->criarBanco();
        $this->criarTabelas();
    }

    private function criarBanco() {
        try {
            $pdo = new PDO("mysql:host={$this->host}", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$this->dbname}`
                        CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Erro ao criar banco: " . $e->getMessage());
        }
    }

    private function criarTabelas() {
        try {
            $sql1 = "CREATE TABLE IF NOT EXISTS produto (
                        idProduto INT AUTO_INCREMENT PRIMARY KEY,
                        nome VARCHAR(100),
                        valor FLOAT,
                        estoque INT,
                        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    ) ENGINE=InnoDB";

            $this->pdo->exec($sql1);

            $sql2 = "CREATE TABLE IF NOT EXISTS venda (
                        idVenda INT AUTO_INCREMENT PRIMARY KEY,
                        idProduto INT,
                        quantidade INT,
                        valorTotal FLOAT,
                        dataVenda DATE,
                        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        FOREIGN KEY (idProduto) REFERENCES produto(idProduto)
                    ) ENGINE=InnoDB";

            $this->pdo->exec($sql2);

        } catch (PDOException $e) {
            die("Erro ao criar tabelas: " . $e->getMessage());
        }
    }

    public function getConexao() {
        return $this->pdo;
    }
}
