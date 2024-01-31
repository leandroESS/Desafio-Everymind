<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $codigo = $_POST["codigo"];
    // Conectar ao banco de dados
    $db = new SQLite3('teste3.db');

    // Consulta SQL para selecionar todos os registros da tabela
    $stmt = $db->prepare("SELECT * FROM Produtos WHERE codigo = :codigo");
    $stmt->bindValue(':codigo', $codigo, SQLITE3_INTEGER);
    $result = $stmt->execute();


    if ($result) {
        // Exibe os resultados
        while ($row = $result->fetchArray()) {
            echo "Nome do Produto: " . $row['nome'] . "<br>";
            echo "Descrição: " . $row['descricao'] . "<br>";
            echo "Preço: " . $row['valor'] . "<br>";
            echo "<br>";

            echo "É esse o produto do código fornecido? Se não, volte e digite a código correto," . "<br>";
            echo "se sim, digite o códgo novamente para deletar o produto";
            require 'deletar.html';  // não to consegindo fora da pasta
        }

    } else {
        echo "Nenhum produto encontrado com o código fornecido.";
    }
}
