<?php
include('conexao.php');


$nome = $_POST['nome'];
$tipo = $_POST['inlineRadioOptions'];
$CPF = $_POST['cpf'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];

$sql = "SELECT nome FROM clientes WHERE nome = '$nome'";
$select = mysqli_query($conexao,$sql);
$datas = mysqli_fetch_array($select);
  $query = "INSERT INTO clientes (nome,tipo,cpf,cnpj,email) VALUES ('$nome','$tipo','$CPF','$cnpj','$email')";
  $insert = mysqli_query($conexao,$query);
  mysqli_close($conexao);

  if($insert){
    echo"<script language='javascript' type='text/javascript'>
    window.location.href='/src/home.php'</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>
    alert('Não foi possível cadastrar esse usuário');window.location.href='/src/cadastro/cliente.php'</script>";
  }
?>