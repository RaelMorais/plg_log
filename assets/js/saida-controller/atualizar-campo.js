async function mostrarAlertaConfirmSaida() {
    fecharAlertaSaida();
    
    var codigo = document.getElementById("inputCodigoSaida").value;

    if (codigo !== "") {
        try {
            const response = await fetch("/inc/consulta.php?valor=" + codigo);

            if (response.ok) {
                const detalhes = await response.json();
                if (Array.isArray(detalhes) && detalhes.length === 0) {
                    alert("Não foi possível encontrar esse produto cadastrado.");
                    window.location.href = 'src/transition/traffic.php';
                } else {
                    atualizarCamposSaida(detalhes);
                    document.getElementById("alertConfirmSaida").style.display = "flex";
                }
            } else {
                throw new Error("Erro na requisição: " + response.status);
            }
        } catch (error) {
            console.error(error);
        }
    } else {
        alert("Nenhum texto foi inserido.");
        mostrarAlertaSaida();
    }
}


function atualizarCamposSaida(detalhes) {
    document.getElementById("codigoValueSaida").textContent = detalhes.codigo;
    document.getElementById("codigo-hidden").value = detalhes.codigo;
    document.getElementById("nomeValueSaida").textContent = detalhes.nome;
    document.getElementById("modeloValueSaida").textContent = detalhes.modelo;
    document.getElementById("descricaoValueSaida").textContent = detalhes.descricao;
    document.getElementById("custoValueSaida").textContent = detalhes.custo;
    document.getElementById("lucroValueSaida").textContent = detalhes.lucro;
    document.getElementById("volumeValueSaida").textContent = detalhes.volume;
    document.getElementById("precoValueSaida").textContent = detalhes.preco;
}

function fecharAlertaConfirmSaida() {
    document.getElementById("alertConfirmSaida").style.display = "none";
}