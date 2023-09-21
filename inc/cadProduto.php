<?php
session_start(); // Iniciar a sessão

include('conexao.php');

if (isset($_SESSION["username"])) {
    $nomeUsuario = $_SESSION["username"];
} else {
    // Se o usuário não estiver autenticado, redirecione para a página de login
    redirecionar('/src/login.php');
}

$cod = $_POST['codigo'];
$nome = $_POST['nome'];
$model = $_POST['modelo'];
$description = $_POST['description'];
$custo = $_POST['custo'];
$lucro = $_POST['lucro'];
$vol = $_POST['volume'];
$preco = $_POST["preco"];

// Resto do seu código permanece o mesmo

if (mysqli_num_rows($verificarQuery) > 0) {
    // Se já existe um produto com o mesmo código, exiba uma mensagem de erro e redirecione
    echo "<script>alert('Não foi possível cadastrar este produto devido a um código já existente');</script>";
    redirecionar('/src/cadastro/produto.php');
} else {
    // Se o código não existe, insira o novo produto
    $query = "INSERT INTO produtos (autor, codigo, nome, modelo, descricao, custo, lucro, preco, volume) 
    VALUES ('$nomeUsuario','$cod', '$nome', '$model', '$description', '$custo', '$lucro', '$preco', '$vol')";
    
    $insert = mysqli_query($conexao, $query);
    mysqli_close($conexao);

    if ($insert) {
        redirecionar('/src/home.php');
    } else {
        // Se houver um erro, exiba uma mensagem de erro e redirecione
        echo "<script>alert('Não foi possível cadastrar este produto');</script>";
        redirecionar('/src/cadastro/produto.php');
    }
}

function redirecionar($url) {
    echo "<script>window.location.href='$url';</script>";
    exit();
}
?>