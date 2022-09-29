<?php
include '../conexao.php';
include '../componentes/header.php';

//selecionar todos os produtos
$todosProdutos = "SELECT * FROM produtos";
//executar  o comando
$Produtos = $db->query($todosProdutos);
?>

<div>
  <div class="py-3">
    <h3>
        Todos os Produtos
    </h3>
  </div>

  <div class="table-responsive px-3">
        <table class="table table-striped">
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
                  <a href="item.php?u_id=<?php echo $produto['id']; ?>"
                    class="btn btn-success">Ver Detalhes</a>
                  
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

<?php
include '../componentes/footer.php';
?>