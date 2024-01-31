<?php

// Conectar ao banco de dados
$db = new SQLite3('teste3.db');

// Consulta SQL para selecionar todos os registros da tabela
$query = "SELECT * FROM Produtos";
$result = $db->query($query);

// Exibir os resultados
echo "<table border='1'>
        <tr>
            <th>Nome</th>
            <th>Código</th>
            <th>Descrição</th>
            <th>Preço</th>
        </tr>";

while ($row = $result->fetchArray()) {
    echo "<tr>
            <td>{$row['nome']}</td>
            <td>{$row['codigo']}</td>
            <td>{$row['descricao']}</td>
            <td>{$row['valor']}</td>
          </tr>";
}

echo "</table>";

// Fechar a conexão com o banco de dados
$db->close();

?>
