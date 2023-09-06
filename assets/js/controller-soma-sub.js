/*function maxInputValue(editavelElement){

    var pal1 = parseInt(document.getElementById('editavel1').textContent);
    var pal2 = parseInt(document.getElementById('editavel2').textContent);
    var pal3 = parseInt(document.getElementById('editavel3').textContent);
    var pal4 = parseInt(document.getElementById('editavel4').textContent);
    var pal5 = parseInt(document.getElementById('editavel5').textContent);
    var pal6 = parseInt(document.getElementById('editavel6').textContent);

    var palsum = pal1 + pal2 + pal3 + pal4 + pal5 + pal6;

    const inputValue = document.getElementById('inputValueEntrada').value;
    var valorAtual = parseInt(editavelElement.textContent);
    if(valorAtual < inputValue && palsum < inputValue){
        return editavelElement.textContent = valorAtual + 1;
    }else{
        alert("Valor maximo atingido!");
    }
}*/

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
        console.log(1);
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

// pallet 1 ==================================================
function palletPlus1() {
    var editavelElement = document.getElementById('editavel1');
    maxInputValue(editavelElement);
}
  

function palletLess1() {
    var editavelElement = document.getElementById('editavel1');
    minValueLess(editavelElement)
}

// pallet 2 ==================================================
function palletPlus2() {
    var editavelElement = document.getElementById('editavel2');
    maxInputValue(editavelElement);
}
  
function palletLess2() {
    var editavelElement = document.getElementById('editavel2');
    minValueLess(editavelElement)
}

// pallet 3 ==================================================
function palletPlus3() {
    var editavelElement = document.getElementById('editavel3');
    maxInputValue(editavelElement);
}
  
function palletLess3() {
    var editavelElement = document.getElementById('editavel3');
    minValueLess(editavelElement)
}

// pallet 4 ==================================================
function palletPlus4() {
    var editavelElement = document.getElementById('editavel4');
    maxInputValue(editavelElement);
}
  
function palletLess4() {
    var editavelElement = document.getElementById('editavel4');
    minValueLess(editavelElement)
}

// pallet 5 ==================================================
function palletPlus5() {
    var editavelElement = document.getElementById('editavel5');
    maxInputValue(editavelElement);
}
  
function palletLess5() {
    var editavelElement = document.getElementById('editavel5');
    minValueLess(editavelElement)
}

// pallet 6 ==================================================
function palletPlus6() {
    var editavelElement = document.getElementById('editavel6');
    maxInputValue(editavelElement);
}
  
function palletLess6() {
    var editavelElement = document.getElementById('editavel6');
    minValueLess(editavelElement)
}
  
  
  