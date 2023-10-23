<?php
session_start(); // Iniciar a sessão

include('conexao.php');

$nomeUsuario = isset($_SESSION["username"]) ? $_SESSION["username"] : null;
$movimentacao = $_POST['movimentacao'];
$codigo = $_POST['codigo'];
$editaveis = array($_POST['editavel1'], $_POST['editavel2'], $_POST['editavel3'], $_POST['editavel4'], $_POST['editavel5'], $_POST['editavel6']);

$sqlMovimentacao = "INSERT INTO movimentacao (pallet1, pallet2, pallet3, pallet4, pallet5, pallet6, movimentacao) 
VALUES ('" . implode("','", $editaveis) . "', '$movimentacao')";

if ($conexao->query($sqlMovimentacao)) {
    $movimentacao_id = $conexao->insert_id;
    
    $sqlPallets = "INSERT INTO pallets (autor, codigo, id_movimentacao, data) 
                VALUES ('$nomeUsuario', '$codigo', '$movimentacao_id', NOW())";

    if ($conexao->query($sqlPallets)) {
        echo "Inserção bem-sucedida nas tabelas movimentacao e pallets.";
    } else {
        echo "Erro ao inserir na tabela pallets: " . $conexao->error;
    }
} else {
    echo "Erro ao inserir na tabela movimentacao: " . $conexao->error;
}

$conexao->close();
?>
