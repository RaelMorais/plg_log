<?php
include_once('config.php');

$conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conexao) {
    die('Aconteceu algum problema com a conexão com o banco de dados: ' . mysqli_connect_error());
}
?>