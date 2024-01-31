<?php

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do formulário
    $name1 = $_POST["name"];
    $codigo = $_POST["codigo"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];

    try {
        // Conecta ao banco de dados
        $db = new SQLite3('teste3.db');

        // Insere os dados na tabela

        
        $stmt = $db->prepare("INSERT INTO Produtos (codigo, nome, descricao, valor) VALUES (:codigo, :name1, :descricao, :preco)");
        // Verifica se a preparação foi bem-sucedida
        if ($stmt) {
            $stmt->bindValue(':codigo', $codigo, SQLITE3_INTEGER);
            $stmt->bindValue(':name1', $name1, SQLITE3_TEXT);           
            $stmt->bindValue(':descricao', $descricao, SQLITE3_TEXT);
            $stmt->bindValue(':preco', $preco, SQLITE3_FLOAT);
            $stmt->execute();
            
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro na preparação da declaração SQL.";
        }
        
        // Fecha a conexão
        $db->close();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>

