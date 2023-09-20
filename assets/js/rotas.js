const destination = "";

const navigation = {
    cadastro: () => {
        window.location.href = "/src/cadastro/registro.php";
    },
    movimentacaoProdutos: () => {
        window.location.href = "/src/transition/traffic.php";
    },
    cadCliente: () => {
        window.location.href = "/src/cadastro/cliente.php";
    },
    cadProduto: () => {
        window.location.href = "/src/cadastro/produto.php";
    },
    home: () => {
        window.location.href = "/src/home.php";
    },
    gerenciamentoDados: () => {
        window.location.href = "/src/exibicao.php";
    },
};

if (navigation.hasOwnProperty(destination)) {
    window.location.href = navigation[destination];
}
