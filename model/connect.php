<?php
$servername = 'localhost';
$username = 'root';
$password = 'devOPS26WDA@';
$databasename = 'sistemacrud';
$connect = mysqli_connect($servername, $username, $password, $databasename);
if (mysqli_connect_error()) echo 'Erro na conexão: '.mysqli_connect_error();
?>