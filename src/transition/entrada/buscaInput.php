<div class="overlay" id="alertOverlayEntrada" style="display: none;">
    <div class="alert">
        <label for="inputCodigoEntrada">Digite o código ou nome do produto:</label>
        <input type="text" id="inputCodigoEntrada" name="valor" maxlength="12" minlength="12">

        <input type="hidden" name="codigo-hidden" value="0" id="codigo-hidden">

        <div>
            <button class="btn" type="button" onclick="fecharAlertaEntrada()">Cancelar</button>
            <button class="btn" type="submit" onclick="mostrarAlertaConfirmEntrada()">Confirmar</button>
        </div>
    </div>
</div>


<!-- 1° Etapa-->