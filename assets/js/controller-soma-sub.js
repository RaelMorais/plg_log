function maxInputValue(editavelElement) {

    var pal1 = parseInt(document.getElementById('editavel1').textContent);
    var pal2 = parseInt(document.getElementById('editavel2').textContent);
    var pal3 = parseInt(document.getElementById('editavel3').textContent);
    var pal4 = parseInt(document.getElementById('editavel4').textContent);
    var pal5 = parseInt(document.getElementById('editavel5').textContent);
    var pal6 = parseInt(document.getElementById('editavel6').textContent);

    const selecao = document.getElementById('movimentacao-hidden').value;

    var palsum = pal1 + pal2 + pal3 + pal4 + pal5 + pal6;

    const inputValue = document.getElementById('inputValueEntrada').value;
    const inputValueRetirada = document.getElementById('inputValueRetirada').value;
    var valorAtual = parseInt(editavelElement.textContent);

    if (selecao == 1) {
        inputValueToUse = inputValue;
    } 
    if (selecao == 2) {
        inputValueToUse = inputValueRetirada;
    }

    if (valorAtual < inputValueToUse && palsum < inputValueToUse) {
        return editavelElement.textContent = valorAtual + 1;
    } else {
        alert("Valor máximo atingido!");
    }
}


function minValueLess(editavelElement){
    var valorAtual = parseInt(editavelElement.textContent);
    
    if (valorAtual > 0) {
      return editavelElement.textContent = valorAtual - 1;
    }
}  