<?php
include('conexao.php');

if (isset($_COOKIE["username"])) {
  $nomeUsuario = $_COOKIE["username"];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $tipo = $_POST['inlineRadioOptions'];
    $CPF = $_POST['cpf'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];

    // Verifique se o nome do cliente já existe
    $verificarNome = "SELECT nome FROM clientes WHERE nome = '$nome'";
    $verificarQuery = mysqli_query($conexao, $verificarNome);

    if (mysqli_num_rows($verificarQuery) > 0) {
        // Se o nome do cliente já existir, exiba uma mensagem de erro e redirecione
        echo "<script>alert('Não foi possível cadastrar este cliente devido a um nome já existente');</script>";
        redirecionar('/src/cadastro/cliente.php');
    } else {
        // Se o nome do cliente não existir, insira o novo cliente
        $query = "INSERT INTO clientes (autor, nome, tipo, cpf, cnpj, email) VALUES ('$nomeUsuario', '$nome', '$tipo', '$CPF', '$cnpj', '$email')";
        $insert = mysqli_query($conexao, $query);
        mysqli_close($conexao);

        if ($insert) {
            redirecionar('/src/home.php');
        } else {
            // Se houver um erro, exiba uma mensagem de erro e redirecione
            echo "<script>alert('Não foi possível cadastrar este cliente');</script>";
            redirecionar('/src/cadastro/cliente.php');
        }
    }
} else {
    // Se o método de solicitação não for POST, redirecione
    redirecionar('/src/cadastro/cliente.php');
}

function redirecionar($url) {
    echo "<script>window.location.href='$url';</script>";
    exit();
}
?>
