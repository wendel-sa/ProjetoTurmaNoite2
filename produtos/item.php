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

?>
  <section class="py-5">
    <div class="container efeito-vidro">
      <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
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
    </div>


  <?php
}
include '../componentes/footer.php';
  ?>