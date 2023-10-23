<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $valor = $_GET["codigo"];

    // Use prepared statements para evitar SQL injection
    $consulta = 
    "SELECT m.* FROM movimentacao AS m
    INNER JOIN pallets AS p ON m.id = p.id_movimentacao
    WHERE p.codigo = ?";
    
    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param("s", $valor);
    $stmt->execute();
    
    $resultado = $stmt->get_result();

    $movimentacoes = array();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $movimentacoes[] = $row;
        }
        echo json_encode($movimentacoes);
    } else {
        echo json_encode(array("erro" => "Nenhuma movimentação encontrada com o código informado."));
    }

    $stmt->close();
    $conexao->close();
}
?>
