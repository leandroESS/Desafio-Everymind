<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do formulário
    $newName = $_POST["novo_name"];
    $codigo = $_POST["codigo"];
    $newDescricao = $_POST["novo_descricao"];
    $newPreco = $_POST["novo_preco"];

    // Conecta ao banco de dados SQLite3
    $db = new SQLite3('teste3.db');

    // Atualiza os dados na tabela
    $stmt = $db->prepare("UPDATE Produtos SET nome = :newName, descricao = :newDescricao, valor = :newPreco WHERE codigo = :codigo");
    $stmt->bindValue(':newName', $newName, SQLITE3_TEXT);
    $stmt->bindValue(':codigo', $codigo, SQLITE3_INTEGER);
    $stmt->bindValue(':newDescricao', $newDescricao, SQLITE3_TEXT);
    $stmt->bindValue(':newPreco', $newPreco, SQLITE3_FLOAT);
    $stmt->execute();

    echo "Dados atualizados com sucesso!";
}



