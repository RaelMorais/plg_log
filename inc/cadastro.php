<?php
include('conexao_adm.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $senha = md5($_POST['senha']);

  // Verifica se o nome de usuário já existe
  $sqlVerifica = "SELECT username FROM usuarios WHERE username = '$nome'";
  $selectVerifica = mysqli_query($conexao, $sqlVerifica);

  if (mysqli_num_rows($selectVerifica) > 0) {
      echo "<script>alert('Nome de usuário já está em uso');window.location.href='/src/cadastro.html'</script>";
  } else {
      $sql = "INSERT INTO usuarios (senha, username) VALUES ('$senha', '$nome')";
      $insert = mysqli_query($conexao, $sql);

      if ($insert) {
          echo "<script>window.location.href='/src/login.html'</script>";
      } else {
          echo "<script>alert('Não foi possível cadastrar esse usuário');window.location.href='/src/cadastro.html'</script>";
      }
  }
    mysqli_close($conexao);
}
?>
