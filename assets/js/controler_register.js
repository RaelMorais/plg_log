const inpCnpj = document.querySelector("#inputCNPJ");
const inpCpf = document.querySelector("#inputCPF");
const radioFisico = document.getElementById("radioFisico");
const radioJuridico = document.getElementById("radioJuridico");

function habilitacacao() {
    inpCnpj.disabled = radioFisico.checked;
    inpCpf.disabled = radioJuridico.checked;

    if (inpCnpj.disabled) {
        inpCnpj.value = ''; // Define o valor do campo CNPJ como vazio quando a opção CPF é selecionada.
    }

    if (inpCpf.disabled) {
        inpCpf.value = ''; // Define o valor do campo CPF como vazio quando a opção CNPJ é selecionada.
    }
}