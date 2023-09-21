<?php
include('conexao_adm.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $senha = $_POST['senha'];

  // Gerar um salt aleatório
  $salt = bin2hex(random_bytes(16)); // Use um tamanho adequado para o salt

  // Concatenar o salt com a senha do usuário
  $senhaComSalt = $senha . $salt;

  // Fazer o hash MD5 da senha com o salt
  $senhaHash = md5($senhaComSalt);

  // Verifica se o nome de usuário já existe
  $sqlVerifica = "SELECT username FROM usuarios WHERE username = '$nome'";
  $selectVerifica = mysqli_query($conexao, $sqlVerifica);

  if (mysqli_num_rows($selectVerifica) > 0) {
      echo "<script>alert('Nome de usuário já está em uso');window.location.href='/src/cadastro.html'</script>";
  } else {
      // Armazene o salt junto com a senha hash no banco de dados
      $sql = "INSERT INTO usuarios (senha, salt, username) VALUES ('$senhaHash', '$salt', '$nome')";
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
