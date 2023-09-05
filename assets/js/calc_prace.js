function calcPrice() {
    const custoInput = document.getElementById("floatingCusto");
    const plucroInput = document.getElementById("floatingLucro");
    const pprecoInput = document.getElementById("ppreco");

    const custo = parseFloat(custoInput.value);
    const plucro = parseFloat(plucroInput.value);

    if (!isNaN(custo) && !isNaN(plucro)) {
        const lucro = custo * (plucro / 100);
        const preco = custo + lucro;
        pprecoValue.textContent = preco.toFixed(2);
        pprecoHidden.value = preco.toFixed(2)
    }
}
