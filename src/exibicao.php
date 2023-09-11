<?php 
include('header.php');
include('../inc/conexao.php');

echo "<table class='table table-dark table-striped'>
        <thead>
            <tr>
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

$sql = "SELECT pallets.codigo, movimentacao.data, movimentacao.movimentacao, pallets.pallet1, pallets.pallet2, pallets.pallet3, pallets.pallet4, pallets.pallet5, pallets.pallet6
        FROM pallets
        JOIN movimentacao ON pallets.codigo = movimentacao.codigo"; 

$result = mysqli_query($conexao, $sql);
$rows = mysqli_num_rows($result);

if($rows > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>" . $row['codigo'] . "</td>";
        echo "<td>" . $row['data'] . "</td>";
        echo "<td>" . $row['movimentacao'] . "</td>";
        echo "<td>" . $row['pallet1'] . "</td>";
        echo "<td>" . $row['pallet2'] . "</td>";
        echo "<td>" . $row['pallet3'] . "</td>";
        echo "<td>" . $row['pallet4'] . "</td>";
        echo "<td>" . $row['pallet5'] . "</td>";
        echo "<td>" . $row['pallet6'] . "</td>";
        echo "</tr>";
    }
}

echo "</tbody></table>";
?>
