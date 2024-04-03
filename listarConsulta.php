<?php
    // Inclui o arquivo de configuração que contém a conexão com o banco de dados
    include_once('config.php');

    // Prepara a consulta SQL para selecionar todos os dados da tabela 'agenda'
    $sql = "SELECT * FROM agenda";
    $resultado = $conexao->query($sql);

    // Verifica se a consulta retornou linhas
    if ($resultado->num_rows > 0) {
        // Adiciona CSS para estilizar a tabela
        echo "<style>";
        echo "table { width: 100%; border-collapse: collapse; }";
        echo "th, td { text-align: center; padding: 8px; }";
        echo "tr:nth-child(even) { background-color: #f2f2f2; }";
        echo "</style>";

        // Inicia a tabela HTML
        echo "<table border='1'>";
        echo "<caption>Agenda de Contatos</caption>";
        // Cabeçalho da tabela
        echo "<tr><th>Nome</th><th>Email</th><th>Data</th><th>CPF</th><th>Telefone</th><th>Horário</th></tr>";

        // Percorre os resultados e os exibe em linhas da tabela
        while($row = $resultado->fetch_assoc()) {
            
            echo "<tr>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["dat"] . "</td>";
            echo "<td>" . $row["cpf"] . "</td>";
            echo "<td>" . $row["telefone"] . "</td>";
            echo "<td>" . $row["hora"] . "</td>";
            echo "</tr>";
        }

        // Fecha a tabela HTML
        echo "</table>";
    } else {
        echo "0 resultados";
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
?>

