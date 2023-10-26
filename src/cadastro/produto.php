<?php include_once("../header.php"); ?>

<div class="page container-sm">
    <form method="POST" class="formCadastro" action="/inc/cadProduto.php">
        <h1>Cadastro</h1>
        <p>Digite os seus dados de acesso no campo abaixo.</p>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputCodigo" placeholder="Código" name="codigo" maxlength="12" required>
            <label for="inputCodigo">Código:</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingName" placeholder="Nome" name="nome" maxlength="255" required>
            <label for="floatingName">Nome:</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputmodelo" placeholder="Modelo" name="modelo" required>
            <label for="inputmodelo">Modelo:</label>
        </div>

        <div class="form-floating">
            <textarea class="form-control" placeholder="Descrição" id="floatingTextarea" name="description" maxlength="255"></textarea>
            <label for="floatingTextarea">Descrição</label><br>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingCusto" placeholder="Custo" name="custo" required>
            <label for="floatingCusto">Custo:</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingLucro" placeholder="Porcentagem de Lucro" name="lucro" max="120" required>
            <label for="floatingLucro">Lucro(%):</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputvolume" placeholder="Volume" name="volume" required>
            <label for="inputvolume">Volume(cm³):</label>
        </div>

        <div class="form-floating mb-3">
            <p id="pprecolabel">Preço:</p>
            <span class="form-label" name="preco" id="pprecoValue">0</span>
            <input type="hidden" id="pprecoHidden" name="preco" value="0">
        </div>
        <hr>

        <div class="d-grid gap-2 d-md-block text-center d-flex justify-content-center align-items-center">
            <input type="submit" value="Cadastrar" class="btn btn-danger btn-lg" id="cadastro" />
            <input type="button" value="Calcular" onclick="calcPrice()" class="btn btn-danger btn-lg" id="calcular" />
        </div>
    </form>
</div>

<script src="/assets/js/calc_prace.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
