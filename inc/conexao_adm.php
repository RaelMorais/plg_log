<?php
include_once('config.php');

$conexao = mysqli_connect(DB_HOST, DB_USER_ADM, DB_PASSWORD_ADM, DB_NAME_ADM)
or die ('Aconteceu algum problema com a conexão com o banco de dados.');
?>