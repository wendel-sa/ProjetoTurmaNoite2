<?php
include '../componentes/header.php';
?>

<section class="py-5">

    <div class="container efeito-vidro text-white">

        <h1 class="text-center py-3">Cadastre um Produto</h1>
        <div class="row">

            <div class="px-5 col-8">

                <form action="insert.php" method="post">
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
                        <input type="number" name="valor" class="form-control" step="0.01">
                    </div>

                    <div>
                        <label class="form-label">Quantidade</label>
                        <input type="number" name="qtd" class="form-control">
                    </div>

                    <div>
                        <label class="form-label">Imagem</label>
                        <input id="imagemL" type="text" name="imagem" class="form-control">
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <h3>Imagem Preview</h3>

                <img id="imagemP" src="" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<?php
include '../componentes/footer.php';
?>