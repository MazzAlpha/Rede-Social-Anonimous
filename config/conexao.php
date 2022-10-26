<?php
//Conexão com banco de dados usuarios
$host = "localhost";
$user = "root";
$pass = "";
$base = "usuarios";

// Fazendo a conexão
$con = mysqli_connect($host, $user, $pass);
$banco = mysqli_select_db($con, $base);

// Mensagem de falha
if (mysqli_connect_errno()) {
    die("Falha de conexão com o banco de dados: ".
    mysqli_connect_error() . "(".mysqli_connect_errno().")"
    );
}
?>