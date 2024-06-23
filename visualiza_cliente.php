<?php
session_start();
require("conecta.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Cadastrados</title>
</head>
<body>
    <center>
        <h1>Clientes Cadastrados</h1>

        <?php
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            // Limpa a mensagem após exibir
            unset($_SESSION['message']);
        }
        ?>

        <table border="4">
            <tr>
                <th>NOME</th>
                <th>SOBRENOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>AÇÕES</th>
            </tr>
            <?php
                // Executa a consulta no banco de dados
                $dados_select = mysqli_query($conn, "SELECT id_cliente, NOME, SOBRENOME, EMAIL, TELEFONE FROM clientes");

                // Itera pelos resultados da consulta e cria linhas na tabela
                while ($dado = mysqli_fetch_assoc($dados_select)) {
                    echo '<tr>';
                    echo '<td>' . $dado['NOME'] . '</td>';
                    echo '<td>' . $dado['SOBRENOME'] . '</td>';
                    echo '<td>' . $dado['EMAIL'] . '</td>';
                    echo '<td>' . $dado['TELEFONE'] . '</td>';
                    echo '<td>
                            <a href="atualiza_cliente.php?id=' . $dado['id_cliente'] . '">Atualizar</a>
                            <a href="deleta_cliente.php?id=' . $dado['id_cliente'] . '">Deletar</a>
                          </td>';
                    echo '</tr>';
                }
            ?>
        </table>
        <br />
        <button onclick="window.location.href='index.html'">Voltar</button>
    </center>
</body>
</html>
