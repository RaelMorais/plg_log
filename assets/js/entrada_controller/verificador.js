function verificador() {
    const inputValueEntrada = document.getElementById("inputValueEntrada");

    if (!inputValueEntrada.value) {
        inputValueEntrada.classList.add("input-error");
        return;
    }

    showPallets();
    inputValueEntrada.classList.remove("input-error");
}
