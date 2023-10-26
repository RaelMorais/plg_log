async function mostrarAlertaConfirmEntrada() {
    fecharAlertaEntrada();

    const codigo = document.getElementById("inputCodigoEntrada").value;

    if (codigo === "") {
        alert("Nenhum texto foi inserido.");
        mostrarAlertaEntrada();
        return;
    }

    try {
        const response = await fetch(`/inc/consulta.php?valor=${codigo}`);

        if (!response.ok) {
            throw new Error(`Erro na requisição: ${response.status}`); 
        }

        const detalhes = await response.json();
        if (!detalhes || Object.keys(detalhes).length === 0) {
            alert("Não foi possível encontrar esse produto cadastrado.");
            window.location.href = 'src/transition/traffic.php';
            return;
        }

        atualizarCampos(detalhes);
        document.getElementById("alertConfirmEntrada").style.display = "flex";
    } catch (error) {
        console.error(error);
    }
}

function atualizarCampos(detalhes) {
    const fieldsToUpdate = ["codigoValue", "nomeValue", "modeloValue", "descricaoValue", "custoValue", "lucroValue", "volumeValue", "precoValue"];

    for (const field of fieldsToUpdate) {
        document.getElementById(field).textContent = detalhes[field.replace("Value", "")];
    }

    document.getElementById("codigo-hidden").value = detalhes.codigo;
}

function fecharAlertaConfirmEntrada() {
    document.getElementById("alertConfirmEntrada").style.display = "none";
}