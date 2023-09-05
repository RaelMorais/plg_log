async function showpallets_saida() {
    fecharQuantidadeEntrada();
    var codigo = document.getElementById("codigo-hidden").value;

    if (codigo !== "") {
        try {
            const response = await fetch("/inc/consultaPallet.php?codigo=" + codigo);

            if (response.ok) {
                const detalhesPallets = await response.json();

                if (detalhesPallets.length > 0) {
                    const totalPallet1 = calcularTotalPallet(detalhesPallets, 'pallet1');
                    const totalPallet2 = calcularTotalPallet(detalhesPallets, 'pallet2');
                    const totalPallet3 = calcularTotalPallet(detalhesPallets, 'pallet3');
                    const totalPallet4 = calcularTotalPallet(detalhesPallets, 'pallet4');
                    const totalPallet5 = calcularTotalPallet(detalhesPallets, 'pallet5');
                    const totalPallet6 = calcularTotalPallet(detalhesPallets, 'pallet6');

                    atualizarQtdProdt('qtdProdt1', totalPallet1);
                    atualizarQtdProdt('qtdProdt2', totalPallet2);
                    atualizarQtdProdt('qtdProdt3', totalPallet3);
                    atualizarQtdProdt('qtdProdt4', totalPallet4);
                    atualizarQtdProdt('qtdProdt5', totalPallet5);
                    atualizarQtdProdt('qtdProdt6', totalPallet6);
                } else {
                    console.log("Nenhum produto encontrado com o código informado.");
                }
            } else {
                throw new Error("Erro na requisição: " + response.status);
            }
        } catch (error) {
            console.error(error);
        }
    }

    document.getElementById("alertPallet").style.display = "flex";
}

function calcularTotalPallet(pallets, propertyName) {
    var totalPallet = 0;

    pallets.forEach((pallet) => {
        if (!isNaN(pallet[propertyName])) {
            totalPallet += parseInt(pallet[propertyName]);
        }
    });

    return totalPallet;
}

function atualizarQtdProdt(id, totalPallet) {
    document.getElementById(id).textContent = totalPallet;
}