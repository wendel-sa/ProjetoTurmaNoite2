<?php
include '../configuracao/conexao.php';
include '../componentes/header.php';

//selecionar todos os produtos
$todosProdutos = "SELECT * FROM produtos";
//executar  o comando
$Produtos = $db->query($todosProdutos);
?>
<section class="py-5">

  <main class="container text-white">
    <h1 class="text-center">Categorias</h1>

    <div class="row py-3">
      <div class="col-3">
        <div class="p-4 rounded-4 cat-1">
          <div class="card-body">
            <h5 class="card-title">Categoria 1</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-3">
        <div class="p-4 rounded-4 cat-2">
          <div class="card-body">
            <h5 class="card-title">Categoria 2</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-3">
        <div class="p-4 rounded-4 cat-3">
          <div class="card-body">
            <h5 class="card-title">Categoria 3 <i class="bi bi-arrow-right"></i></h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-3">
        <div class="p-4 rounded-4 cat-4">
          <div class="card-body">
            <h5 class="card-title">Categoria 4</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

    </div>


  </main>


  <div class="container efeito-vidro">
    <div class="py-3">
      <h3>
        Todos os Produtos
      </h3>
    </div>

    <div>
      <a href="cadastro.php" class="btn btn-blue">Cadastrar Produto</a>
    </div>

    <div class="table-responsive px-3">
      <table class="table text-white">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($produto = $Produtos->fetchArray()) {
          ?>
            <tr>
              <td><?php echo $produto['nome'] ?></td>
              <td><?php echo $produto['tipo'] ?></td>
              <td><?php echo $produto['preco'] ?></td>
              <td>
                <a href="item.php?u_id=<?php echo $produto['id']; ?>" class="btn btn-success">Ver Detalhes</a>

                <a href="./editarproduto.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning">Editar</a>

                <a href="delete.php?u_id=<?php echo $produto['id']; ?>" class="btn btn-danger">Deletar</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>

      </table>
    </div>


  </div>
</section>

<?php
include '../componentes/footer.php';
?>