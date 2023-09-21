<?php
session_start(); // Iniciar a sessão

include('conexao_adm.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nome'];
    $senha = $_POST['senha'];
    $entrar = $_POST['login'];

    if (isset($entrar)) {
        $sql = "SELECT * FROM usuarios WHERE username ='$name'";
        $verifica = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($verifica) <= 0) {
            echo "<script>alert('Login e/ou senha incorretos');</script>";
        } else {
            $row = mysqli_fetch_assoc($verifica);
            $salt = $row['salt'];
            $senhaComSalt = $senha . $salt;
            $senhaHash = md5($senhaComSalt);

            if ($senhaHash === $row['senha']) {
                $_SESSION["username"] = $name; // Armazenar o nome de usuário na sessão
                header('Location: /src/splash.php');
                exit();
            } else {
                echo "<script>alert('Login e/ou senha incorretos');</script>";
            }
        }
    }
}
?>
