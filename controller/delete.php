<?php
session_start();
require_once '../model/connect.php';
if (isset($_POST['btn-delete'])) {
	$id = mysqli_escape_string($connect, $_POST['id']);
	$sql = "DELETE FROM clientes WHERE idcliente = '$id'";
	if (mysqli_query($connect, $sql)) {
        $_SESSION['msg'] = 'Deletado com sucesso!';
        header('Location: ../view/client.php');
    } else {
        $_SESSION['msg'] = 'Erro ao deletar!';
        header('Location: ../view/client.php');
    }
}
?>