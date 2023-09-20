<?php
include('conexao.php');

if (isset($_COOKIE["username"])) {
    $nomeUsuario = $_COOKIE["username"];
}

$cod = $_POST['codigo'];
$nome = $_POST['nome'];
$model = $_POST['modelo'];
$description = $_POST['description'];
$custo = $_POST['custo'];
$lucro = $_POST['lucro'];
$vol = $_POST['volume'];
$preco = $_POST["preco"];

// Verifique se já existe um produto com o mesmo código
$verificarCodigo = "SELECT codigo FROM produtos WHERE codigo = '$cod'";
$verificarQuery = mysqli_query($conexao, $verificarCodigo);

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
