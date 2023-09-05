<?php
include('conexao_adm.php');


$senha = MD5($_POST['senha']);
$nome = $_POST['nome'];

$sql = "SELECT username FROM usuarios WHERE username = '$nome'";
$select = mysqli_query($conexao,$sql);
$datas = mysqli_fetch_array($select);
  $query = "INSERT INTO usuarios (senha,username) VALUES ('$senha','$nome')";
  $insert = mysqli_query($conexao,$query);
  mysqli_close($conexao);

  if($insert){
    echo"<script language='javascript' type='text/javascript'>
    window.location.href='/src/login.html'</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>
    alert('Não foi possível cadastrar esse usuário');window.location.href='/src/cadastro.html'</script>";
  }
?>