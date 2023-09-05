<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $valor = $_GET["valor"];

    $consulta = "SELECT *
    FROM produtos
    WHERE codigo = '$valor' 
    OR nome = '$valor'";
    $resultado = $conexao->query($consulta);

    if ($resultado->num_rows > 0) {
        $detalhes = $resultado->fetch_assoc();
        echo json_encode($detalhes);
    } else {
        http_response_code(204);
    }

    mysqli_close($conexao);
}
?>
