<?php
include '../componentes/header.php';
?>

<div class="row px-5">

    <h1 class="text-center py-3">Cadastre um Produto</h1>

    <div class="col-8">

        <form action="produtos/insert.php" method="post">
            <div>
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>

            <div>
                <label class="form-label">Tipo</label>
                <input type="text" name="tipo" class="form-control">
            </div>

            <div>
                <label class="form-label">Descrição</label>
                <input type="text" name="descricao" class="form-control">
            </div>

            <div>
                <label class="form-label">Valor</label>
                <input type="number" name="valor" class="form-control">
            </div>

            <div>
                <label class="form-label">Quantidade</label>
                <input type="number" name="qyd" class="form-control">
            </div>

            <div>
                <label class="form-label">Imagem</label>
                <input type="text" name="imagem" class="form-control">
            </div>
            <div class="py-3">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-header">
                Novidade
            </div>

            <div class="card-body">
                Agora você Pode cadastrar
                facilmente um produto
            </div>

        </div>
    </div>



</div>


<?php
include '../componentes/footer.php';
?>