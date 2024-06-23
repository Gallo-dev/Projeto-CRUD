<?php
require("conecta.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM clientes WHERE id_cliente = $id");

    if (mysqli_num_rows($result) > 0) {
        $cliente = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE clientes SET NOME='$nome', SOBRENOME='$sobrenome', EMAIL='$email', TELEFONE='$telefone' WHERE id_cliente=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Registro atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
</head>
<body>
    <h1>Atualizar Cliente</h1>
    <form method="post" action="atualiza_cliente.php">
        <input type="hidden" name="id" value="<?php echo $cliente['id_cliente']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $cliente['NOME']; ?>"><br>
        Sobrenome: <input type="text" name="sobrenome" value="<?php echo $cliente['SOBRENOME']; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $cliente['EMAIL']; ?>"><br>
        Telefone: <input type="text" name="telefone" value="<?php echo $cliente['TELEFONE']; ?>"><br>
        <input type="submit" name="update" value="Atualizar">
    </form>
    <button onclick="window.location.href='visualiza_cliente.php'">Voltar</button>
</body>
</html>
