async function mostrarAlertaConfirmEntrada() {
    fecharAlertaEntrada();
    
    var codigo = document.getElementById("inputCodigoEntrada").value;


    if (codigo !== "") {
        try {
            const response = await fetch("/inc/consulta.php?valor=" + codigo);

            if (response.ok) {
                const detalhes = await response.json();
                if (Array.isArray(detalhes) && detalhes.length === 0) {
                    alert("Não foi possível encontrar esse produto cadastrado.");
                    window.location.href = 'src/transition/traffic.php';
                } else {
                    atualizarCampos(detalhes);
                    document.getElementById("alertConfirmEntrada").style.display = "flex";
                }
            } else {
                throw new Error("Erro na requisição: " + response.status);
            }
        } catch (error) {
            console.error(error);
        }
    } else {
        alert("Nenhum texto foi inserido.");
        mostrarAlertaEntrada();
    }
}


function atualizarCampos(detalhes) {
    document.getElementById("codigoValue").textContent = detalhes.codigo;
    document.getElementById("codigo-hidden").value = detalhes.codigo;
    document.getElementById("nomeValue").textContent = detalhes.nome;
    document.getElementById("modeloValue").textContent = detalhes.modelo;
    document.getElementById("descricaoValue").textContent = detalhes.descricao;
    document.getElementById("custoValue").textContent = detalhes.custo;
    document.getElementById("lucroValue").textContent = detalhes.lucro;
    document.getElementById("volumeValue").textContent = detalhes.volume;
    document.getElementById("precoValue").textContent = detalhes.preco;
}

function fecharAlertaConfirmEntrada() {
    document.getElementById("alertConfirmEntrada").style.display = "none";
}