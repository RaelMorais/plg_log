function maxInputValue(editavelElement) {
    const inputValueEntrada = parseInt(document.getElementById('inputValueEntrada').value);
    const inputValueRetirada = parseInt(document.getElementById('inputValueRetirada').value);
    const movi = parseInt(document.getElementById('movimentacao-hidden').value);
    const palsum = getPalletsSum();

    const valorAtual = parseInt(editavelElement.textContent);

    if (movi === 1) {
        if (valorAtual < inputValueEntrada && palsum < inputValueEntrada) {
            editavelElement.textContent = valorAtual + 1;
        } else {
            alert("Valor máximo atingido!");
        }
    } else {
        if (valorAtual >= 0 && palsum < inputValueRetirada) {
            editavelElement.textContent = valorAtual + 1;
        } else {
            alert("Valor máximo atingido!");
        }
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