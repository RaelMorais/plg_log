<?php
include('conexao.php');

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
    // Se já existe um produto com o mesmo código, exiba uma mensagem de erro
    echo "<script language='javascript' type='text/javascript'>
    alert('Não foi possível cadastrar este produto devido a um código já existente');
    window.location.href='/src/cadastro/produto.php';
    </script>";
} else {
    // Se o código não existe, insira o novo produto
    $query = "INSERT INTO produtos (codigo, nome, modelo, descricao, custo, lucro, preco, volume) 
    VALUES ('$cod', '$nome', '$model', '$description', '$custo', '$lucro', '$preco', '$vol')";
    
    $insert = mysqli_query($conexao, $query);
    mysqli_close($conexao);

    if ($insert) {
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='/src/home.php';
        </script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar este produto');
        window.location.href='/src/cadastro/produto.php';
        </script>";
    }
}
?>
