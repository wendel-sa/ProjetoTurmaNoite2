<?php

//se a sessão não existir, iniciar a sessão
if (!isset($_SESSION)) session_start();

include '../configuracao/conexao.php';

$id = $_GET['u_id'];

include '../componentes/header.php';

//fazer um select na tabela produtos
$sql = "SELECT * FROM produtos WHERE Id= $id";

//executar o select em pdo

$resultado = $db->query($sql);
while ($item = $resultado->fetchArray()) {

    //criar a variavel de query com um select * da tabela usuarios
    $DadosUser = "SELECT * FROM usuarios WHERE 
email = '" . $_SESSION['usuario'] . "'";

    //executar a query em pdo
    $consulta = $db->query($DadosUser);

    //salva os dados do usuarios em variaveis
    while ($row_user = $consulta->fetchArray()) {

        $nome = $row_user['nome'];
        $email = $row_user['email'];
        $data_nascimento = $row_user['data_nascimento'];
        $foto = $row_user['foto'];
    }

?>
    <!-- Product section-->
    <section>
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-top">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 shadow rounded" src="<?php echo $item['imagem'] ?>" alt="<?php echo $item['nome']; ?>" /></div>
                <div class="col-md-6">
                    <h1 class="display-4 fw-bolder"><?php echo $item['nome']; ?></h1>
                    <div class="fs-5 mb-2">
                        <h2>R$ <?php echo number_format($item['preco'], 2, ",", "."); ?></h2>
                    </div>
                    <p class="lead"> <?php echo $item['descricao']; ?></p>

                    <div class="d-flex">

                        <?php
                        //se o usuario esta logado
                        //mostrar o botao de comprar
                        if (isset($_SESSION['usuario'])) {
                            $idUser = "SELECT id FROM usuarios WHERE email = '" . $_SESSION['usuario'] . "'";
                            $resultadoId = $db->query($idUser);

                            while ($id = $resultadoId->fetchArray()) {
                                $idUsuario = $id['id'];
                            }
                        ?>

                            <form action="../produtos/compra.php" method="POST">
                                <div class="row d-flex justify-content-between align-items-center me-2">
                                    <div class="col">
                                        <input type="hidden" name="valor" value="<?php echo $item['preco']; ?>">
                                        <input type="hidden" name="idProduto" value="<?php echo $item['id']; ?>">
                                        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                                        <div class="form-group d-flex flex-column">
                                            <label for="quantidade"><b>Quantidade</b></label>
                                            <input type="number" class="form-control py-2" name="quantidade" id="quantidade" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 row-cols-1 py-1">
                                        <button class="btn btn-primary custom-btn" type="submit"><i class="fas fa-shopping-cart"></i>Comprar</button>
                                    </div>
                            </form>
                        <?php } ?>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </section>


    <section>
        <main class="container">
            <!-- Produtos Relacionados-->
            <section class="mt-5 mb-5 py-2 bg-light rounded">
                <div class="container px-4 px-lg-5 mt-1">
                    <h2 class="fw-bolder mb-4">Produtos Relacionados</h2>
                    <div class="row row-cols-1 row-cols-md-3 g-4">

                        <!--Card-->
                        <?php
                        $todosProdutos = "SELECT * FROM produtos WHERE tipo = '" . $item['tipo'] . "' AND id != '" . $item['id'] . "' LIMIT 3";
                        $Produtos = $db->query($todosProdutos);

                        while ($produto = $Produtos->fetchArray()) {
                        ?>
                            <div class="col">
                                <div class="card h-100 shadow custom-card">
                                    <img src="<?php echo $produto['imagem'] ?>" alt="Medicamento" class="card-img-top w-100 custom-bg">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $produto['nome'] ?></h4>
                                    </div>
                                    <div class="card-footer custom-footer d-flex align-items-center justify-content-around mb-3">
                                        <div class="float-start">
                                            <h4 class="custom-highlight mb-0">R$<?php echo number_format($produto['preco'], 2, ",", ".") ?></h4>
                                        </div>
                                        <div class="row d-flex justify-content-around me-3">
                                            <div class="col-sm-4">
                                                <a href="../produtos/item.php?u_id=<?php echo $produto['id'] ?>"><button class="btn btn-primary rounded-3 custom-btn px-2">Comprar</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </main>

        </br>

        <!-- Seção dos comentarios-->
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="headings d-flex justify-content-between align-items-center">
                        <h2 class="fw-bolder">Comentários</h2>
                    </div>

                    <div class="card py-3 px-5">
                        <form action="../comentarios/addComentario.php" method="POST">
                            <?php
                            if (isset($_SESSION['usuario'])) {
                            ?>
                                <div class="d-flex justify-content-between flex-row align-items-center">

                                    <input type="hidden" name="id_produto" value="<?php echo $item['id'] ?>">
                                    <input type="hidden" name="id_usuario" value="<?php echo $idUsuario ?>">
                                    <img src="<?php echo $foto ?>" width="60" class="user-img rounded-circle me-3">
                                    <span>
                                        <h4 class="font-weight-bold text-danger mb-n3">Você</h4>
                                        </br>
                                        <textarea class="w-200 h6 pe-5 form-control" id="comentario" rows="2" name="comentario" placeholder="Deixe sua avaliação..."></textarea>
                                    </span>
                                </div>
                    </div>

                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4">
                            <div class="form-group form-group d-flex flex-row align-items-baseline">
                                <label for="nota" class="me-1">
                                    <h4>Nota</h4>
                                </label>
                                <select class="form-control" name="nota" id="nota">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <div class="icons align-items-center">
                            <button class="btn btn-primary rounded" type="submit">Publicar</button>
                        </div>
                    </div>
                    </form>
                <?php /*fechando do if para sessão do usuário*/ } ?>

                <h6 class="border-bottom pb-2 mb-0"> Comentários: </h6>
                <?php
                $todosComentarios = "SELECT * FROM comentario WHERE id_produto = $item[id]";
                $resultadoComentario = $db->query($todosComentarios);

                while ($comentario = $resultadoComentario->fetchArray()) {
                    $nomeUsuario = "SELECT nome FROM usuarios WHERE id = $comentario[id_usuario]";
                    $resultadoNome = $db->query($nomeUsuario);
                    while ($nome = $resultadoNome->fetchArray()) {
                        $nomeUsuario = $nome['nome'];
                    }
                ?>

                    <div class="d-flex text-light pt-3">
                        <div class="bd-áceholder-img flex-shrink-0 me-2 rounded">
                            <i class="bi bi-person"></i>
                        </div>
                        <p class="pb-3 mb-0 small lh-sm border bottom">
                            <strong class="d-block text-gray-dark">
                                <?php echo $nomeUsuario ?>
                            </strong>
                            </br>

                            <i class="bi bi-chat-left-dots"></i>
                            <?php echo $comentario['comentario'] ?>
                            </br>

                            <i class="bi bi-star-fill"></i>
                            <?php echo $comentario['nota'] ?>
                            <i class="bi bi-clock"></i>
                            <?php echo $comentario['dataComentario'] ?>
                        </p>

                    </div>
                <?php } ?>
                


                <div class="card p-3 mt-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center">
                            <img src="https://i.imgur.com/hczKIze.jpg" width="60" class="user-img rounded-circle mr-2">
                            <span><small class="font-weight-bold text-danger"><?php echo $nomeUsuario ?></small><br>
                                <small class="font-weight-bold"><?php echo $comentario['comentario'] ?></small></span>
                        </div>

                        <small><?php echo $comentario['dataComentario'] ?></small>
                    </div>

                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-4">
                            <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                            <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>
                        </div>

                        <div class="icons align-items-center">

                            <i class="bi bi-star-fill"></i>
                            <?php echo $comentario['nota'] ?>
                            <i class="fa fa-check-circle-o check-icon"></i>

                        </div>

                    </div>

                </div>



                <div class="card p-3 mt-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center">
                            <img src="https://i.imgur.com/hczKIze.jpg" width="60" class="user-img rounded-circle mr-2">
                            <span><small class="font-weight-bold text-danger">Seu zé</small><br>
                                <small class="font-weight-bold">ESSI. REMEDIU. E. BOM. DIMAI. MI. AJUDO. PRA. CARANBA. CVOM. MEU. POBREMA</small></span>
                        </div>

                        <small>2 years ago</small>
                    </div>

                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-4">
                            <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                            <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>
                        </div>

                        <div class="icons align-items-center">

                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-check-circle-o check-icon"></i>

                        </div>

                    </div>

                </div>

                <div class="card p-3 mt-2">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center">
                            <img src="https://i.imgur.com/C4egmYM.jpg" width="60" class="user-img rounded-circle mr-2">
                            <span><small class="font-weight-bold text-danger">Dona amelia</small> <br>
                                <small class="font-weight-bold">BAO DEMAIS SÔ , ACENTO CIRCUNFLEXO SÓ PRA DEIXAR ESTILOSO </small></span>
                        </div>

                        <small>3 minutes ago</small>
                    </div>

                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-4">
                            <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                            <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>
                        </div>

                        <div class="icons align-items-center">
                            <i class="fa fa-star-o text-muted"></i>
                            <i class="fa fa-check-circle-o check-icon text-primary"></i>
                        </div>

                    </div>

                </div>


                <div class="card p-3 mt-2">

                    <div class="d-flex justify-content-between align-items-center">

                        <div class="user d-flex flex-row align-items-center">

                            <img src="https://i.imgur.com/0LKZQYM.jpg" width="60" class="user-img rounded-circle mr-2">
                            <span><small class="font-weight-bold text-danger">Rita Cadillac</small><br>
                                <small class="font-weight-bold">Quase fui pra vala :( </small></span>

                        </div>


                        <small>3 days ago</small>

                    </div>


                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-4">
                            <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                            <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>

                        </div>

                        <div class="icons align-items-center">
                            <i class="fa fa-star-o text-muted"></i>
                            <i class="fa fa-check-circle-o check-icon text-primary"></i>

                        </div>

                    </div>

                </div>

                <div class="card p-3 mt-2">

                    <div class="d-flex justify-content-between align-items-center">

                        <div class="user d-flex flex-row align-items-center">

                            <img src="https://i.imgur.com/ZSkeqnd.jpg" width="60" class="user-img rounded-circle mr-2">
                            <span><small class="font-weight-bold text-danger">Kelly Piquet</small><br>
                                <small class="font-weight-bold">Very nice, I gostei so much this remedio.</small></span>

                        </div>


                        <small>3 days ago</small>

                    </div>


                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-4">
                            <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                            <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>

                        </div>

                        <div class="icons align-items-center">
                            <i class="fa fa-star-o text-muted"></i>
                            <i class="fa fa-check-circle-o check-icon text-primary"></i>

                        </div>

                    </div>



                </div>



            </div>

        </div>

        </div>


    <?php
}
include '../componentes/footer.php'
    ?>