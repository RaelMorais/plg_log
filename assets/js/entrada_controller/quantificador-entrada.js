function toggleQuantidadeEntrada(show) {
    const alertQuantInput = document.getElementById("alertQuantInput");
    if (show) {
        toggleQuantidadeEntrada(false);
        alertQuantInput.style.display = "flex";
    } else {
        alertQuantInput.style.display = "none";
        window.location.href = "/src/transition/traffic.php";
    }
}

function fecharQuantidadeEntrada(){
    document.getElementById("alertQuantInput").style.display = "none";
}