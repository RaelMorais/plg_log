function verficador_saida(){
    var inputValueRetirada = document.getElementById("inputValueRetirada");
    
    if (!inputValueRetirada.value) {
        inputValueRetirada.classList.add("input-error");
        return;
    }else{
        showpallets()
    }
    inputValueRetirada.classList.remove("input-error");
}