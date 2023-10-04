function palletAction(palletNumber, action) {
    const editavelElement = document.getElementById(`editavel${palletNumber}`);

    if (editavelElement) {
        if (action === 'plus') {
            maxInputValue(editavelElement);
        } else if (action === 'less') {
            minValueLess(editavelElement);
        }
    }
}

function palletPlus(palletNumber) {
    palletAction(palletNumber, 'plus');
}

function palletLess(palletNumber) {
    palletAction(palletNumber, 'less');
}