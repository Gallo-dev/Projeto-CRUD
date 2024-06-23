<?php
session_start();
require("conecta.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM clientes WHERE id_cliente = $id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Registro deletado com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao deletar registro: " . mysqli_error($conn);
    }
}

header("Location: visualiza_cliente.php");
exit();
?>
