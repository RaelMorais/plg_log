function toggleQuantidadeEntrada(show) {
    const alertQuantInput = document.getElementById("alertQuantInput");
    if (show) {
        toggleQuantidadeEntrada(true);
        alertQuantInput.style.display = "flex";
    } else {
        alertQuantInput.style.display = "none";
    }
}

function fecharQuantidadeEntrada(){
    document.getElementById("alertQuantInput").style.display = "none";
}

function fechartoggleQuantidadeEntrada(){
    window.location.href = "/src/transition/traffic.php";
}