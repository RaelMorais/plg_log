<!-- 2° Etapa -->

<div class="confirm" id="alertConfirmEntrada" style="display: none;">
    <div class="alert">

        <div class="form-floating mb-3">
            <p id="codigolabel">Código:</p>
            <label class="form-label" id="codigoValue">-</label>
        </div>

        <div class="form-floating mb-3">
            <p id="nomelabel">Nome:</p>
            <label class="form-label" id="nomeValue">-</label>
        </div>

        <div class="form-floating mb-3">
            <p id="modelolabel">Modelo:</p>
            <label class="form-label" id="modeloValue">-</label>
        </div>

        <div class="form-floating mb-3">
            <p id="descricaolabel">Descrição:</p>
            <label class="form-label" id="descricaoValue">-</label>
        </div>

        <div class="form-floating mb-3">
            <p id="custolabel">Custo(R$):</p>
            <label class="form-label" id="custoValue">-</label>
        </div>

        <div class="form-floating mb-3">
            <p id="lucrolabel">Lucro(%):</p>
            <label class="form-label" id="lucroValue">-</label>
        </div>

        <div class="form-floating mb-3">
            <p id="volumelabel">Volume(cm³):</p>
            <label class="form-label" id="volumeValue">-</label>
        </div>

        <div class="form-floating mb-3">
            <p id="precolabel">Preço:</p>
            <label class="form-label" id="precoValue">-</label>
        </div>

        <div>
            <button class="btn" onclick="fechartoggleQuantidadeEntrada()">Cancelar</button>
            <button class="btn" type="submit" onclick="toggleQuantidadeEntrada(true)">Confirmar</button>
        </div>

    </div>
</div>
