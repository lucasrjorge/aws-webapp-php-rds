<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador de Produtos</title>
    <style>
        body { font-family: sans-serif; }
        .container { max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        form { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="container">
    <h2>Cadastrar Novo Produto</h2>
    <form action="produtos.php" method="post">
        Nome do Produto: <input type="text" name="nome_produto" required><br><br>
        Preço (ex: 19.99): <input type="text" name="preco" required><br><br>
        <input type="submit" name="submit" value="Cadastrar Produto">
    </form>

    <hr>

    <h2>Produtos Cadastrados</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Preço</th>
            <th>Data de Cadastro</th>
        </tr>
        <?php
            
            $servername = "tutorial-db-instance.c4kjxwf3vpfs.us-east-1.rds.amazonaws.com";
            $username = "tutorial_user";
            $password = "tutorial";
            $dbname = "sample"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            if (isset($_POST['submit'])) {
                $nome_produto = $_POST['nome_produto'];
                $preco = $_POST['preco'];
                $sql = "INSERT INTO Produtos (nome_produto, preco) VALUES ('$nome_produto', '$preco')";
                $conn->query($sql);
            }

            $sql = "SELECT id, nome_produto, preco, data_cadastro FROM Produtos ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome_produto"]. "</td><td>R$ " . number_format($row["preco"], 2, ',', '.') . "</td><td>" . $row["data_cadastro"]. "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum produto cadastrado</td></tr>";
            }
            $conn->close();
        ?>
    </table>
</div>

</body>
</html>
