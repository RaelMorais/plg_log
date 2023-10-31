<?php
session_start(); // Iniciar a sessão

include('conexao.php');

$cod = $_POST['codigo'];
$nome = $_POST['nome'];
$model = $_POST['modelo'];
$description = $_POST['description'];
$custo = $_POST['custo'];
$lucro = $_POST['lucro'];
$vol = $_POST['volume'];
$preco = $_POST["preco"];

$verificarCodigo = "SELECT codigo FROM produtos WHERE codigo = '$cod'";
$verificarQuery = mysqli_query($conexao, $verificarCodigo);

if (mysqli_num_rows($verificarQuery) > 0) {
    echo "<script>alert('Não foi possível cadastrar este produto devido a um código já existente');</script>";
    redirecionar('/src/cadastro/produto.php');
} else {
    $query = "INSERT INTO produtos (autor, codigo, nome, modelo, descricao, custo, lucro, preco, volume) 
    VALUES ('$nomeUsuario','$cod', '$nome', '$model', '$description', '$custo', '$lucro', '$preco', '$vol')";

    if ($insert) {
        redirecionar('/src/home.php');
        $insert = mysqli_query($conexao, $query);
        mysqli_close($conexao);
    } else {
        echo "<script>alert('Não foi possível cadastrar este produto');</script>";
        redirecionar('/src/cadastro/produto.php');
        mysqli_close($conexao);
    }
}

function redirecionar($url) {
    echo "<script>window.location.href='$url';</script>";
    exit();
}
?>