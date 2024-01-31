<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Obtém os dados do formulário   
    $codigo = $_POST["codigo"];
   
    // Conectar ao banco de dados SQLite3
    $db = new SQLite3('teste3.db');

    // Atualiza os dados na tabela
    $stmt = $db->prepare("DELETE FROM Produtos  WHERE codigo = :codigo");
    $stmt->bindValue(':codigo', $codigo, SQLITE3_INTEGER);

    $stmt->execute();

    echo "Produto deletado com sucesso!";
}



