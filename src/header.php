<?php
if (isset($_COOKIE["username"])) {
    $nomeUsuario = $_COOKIE["username"];
} else {
    header('Location: /src/login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PJL LOG</title>
    <!--<link rel="icon" type="image/x-icon" href="/assets/images/codigo.png">-->
    <link rel="icon" type="image/x-icon" href="/imagens/Logo_MEIM_1.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/assets/style/alert_traffic.css">
    <link rel="stylesheet" type="text/css" href="/assets/style/valor_invalido.css">
    <link rel="stylesheet" type="text/css" href="/assets/style/cad.produto.css">
    <script src="/assets/js/rotas.js"></script>
    <script src="/assets/js/controller-soma-sub.js"></script>

</head>
<body>
    <header>

    </header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-center navbar-light bg-light">
        <a class="navbar-brand" href="/src/home.php">
            <img src="/assets/images/codigo.png" alt="Logo PJL" width="30" height="24" class="d-inline-block align-text-top">
            PLJ LOG
        </a>
        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Introdução</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/src/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Perfil</a>
            </li>
          </ul>
    </nav>