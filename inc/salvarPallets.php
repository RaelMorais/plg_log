<?php
include('conexao.php');

$movimentacao = $_POST['movimentacao'];
$codigo = $_POST['codigo'];
$editavel1 = $_POST['editavel1'];
$editavel2 = $_POST['editavel2'];
$editavel3 = $_POST['editavel3'];
$editavel4 = $_POST['editavel4'];
$editavel5 = $_POST['editavel5'];
$editavel6 = $_POST['editavel6'];

// Realizar o insert na tabela movimentacao
$sqlMovimentacao = "INSERT INTO movimentacao (codigo ,pallet1, pallet2, pallet3, pallet4, pallet5, pallet6, movimentacao) 
VALUES ('$codigo', '$editavel1', '$editavel2', '$editavel3', '$editavel4', '$editavel5', '$editavel6', '$movimentacao')";

$insertMovimentacao = mysqli_query($conexao, $sqlMovimentacao);

if ($insertMovimentacao) {
    // Obter o ID da última inserção
    $movimentacao_id = mysqli_insert_id($conexao);

    // Realizar o insert na tabela pallets
    $sqlPallets = "INSERT INTO pallets (codigo, id_movimentacao, data) VALUES ('$codigo', '$movimentacao_id', NOW())";

    $insertPallets = mysqli_query($conexao, $sqlPallets);

    if ($insertPallets) {
        echo "Inserção bem-sucedida nas tabelas movimentacao e pallets.";
    } else {
        echo "Erro ao inserir na tabela pallets: " . mysqli_error($conexao);
    }
} else {
    echo "Erro ao inserir na tabela movimentacao: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
