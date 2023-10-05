<?php
session_start();

if (isset($_SESSION["username"])) {
    // Atualize o tempo da última atividade
    $_SESSION["last_activity"] = time();
    http_response_code(200); // Resposta HTTP 200 (OK)
} else {
    http_response_code(403); // Resposta HTTP 403 (Proibido)
}
?>
