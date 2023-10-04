<?php
include('header.php');
include('../inc/conexao.php');

function exibirMovimentacoes($conexao) {
    $sql = "SELECT DISTINCT pallets.autor, pallets.codigo, pallets.data, movimentacao.movimentacao, movimentacao.pallet1, movimentacao.pallet2, movimentacao.pallet3, movimentacao.pallet4, movimentacao.pallet5, movimentacao.pallet6
            FROM pallets
            JOIN movimentacao ON pallets.id_movimentacao = movimentacao.id";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result){
        echo "<table class='table table-dark table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Responsavel</th>
                        <th scope='col'>Código</th>
                        <th scope='col'>Data</th>
                        <th scope='col'>Movimentação</th>
                        <th scope='col'>Pallet 1</th>
                        <th scope='col'>Pallet 2</th>
                        <th scope='col'>Pallet 3</th>
                        <th scope='col'>Pallet 4</th>
                        <th scope='col'>Pallet 5</th>
                        <th scope='col'>Pallet 6</th>
                    </tr>
                </thead>
                <tbody>";

        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['autor'] . "</td>";
            echo "<td>" . $row['codigo'] . "</td>";
            echo "<td>" . $row['data'] . "</td>";
            echo "<td>" . ($row['movimentacao'] == 1 ? 'Entrada' : 'Saida') . "</td>";
            echo "<td>" . $row['pallet1'] . "</td>";
            echo "<td>" . $row['pallet2'] . "</td>";
            echo "<td>" . $row['pallet3'] . "</td>";
            echo "<td>" . $row['pallet4'] . "</td>";
            echo "<td>" . $row['pallet5'] . "</td>";
            echo "<td>" . $row['pallet6'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Erro na consulta de movimentações: " . $conexao->error;
    }
}

function exibirProdutos($conexao) {
    $sql = "SELECT DISTINCT *
            FROM produtos";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result){
        echo "<table class='table table-dark table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Nome</th>
                        <th scope='col'>Código</th>
                        <th scope='col'>Modelo</th>
                        <th scope='col'>Custo</th>
                        <th scope='col'>Lucro</th>
                        <th scope='col'>Preço</th>
                        <th scope='col'>Volume</th>
                        <th scope='col'>Descrição</th>
                    </tr>
                </thead>
                <tbody>";

        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['codigo'] . "</td>";
            echo "<td>" . $row['modelo'] . "</td>";
            echo "<td>" . $row['custo'] . "</td>";
            echo "<td>" . $row['lucro'] . "%</td>";
            echo "<td>" . $row['preco'] . "</td>";
            echo "<td>" . $row['volume'] . "</td>";
            echo "<td>" . $row['descricao'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Erro na consulta de produtos: " . $conexao->error;
    }
}

// Exibir as movimentações
exibirMovimentacoes($conexao);

// Exibir os produtos
exibirProdutos($conexao);

mysqli_close($conexao);
?>
