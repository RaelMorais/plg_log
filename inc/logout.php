<?php
session_start(); // Iniciar a sessão
session_unset(); // Limpar todas as variáveis de sessão
session_destroy(); // Destruir a sessão

// Redirecionar para o index.php
header("HTTP/1.1 302 Found");
header("Location: /index.php");
exit;
?>