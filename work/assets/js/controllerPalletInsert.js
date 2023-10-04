var enviarButton = document.getElementById("enviarButton");

enviarButton?.addEventListener("click", async function() {
    try {
        // Capturar os valores das labels editáveis
        var movimentacao = document.getElementById("movimentacao-hidden").value;
        var codigo = document.getElementById("codigo-hidden").value;
        var editaveis = [];

        for (var i = 1; i <= 6; i++) {
            editaveis.push(document.getElementById(`editavel${i}`).textContent);
        }

        console.log(movimentacao);

        // Construir o objeto FormData para enviar os valores
        var formData = new FormData();
        formData.append('movimentacao', movimentacao);
        formData.append('codigo', codigo);

        for (var i = 1; i <= 6; i++) {
            formData.append(`editavel${i}`, editaveis[i - 1]);
        }

        const response = await fetch('/inc/salvarPallets.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            const resultado = await response.text();
            console.log(resultado);
            window.location.href = '/src/home.php';
        } else {
            throw new Error("Erro na requisição: " + response.status);
        }
    } catch (error) {
        console.error(error);
    }
});