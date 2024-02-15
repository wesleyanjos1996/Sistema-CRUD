<?php
session_start();
require_once '../model/connect.php';
if (isset($_POST['btn-update'])) {
	$name = mysqli_escape_string($connect, $_POST['name']);
	$last = mysqli_escape_string($connect, $_POST['last']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$birth = mysqli_escape_string($connect, $_POST['birth']);
	$id = mysqli_escape_string($connect, $_POST['id']);
    $datetime = new DateTime();
    $updated_at = $datetime->format('Y-m-d H:i:s');
    $name = mb_strtoupper($name);
    $last = mb_strtoupper($last);
    $email = mb_strtoupper($email);
    $sql = "UPDATE clientes SET nome = '$name', sobrenome = '$last', email = '$email', nascimento = '$birth', updated_at = '$updated_at' WHERE idcliente = '$id'";
    if (mysqli_query($connect, $sql)) {
        $_SESSION['msg'] = 'Atualizado com sucesso!';
    } else {
        $_SESSION['msg'] = 'Erro ao atualizar!';
    }
    header('Location: ../view/client.php');
}
?>