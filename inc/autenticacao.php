<?php
session_start(); // Iniciar a sessão

include('conexao_adm.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nome'];
    $senha = $_POST['senha'];
    $entrar = $_POST['login'];

    if (isset($entrar)) {
        $sql = "SELECT senha, salt FROM usuarios WHERE username = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $senhaArmazenada, $salt);
        mysqli_stmt_fetch($stmt);

        if (password_verify($senha . $salt, $senhaArmazenada)) {
            $_SESSION["username"] = $name; // Armazenar o nome de usuário na sessão
            header('Location: /src/splash.php');
            exit();
        } else {
            echo "<script>alert('Login e/ou senha incorretos');";
            header('Location: /src/login.html');
        }
    }
}
?>