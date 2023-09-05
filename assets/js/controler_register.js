const inpCnpj = document.querySelector("#inputCPF");
const inpCpf = document.querySelector("#inputCNPJ");

function habilitacacao(){
    if (document.getElementById("radioFisico").checked == true) {
        inpCpf.disabled = true;
        inpCnpj.disabled = false
    } else if (document.getElementById("radioJuridico").checked == true) {
        inpCnpj.disabled = true;
        inpCpf.disabled = false;
    }
}