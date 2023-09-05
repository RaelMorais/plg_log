<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $valor = $_GET["codigo"];

    $consulta = "SELECT m.*
    FROM movimentacao AS m
    INNER JOIN pallets AS p ON m.id = p.id_movimentacao
    WHERE p.codigo = '$valor'";
    $resultado = $conexao->query($consulta);

    $movimentacoes = array();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $movimentacoes[] = $row;
        }
        echo json_encode($movimentacoes);
    } else {
        echo json_encode(array("erro" => "Nenhuma movimentação encontrada com o código informado."));
    }

    $conexao->close();
}
?>
