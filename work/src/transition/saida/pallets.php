<!-- 4° Etapa -->
<div class="confirm" id="alertPallet" style="display: none;">
    <div class="alert">
        <div class="container">
            <div class="coluna esquerda">
                <!-- Campos à esquerda -->
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <h6>pallet <?php echo $i; ?></h6>
                    <div class="campos">
                        <label class="editavel" id="editavel<?php echo $i; ?>">0</label>
                        <label> / </label>
                        <label class="pallet<?php echo $i; ?>" id="qtdProdt<?php echo $i; ?>">0</label>
                        <div class="d-grid gap-2 d-md-block">
                            <div class="botao-pequeno"><button onclick="palletAction(<?php echo $i; ?>, 'plus')">+</button></div>
                            <div class="botao-pequeno"><button onclick="palletAction(<?php echo $i; ?>, 'less')">-</button></div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="coluna direita">
                <!-- Campos à direita -->
                <?php for ($i = 4; $i <= 6; $i++): ?>
                    <h6>pallet <?php echo $i; ?></h6>
                    <div class="campos">
                        <label class="editavel" id="editavel<?php echo $i; ?>">0</label>
                        <label> / </label>
                        <label class="pallet<?php echo $i; ?>" id="qtdProdt<?php echo $i; ?>">0</label>
                        <div class="d-grid gap-2 d-md-block">
                            <div class="botao-pequeno"><button onclick="palletAction(<?php echo $i; ?>, 'plus')">+</button></div>
                            <div class="botao-pequeno"><button onclick="palletAction(<?php echo $i; ?>, 'less')">-</button></div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="campos_botoes">
                <label id="inpTotalPalletValue" disable>0</label>
                <div class="text-center d-flex justify-content-center align-items-center">
                    <button class="btn btn-primary" type="button" onclick="MovimentacaoProdutos()">Cancelar</button>
                    <button class="btn btn-primary" type="button" id="enviarButton">enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>
