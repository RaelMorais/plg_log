function fecharQuantidadeEntrada(){
    document.getElementById("alertQuantInput").style.display = "none";
}

function mostrarQuantidadeEntrada(){
    fecharAlertaConfirmEntrada();

    document.getElementById("alertQuantInput").style.display = "flex";
}