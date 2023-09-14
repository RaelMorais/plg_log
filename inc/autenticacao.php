<?php
include('conexao_adm.php');

$name = $_POST['nome'];
$senha = MD5($_POST['senha']);
$entrar = $_POST['login'];

if (isset($entrar)) {
  $sql = "SELECT * FROM usuarios WHERE username ='$name' AND senha = '$senha'";
  $verifica = mysqli_query($conexao, $sql);
  echo $name;
  if (mysqli_num_rows($verifica) <= 0) {
    echo "<script language='javascript' type='text/javascript'>
      alert('Login e/ou senha incorretos');window.location.href='/src/login.html';</script>";
    die();
  } else {
    setcookie("username", $name, time() + 100, "/"); // Set the cookie here
    header('Location: /src/splash.php');
  }
}
?>
