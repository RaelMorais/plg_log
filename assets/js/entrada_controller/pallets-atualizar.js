async function showpallets() {
    toggleQuantidadeEntrada(false);
    const codigo = document.getElementById("codigo-hidden").value;

    if (codigo !== "") {
        try {
            const response = await fetch("/inc/consultaPallet.php?codigo=" + codigo);

            if (response.ok) {
                const detalhesPallets = await response.json();

                if (detalhesPallets.length > 0) {
                    const movimentacao = detalhesPallets[0].movimentacao;

                    // Atualizar campos com base na movimentação
                    if (movimentacao === 1) {
                        const totalPallet1ent = calcularTotalPallet(detalhesPallets, 'pallet1');
                        const totalPallet2ent = calcularTotalPallet(detalhesPallets, 'pallet2');
                        const totalPallet3ent = calcularTotalPallet(detalhesPallets, 'pallet3');
                        const totalPallet4ent = calcularTotalPallet(detalhesPallets, 'pallet4');
                        const totalPallet5ent = calcularTotalPallet(detalhesPallets, 'pallet5');
                        const totalPallet6ent = calcularTotalPallet(detalhesPallets, 'pallet6');

                        // Atualize os campos com os totais da movimentação de entrada
                        atualizarQtdProdt('qtdProdt1', totalPallet1ent);
                        atualizarQtdProdt('qtdProdt2', totalPallet2ent);
                        atualizarQtdProdt('qtdProdt3', totalPallet3ent);
                        atualizarQtdProdt('qtdProdt4', totalPallet4ent);
                        atualizarQtdProdt('qtdProdt5', totalPallet5ent);
                        atualizarQtdProdt('qtdProdt6', totalPallet6ent);
                    }

                    const totals = {
                        pallet1: calcularTotalPallet(detalhesPallets, 'pallet1'),
                        pallet2: calcularTotalPallet(detalhesPallets, 'pallet2'),
                        pallet3: calcularTotalPallet(detalhesPallets, 'pallet3'),
                        pallet4: calcularTotalPallet(detalhesPallets, 'pallet4'),
                        pallet5: calcularTotalPallet(detalhesPallets, 'pallet5'),
                        pallet6: calcularTotalPallet(detalhesPallets, 'pallet6'),
                    };

                    const palsum = Object.values(totals).reduce((acc, val) => acc + val, 0);
                    document.getElementById('inpTotalPalletValue').textContent = palsum.toString();

                    for (let i = 1; i <= 6; i++) {
                        atualizarQtdProdt(`qtdProdt${i}`, totals[`pallet${i}`]);
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
