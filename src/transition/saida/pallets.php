<div class="confirm " id="alertPallet" style="display: none;">
  <div class="alert">
    <div class="container">

      <div class="coluna esquerda">

        <!-- Campos à esquerda -->
        <h6>pallet 1</h6>
        <div class="campos">
          <label class="editavel" id="editavel1less">0</label>
          <label> / </label>
          <label class="pallet1" id="qtdProdt1">0</label>
          <div class ="d-grid gap-2 d-md-block ">
            <div class="botao-pequeno"><button onclick="palletPlus1()">+</button></div>
            <div class="botao-pequeno"><button onclick="palletLess1()">-</button></div>
          </div>
        </div>

        <h6>pallet 2</h6>
        <div class="campos">
          <label class="editavel" id="editavel2less">0</label>
          <label> / </label>
          <label class="pallet2" id="qtdProdt2">0</label>
          <div class ="d-grid gap-2 d-md-block">
            <div class="botao-pequeno"><button onclick="palletPlus2()">+</button></div>
            <div class="botao-pequeno"><button onclick="palletLess2()">-</button></div>
          </div>
        </div>

        <h6>pallet 3</h6>
        <div class="campos">
          <label class="editavel" id="editavel3less">0</label>
          <label> / </label>
          <label class="pallet3" id="qtdProdt3">0</label>
          <div class ="d-grid gap-2 d-md-block">
            <div class="botao-pequeno"><button onclick="palletPlus3()">+</button></div>
            <div class="botao-pequeno"><button onclick="palletLess3()">-</button></div>
          </div>
        </div>

      </div>

      <div class="coluna direita">
        <!-- Campos à direita -->
        <h6>pallet 4</h6>
        <div class="campos">
          <label class="editavel" id="editavel4less">0</label>
          <label> / </label>
          <label class="pallet4" id="qtdProdt4">0</label>
          <div class ="d-grid gap-2 d-md-block">
            <div class="botao-pequeno"><button onclick="palletPlus4()">+</button></div>
            <div class="botao-pequeno"><button onclick="palletLess4()">-</button></div>
          </div>
        </div>

        <h6>pallet 5</h6>
        <div class="campos">
          <label class="editavel" id="editavel5less">0</label>
          <label> / </label>
          <label class="pallet5" id="qtdProdt5">0</label>
          <div class ="d-grid gap-2 d-md-block">
            <div class="botao-pequeno"><button onclick="palletPlus5()">+</button></div>
            <div class="botao-pequeno"><button onclick="palletLess5()">-</button></div>
          </div>
        </div>

        <h6>pallet </h6>
        <div class="campos">
          <label class="editavel" id="editavel6less">0</label>
          <label> / </label>
          <label class="pallet6" id="qtdProdt6">0</label>
          <div class ="d-grid gap-2 d-md-block">
            <div class="botao-pequeno"><button onclick="palletPlus6()">+</button></div>
            <div class="botao-pequeno"><button onclick="palletLess6()">-</button></div>
          </div>
        </div>
      </div>
      <div class ="campos_botoes">
        <label id="inpTotalPalletValue" disable>0</label>
        <div class="text-center d-flex justify-content-center align-items-center">
          <button class="btn btn-primary" type="button" onclick="MovimentacaoProdutos()">Cancelar</button>
          <button class="btn btn-primary" type="button" id="enviarButton">enviar</button>
        </div>
      </div>
    </div>
  </div>
</div>