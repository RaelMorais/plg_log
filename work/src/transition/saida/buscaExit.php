<div class="overlay" id="alertOverlaySaida" style="display: none;">
    <div class="alert">
        <label for="inputCodigoSaida">Digite o código ou nome do produto:</label>
        <input type="text" id="inputCodigoSaida" name="valor" maxlength="12" mixlength="12">

        <INPUT TYPE="hidden" NAME="codigo-hidden" VALUE="0" id="codigo-hidden">

        <button class="btn" type="button" onclick="fecharAlertaSaida()">Cancelar</button>
        <button class="btn" type="submit" onclick="mostrarAlertaConfirmSaida()">Confirmar</button>
    </div>
</div>