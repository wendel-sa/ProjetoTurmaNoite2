<?php
//se a sessão não existir, iniciar a sessão
if (!isset($_SESSION)) session_start();
include '../configuracao/conexao.php';

$id = $_GET['u_id'];

include '../componentes/header.php';

//fazer um select na tabela produtos
$sql = "SELECT * FROM produtos WHERE Id = $id";
//executar o select em pdo
$resultado = $db->query($sql);

while ($item = $resultado->fetchArray()) {
  $id = $item['id'];

?>
  <section class="p-5">
    <div class="text-white">
      <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
          <h1 class="display-4 fw-bold lh-1">
            <?php
            echo $item['nome'];
            ?>
          </h1>
          <p class="lead">
            <?php
            echo $item['descricao'];
            ?>
          </p>

          <p class="lead">
            <?php
            echo $id;
            ?>
          </p>

          <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
            <?php
            //se o usuario estiver logado, mostrar o botão de comprar
            if (isset($_SESSION['usuario'])) {
              $idUser = "SELECT id FROM usuarios WHERE email = '" . $_SESSION['usuario'] . "'";
              $resultadoId = $db->query($idUser);
              while ($id = $resultadoId->fetchArray()) {
                $idUsuario = $id['id'];
              }
            ?>
              <form action="../produtos/compra.php" method="POST">
                <input type="hidden" name="valor" value="<?php echo $item['preco']; ?>">
                <input type="hidden" name="idProduto" value="<?php echo $item['id']; ?>">
                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                <div class="form-group py-3">
                  <label for="quantidade">Quantidade</label>
                  <input type="number" class="form-control" name="quantidade" id="quantidade" value="1">
                </div>
                <button class="btn btn-primary btn-lg px-4 me-md-2" type="submit">Comprar</button>
              </form>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">

          <img class="rounded-lg-3 img-fluid" src="
          <?php
          echo $item['imagem'];
          ?>
            " alt="">
        </div>
      </div>


      <div class="px-4 py-5" id="custom-cards">
        <div class="row py-5">
          <div class="col-4">

            <h1>Comentários</h1>

            <div class="card bg-2 text-white shadow-sm px-3">
              <div class="card-body">
                <label for="comentario" class="form-label">Comentar como
                  <?php
                  if (isset($_SESSION['usuario'])) {
                    echo $_SESSION['usuario'];
                  ?>
                </label>

                <form action="../comentarios/addComentario.php" method="POST">
                  <input type="hidden" name="id_produto" value="<?php echo $item['id']; ?>">
                  <input type="hidden" name="id_usuario" value="<?php echo $idUsuario; ?>">
                  <textarea class="form-control" name="comentario" id="comentario" rows="3" placeholder="Comente Aqui"></textarea>
                  <div class="form-group">
                    <label for="nota">Nota</label>
                    <select class="form-control" name="nota" id="nota">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  </br>
                  <button type="submit" class="btn btn-primary">Comentar</button>
                </form>
              <?php
                  } else {
                    echo "Faça login para comentar";
                  }
              ?>



              </div>

              <h6 class="border-bottom pb-2 mb-0">
                Comentários: 3
              </h6>
              <div class="d-flex text-light pt-3">
                <div class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <i class="bi bi-person"></i>
                </div>

                <p class="pb-3 mb-0 small lh-sm border-bottom">
                  <strong class="d-block text-gray-dark">Ana Maria</strong>
                  <i class="bi bi-chat-left-dots"></i> 3 dias atrás
                  <i class="bi bi-star-fill"></i> 5
                  </br>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae impedit reprehenderit commodi. Aut repellendus ratione, ipsum maxime distinctio at iusto sit blanditiis labore laboriosam excepturi autem consequatur reprehenderit, voluptate doloribus!
                </p>
              </div>
            </div>

          </div>
          <div class="col-8">
            <h1>
              Sugestões
            </h1>
            <div class="row row-cols-1 row-cols-lg-2 align-items-stretch g-4 py-5">
              <?php
              $sql = "SELECT * FROM produtos WHERE tipo = '" . $item['tipo'] . "' AND id != '" . $item['id'] . "'";
              $resultado2 = $db->query($sql);
              while ($item = $resultado2->fetchArray()) {
              ?>
                <div class="col">
                  <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo $item['imagem']; ?>'); background-size: cover;  background-position: center;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 bg-gradiente">
                      <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                        <?php
                        echo $item['nome'];
                        ?>
                      </h3>
                      <ul class="d-flex list-unstyled mt-auto">
                        <li class="d-flex align-items-center me-3">
                          R$
                          <small>
                            <?php
                            echo $item['preco'];
                            ?>
                          </small>
                        </li>
                        <li class="d-flex align-items-center">
                          <a href="../produtos/item.php?u_id=<?php echo $item['id']; ?>
                          " class="btn btn-outline-light">
                            Ver mais
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

              <?php
              }
              ?>
            </div>
          </div>

        </div>
      </div>
  </section>


<?php
}
include '../componentes/footer.php';
?>