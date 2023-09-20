<?php
include('conexao_adm.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nome'];
    $senha = md5($_POST['senha']);
    $entrar = $_POST['login'];

    if (isset($entrar)) {
        $sql = "SELECT * FROM usuarios WHERE username ='$name' AND senha = '$senha'";
        $verifica = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($verifica) <= 0) {
            echo "<script>alert('Login e/ou senha incorretos');</script>";
        } else {
            setcookie("username", $name, time() + 3600, "/");
            header('Location: /src/splash.php');
            exit();
        }
    }
}
?>
