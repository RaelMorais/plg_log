<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $valor = $_GET["valor"];

    // Use prepared statements para evitar SQL injection
    $consulta = "SELECT * FROM produtos WHERE codigo = ? OR nome = ?";
    
    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param("ss", $valor, $valor);
    $stmt->execute();
    
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $detalhes = $resultado->fetch_assoc();
        echo json_encode($detalhes);
    } else {
        http_response_code(204);
    }

    $stmt->close();
    $conexao->close();
    
}
?>
