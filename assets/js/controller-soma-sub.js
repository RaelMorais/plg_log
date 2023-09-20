function maxInputValue(editavelElement) {
    const inputValueEntrada = document.getElementById('inputValueEntrada').value;
    const inputValueRetirada = document.getElementById('inputValueRetirada').value;
    const selecao = document.getElementById('movimentacao-hidden').value;
    const palsum = getPalletsSum();

    const inputValueToUse = selecao === '1' ? inputValueEntrada : inputValueRetirada;
    const valorAtual = parseInt(editavelElement.textContent);

    if (valorAtual < inputValueToUse && palsum < inputValueToUse) {
        editavelElement.textContent = valorAtual + 1;
    } else {
        alert("Valor máximo atingido!");
    }
}

function minValueLess(editavelElement) {
    const valorAtual = parseInt(editavelElement.textContent);

    if (valorAtual > 0) {
        editavelElement.textContent = valorAtual - 1;
    }
}

function getPalletsSum() {
    let palsum = 0;

    for (let i = 1; i <= 6; i++) {
        const pal = parseInt(document.getElementById(`editavel${i}`).textContent);
        palsum += isNaN(pal) ? 0 : pal;
    }

    return palsum;
}
