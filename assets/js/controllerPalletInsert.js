var bt1 = document.getElementById("enviarButton");

bt1?.addEventListener("click", async function() {

    console.log("passou!");

    // Capturar os valores das labels editáveis
    var movimentacao = document.getElementById("movimentacao-hidden").value;
    var codigo = document.getElementById("codigo-hidden").value;
    var editavel1 = document.getElementById("editavel1").textContent;
    var editavel2 = document.getElementById("editavel2").textContent;
    var editavel3 = document.getElementById("editavel3").textContent;
    var editavel4 = document.getElementById("editavel4").textContent;
    var editavel5 = document.getElementById("editavel5").textContent;
    var editavel6 = document.getElementById("editavel6").textContent;

    console.log(codigo);

    // Construir o objeto FormData para enviar os valores
    var formData = new FormData();
    formData.append('movimentacao', movimentacao);
    formData.append('codigo', codigo);
    formData.append('editavel1', editavel1);
    formData.append('editavel2', editavel2);
    formData.append('editavel3', editavel3);
    formData.append('editavel4', editavel4);
    formData.append('editavel5', editavel5);
    formData.append('editavel6', editavel6);
    console.log(formData);
    try {
        const response = await fetch('/inc/salvarPallets.php', {
            method: 'POST',
            body: formData
        });


        if (response.ok) {
            const resultado = await response.text();
            window.location.href='/src/home.php';
        } else {
            throw new Error("Erro na requisição: " + response.status);
        }
    } catch (error) {
        console.error(error);
    }
});
