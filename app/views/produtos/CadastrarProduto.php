<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        .success {
            margin-top: 15px;
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Produto</h2>
        <form method="POST" action="">
            <label for="cx_id">ID</label>
            <input type="number" name="cx_id" id="cx_id" required>

            <label for="cx_nome">Nome</label>
            <input type="text" name="cx_nome" id="cx_nome" required>

            <label for="cx_valor">Valor</label>
            <input type="number" step="0.01" name="cx_valor" id="cx_valor" required>

            <label for="cx_estoque">Estoque</label>
            <input type="number" name="cx_estoque" id="cx_estoque" required>

            <button type="submit">Cadastrar Produto</button>
        </form>

        <?php
        // Exemplo de feedback
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<div class="success">Produto cadastrado com sucesso!</div>';
        }
        ?>
    </div>
</body>
</html>
