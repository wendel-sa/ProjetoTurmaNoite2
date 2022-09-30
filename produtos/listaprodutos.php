<?php
include '../configuracao/conexao.php';
include '../componentes/header.php';

//selecionar todos os produtos
$todosProdutos = "SELECT * FROM produtos";
//executar  o comando
$Produtos = $db->query($todosProdutos);
?>
<section class="py-5">


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

                <a href="#" class="btn btn-warning">Editar</a>

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