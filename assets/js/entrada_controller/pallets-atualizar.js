async function showPallets() {
    fecharQuantidadeEntrada();
    var codigo = document.getElementById("codigo-hidden").value;
    const movi = document.getElementById("movimentacao-hidden").value;

    if (codigo !== "") {
        try {
            const response = await fetch("/inc/consultaPallet.php?codigo=" + codigo);

            if (response.ok) {
                const detalhesPallets = await response.json();

                if (detalhesPallets.length > 0) {
                    // Aplicar o filtro para encontrar pallets com a movimentação correta
                    const palletsMovimentacao = detalhesPallets.filter(pallet => pallet.movimentacao === '1');

                    if (palletsMovimentacao.length > 0) {
                        // Calcular os totais para os pallets filtrados
                        const totalPallet1 = calcularTotalPallet(palletsMovimentacao, 'pallet1');
                        const totalPallet2 = calcularTotalPallet(palletsMovimentacao, 'pallet2');
                        const totalPallet3 = calcularTotalPallet(palletsMovimentacao, 'pallet3');
                        const totalPallet4 = calcularTotalPallet(palletsMovimentacao, 'pallet4');
                        const totalPallet5 = calcularTotalPallet(palletsMovimentacao, 'pallet5');
                        const totalPallet6 = calcularTotalPallet(palletsMovimentacao, 'pallet6');

                        const palsum = totalPallet1 + totalPallet2 + totalPallet3 + totalPallet4 + totalPallet5 + totalPallet6;
                        document.getElementById('inpTotalPalletValue').textContent = palsum.toString();

                            atualizarQtdProdt('qtdProdt1', totalPallet1);
                            atualizarQtdProdt('qtdProdt2', totalPallet2);
                            atualizarQtdProdt('qtdProdt3', totalPallet3);
                            atualizarQtdProdt('qtdProdt4', totalPallet4);
                            atualizarQtdProdt('qtdProdt5', totalPallet5);
                            atualizarQtdProdt('qtdProdt6', totalPallet6);
                        
                        /*
                        if (movi === '2') {
                            document.getElementById("editavel1").textContent = totalPallet1;
                            document.getElementById("editavel2").textContent = totalPallet2;
                            document.getElementById("editavel3").textContent = totalPallet3;
                            document.getElementById("editavel4").textContent = totalPallet4;
                            document.getElementById("editavel5").textContent = totalPallet5;
                            document.getElementById("editavel6").textContent = totalPallet6;
                        }*/
                    } else {
                        console.log(`Nenhum produto encontrado com movimentacao igual a '${movi}'.`);
                    }
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