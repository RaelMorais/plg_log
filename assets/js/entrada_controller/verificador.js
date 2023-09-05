function verficador(){
    var inputValueEntrada = document.getElementById("inputValueEntrada");
    
    if (!inputValueEntrada.value) {
        inputValueEntrada.classList.add("input-error");
        return;
    }else{
        showpallets()
    }
    inputValueEntrada.classList.remove("input-error");
}