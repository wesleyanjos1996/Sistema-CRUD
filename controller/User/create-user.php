<?php
session_start();
require_once '../../model/connect.php';
if (isset($_POST['btn-create-user'])) {
    $username = mysqli_escape_string($connect, $_POST['username']);
    $password = mysqli_escape_string($connect, $_POST['password']);
    $name = mysqli_escape_string($connect, $_POST['name']);
    
    $datetime = new DateTime();
    $created_at = $datetime->format('Y-m-d H:i:s');
    $username = mb_strtoupper($username);
    $name = mb_strtoupper($name);
    
    $sql = "INSERT INTO usuarios (login, senha, nome, created_at, updated_at) VALUES ('$username', '$password', '$name', '$created_at', '$created_at')";
	
    if (mysqli_query($connect, $sql)) {
        $sql = "SELECT * FROM usuarios WHERE login = '$username'";
        $result = mysqli_query($connect, $sql);
        $data = mysqli_fetch_array($result);
        mysqli_close($connect);
        $_SESSION['log'] = true;
        $_SESSION['id-user'] = $data['idusuario'];
        $_SESSION['msg'] = 'Cadastrado com sucesso!';
        header('Location: ../../view/home.php');
    } else {
        $_SESSION['msg'] = 'Erro ao cadastrar!';
        header('Location: ../../index.php');
    }   
}
?>