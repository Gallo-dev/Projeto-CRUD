<?php
require("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $qualpet = isset($_POST['qualpet']) ? $_POST['qualpet'] : '';
    $idade = isset($_POST['idade']) ? $_POST['idade'] : '';
    $porte = isset($_POST['porte']) ? $_POST['porte'] : '';
    $sobre = isset($_POST['sobre']) ? $_POST['sobre'] : '';

    $sql = "INSERT INTO clientes (nome, sobrenome, telefone, email, qualpet, idade, porte, sobre) VALUES ('$nome', '$sobrenome', '$telefone', '$email', '$qualpet', '$idade', '$porte', '$sobre')";

    if (mysqli_query($conn, $sql)) {
        echo "Novo cliente cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
