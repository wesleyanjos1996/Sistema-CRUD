<?php
session_start();
require_once '../model/connect.php';
$id = $_SESSION['id-user'];
if (isset($_POST['btn-create'])) {
    $name = mysqli_escape_string($connect, $_POST['name']);
    $last = mysqli_escape_string($connect, $_POST['last']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $birth = mysqli_escape_string($connect, $_POST['birth']);
    $datetime = new DateTime();
    $created_at = $datetime->format('Y-m-d H:i:s');
    $name = mb_strtoupper($name);
    $last = mb_strtoupper($last);
    $email = mb_strtoupper($email);
    $sql = "INSERT INTO clientes (nome, sobrenome, email, nascimento, idusuario, created_at, updated_at) VALUES ('$name', '$last', '$email', '$birth', '$id', '$created_at', '$created_at')";
	if (mysqli_query($connect, $sql)) {
        $_SESSION['msg'] = 'Cadastrado com sucesso!';
    } else {
        $_SESSION['msg'] = 'Erro ao cadastrar!';
    }
    header('Location: ../view/client.php');
}
?>