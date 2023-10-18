<?php
session_start(); // Iniciar a sessão

include('conexao.php');

if (isset($_SESSION["username"])) {
    $nomeUsuario = $_SESSION["username"];
} else {
    redirecionar('/src/login.php');
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $tipo = $_POST['inlineRadioOptions'];
    $CPF = isset($_POST['cpf']) ? $_POST['cpf'] : null;
    $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
    $email = $_POST['email'];

    $verificarNome = "SELECT nome FROM clientes WHERE nome = '$nome'";
    $verificarQuery = mysqli_query($conexao, $verificarNome);

    if (mysqli_num_rows($verificarQuery) > 0) {
        echo "<script>alert('Não foi possível cadastrar este cliente devido a um nome já existente');</script>";
        redirecionar('/src/cadastro/cliente.php');
    } else {
        $query = "INSERT INTO clientes (autor, nome, tipo, cpf, cnpj, email) VALUES ('$nomeUsuario', '$nome', '$tipo', '$CPF', '$cnpj', '$email')";
        $insert = mysqli_query($conexao, $query);
        mysqli_close($conexao);

        if ($insert) {
            redirecionar('/src/home.php');
        } else {
            echo "<script>alert('Não foi possível cadastrar este cliente');</script>";
            //redirecionar('/src/cadastro/cliente.php');
        }
    }
} else {
    redirecionar('/src/cadastro/cliente.php');
}

function redirecionar($url) {
    echo "<script>window.location.href='$url';</script>";
    exit();
}
?>