function verficador_saida(){
    var inputValueRetirada = document.getElementById("inputValueRetirada");
    
    if (!inputValueRetirada.value) {
        inputValueRetirada.classList.add("input-error");
        return;
    }else{
        showPallets()
    }
    inputValueRetirada.classList.remove("input-error");
}