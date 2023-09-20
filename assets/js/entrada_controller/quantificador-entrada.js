function toggleQuantidadeEntrada(show) {
    const alertQuantInput = document.getElementById("alertQuantInput");
    if (show) {
        fecharAlertaConfirmEntrada();
        alertQuantInput.style.display = "flex";
    } else {
        alertQuantInput.style.display = "none";
    }
}
