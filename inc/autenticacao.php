<?php
session_start();
include('conexao_adm.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome']) && isset($_POST['senha'])) {
        $name = $_POST['nome'];
        $senha = $_POST['senha'];

        $sql = "SELECT senha, salt FROM usuarios WHERE username = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $senhaArmazenada, $salt);
        mysqli_stmt_fetch($stmt);

        if (password_verify($senha . $salt, $senhaArmazenada)) {
            $_SESSION["username"] = $name;
            header('Location: /src/splash.php');
            exit();
        } else {
            $error_message = 'Usuário ou senha incorretos.';
            header('Location: /src/login.php?error=1');
            exit();
        }
    }
}
?>