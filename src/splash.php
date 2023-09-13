<?php
if (isset($_COOKIE["username"])) {
    $nomeUsuario = $_COOKIE["username"];
} else {
    header('Location: /src/login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;url=home.php">
    <title>Splash Screen</title>
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .splash-content {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="splash-content">
        <img src="/assets/images/entrega.gif" alt="caminhão de entrega" style="width:96px;height:96px;"> 
        <h1>Bem-vindo! <?php echo $nomeUsuario; ?></h1>
        <p>Aguarde enquanto redirecionamos para a página de início.</p>
    </div>
</body>
</html>
