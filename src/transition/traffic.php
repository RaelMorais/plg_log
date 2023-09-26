<?php include_once("../header.php"); ?>

<article>
    <div class="btns-sect text-center d-flex justify-content-center align-items-center vh-100">
        <div class="d-grid gap-2 small">
            <button class="btn btn-primary" onclick="mostrarAlertaEntrada()">Entrada</button>
            <button class="btn btn-primary" type="button" onclick="mostrarAlertaSaida()">Saida</button>
            <input type="hidden" value="0" id="movimentacao-hidden">
        </div>
    </div>
</article>

<?php 
    include("entrada/buscaInput.php");
    include("saida/buscaExit.php");
    include("entrada/sampling_box.php");
    include("saida/sampling_box_saida.php");
    include("entrada/quantificadorEnt.php");
    include("saida/quantificadorSaida.php");
    include("entrada/pallets.php");
?>

<!-- Entrada -->
<script src="/assets/js/entrada_controller/alert-entrada.js"></script>
<script src="/assets/js/entrada_controller/atualizar-campo.js"></script>
<script src="/assets/js/entrada_controller/pallets-atualizar.js"></script>
<script src="/assets/js/entrada_controller/quantificador-entrada.js"></script>
<script src="/assets/js/entrada_controller/verificador.js"></script>

<!-- Saida -->
<script src="/assets/js/saida-controller/alert-saida.js"></script>
<script src="/assets/js/saida-controller/atualizar-campo.js"></script>
<script src="/assets/js/saida-controller/pallets-atualizar.js"></script>
<script src="/assets/js/saida-controller/quantificador-saida.js"></script>
<script src="/assets/js/saida-controller/verificador.js"></script>

<script src="/assets/js/max-and-min-pallet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous">
</script>
<script src="/assets/js/controllerPalletInsert.js"></script>
</body>
</html>
