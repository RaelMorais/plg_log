function toggleQuantidadeEntrada(show) {
    const alertQuantInput = document.getElementById("alertQuantInput");
    if (show) {
        toggleQuantidadeEntrada(false);
        alertQuantInput.style.display = "flex";
    } else {
        alertQuantInput.style.display = "none";
    }
}