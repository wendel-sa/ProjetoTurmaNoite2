<?php

include '../configuracoes/sessao.php';
include '../configuracoes/conexao.php';

//Verifica se mão há a variável da sessão que identifica o usuario
if (!isset($_SESSION['UsuarioID'])) {
    // Destroi a sessão por segurança
    header("Location: index.php");
    session_destroy();
    // Redireciona o sisitante de volta pro login

}

$queryUser = "SELECT * FROM usuarios WHERE Id = $_SESSION[UsuarioID]";
$resultado = $db->query($queryUser);

$queryP = "SELECT * FROM produtos";
$resultadoP = $db->query($queryP);

$queryU = "SELECT * FROM usuarios";
$resultadoU = $db->query($queryU);

$usuario = $resultado->fetch(PDO::FETCH_ASSOC);

$queryH = "SELECT * FROM compra WHERE IdUsuario = ' " . $_SESSION['UsuarioID'] . " '";

$queryCarrinho = "SELECT * FROM carrinho WHERE IdUsuario = $_SESSION[UsuarioID]";
$resultadoCarrinho = $db->query($queryCarrinho);


?>

<?php
include '../componentes/header.php';
?>
<div class="tabinator">
    <br>
    <h2>Minha Conta</h2>
    <input type="radio" id="tab1" name="tabs" checked style="display:none;">
    <label for="tab1">Meu Perfil</label>
    <input type="radio" id="tab2" name="tabs" style="display:none;">
    <label for="tab2">Carrinho</label>
    <input type="radio" id="tab3" name="tabs" style="display:none;">
    <label for="tab3">Histórico</label>
    <input type="radio" id="tab4" name="tabs" style="display:none;">
    <label for="tab4">Favoritos</label>
    <input type="radio" id="tab5" name="tabs" style="display:none;">
    <label for="tab5">Feedbacks</label>

    <?php

    $queryT = $db->prepare("SELECT * FROM usuarios WHERE Id = '$_SESSION[UsuarioID]' AND Tipo = 0");

    $queryT->execute();

    $row = $queryT->rowCount();

    if ($row == 0) {
    ?>
        <input type="radio" id="tab6" name="tabs" style="display:none;">
        <label for="tab6">Produtos</label>
        <input type="radio" id="tab7" name="tabs" style="display:none;">
        <label for="tab7">Usuários</label>
        <input type="radio" id="tab8" name="tabs" style="display:none;">
        <label for="tab8">Entregadores</label>

    <?php } ?>

    <div id="content1">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo $usuario['Imagem']; ?>" alt="" width="200px" height="200px">
            </div>
            <div class="col-10">
                <form action="">
                    <input type="text" placeholder="ID" style="display:none;"><strong>ID:</strong>
                    <?php echo $usuario['Id']; ?><br>
                    <input type="text" placeholder="Nome Completo" style="display:none" ;><strong>Nome Completo:</strong>
                    <?php echo $usuario['Nome']; ?><br>
                    <input type="text" placeholder="Email" style="display:none;"><strong>Email:</strong>
                    <?php echo $usuario['Email']; ?><br>
                    <input type="datetime" placeholder="Data de Nascimento" style="display:none;"><strong>Data de Nascimento:</strong> <?php echo $usuario['DataNasc']; ?><br>

                    <input type="text" placeholder="Documento" style="display:none;"><strong>Documento:</strong>
                    <?php echo $usuario['Doc']; ?><br>
                    <input type="text" placeholder="Telefone" style="display:none;><strong>Telefone:</strong>
<?php echo $usuario['Telefone']; ?><br>
         <input type=" text" placeholder="CEP" style="display:none;"><strong> CEP:</strong>
                    <?php echo $usuario['Cep']; ?> <br>
                    <input type="text" placeholder="Número" style="display:none" ;><strong>Número:</strong>
                    <?php echo $usuario['Numero']; ?><br>
                    <input type="text" placeholder="Bairro" style="display:none" ;><Strong>Bairro:</Strong>
                    <?php echo $usuario['Bairro']; ?><br>
                    <input type="text" placeholder="Cidade" style="display:none" ;><strong> Cidade:</strong>
                    <?php echo $usuario['Cidade']; ?><br>
                    <input type="text" placeholder="Estado" style="display:none;"> <strong>Estado:</strong>
                    <?php echo $usuario['Estado']; ?><br>
                    <input type="password" placeholder="Estado" style="display:none;"> <strong>Senha:</strong>
                    <?php echo $usuario['Senha']; ?><br>
                    <input type="datetime" placeholder="DataCadastro" style="display:none;"> <strong>Cadastrado desde:</strong>
                    <?php echo $usuario['DataCadastro']; ?><br>

                </form>
            </div>
        </div>
        <div class="botao__perfil" style="text-align: right;">
            <button class="btn btn-outline-dark">Editar perfil</button>
            <button class="btn btn-outline-dark">Trocar Senha</button>
            <a href="/configuracoes/logout.php" class="btn btn-outline-dark">Sair da conta</a>
        </div>
    </div>

    <div id="content2">
        <p>Nenhuma receita cadastrada até o momento.
        </p>



    </div>
    <div id="content3">

        <?php

        $vendas = $db->query($queryH);

        if ($vendas->rowCount() > 0) {

            foreach ($vendas as $linha) {

                $query = "SELECT * FROM produtos WHERE Id = '" . $linha['IdProduto'] . "'";

                $produto = $db->query($query);

                foreach ($produto as $linha2) { ?>

                    <div class="d-flex pt-3">

                        <div class="bd-placeholder-img flex-shrink-0 me-2">

                            <img src="<?php echo $linha2['Imagem']; ?>" width="100" height="100" class="rounded-5" alt="">

                        </div>

                        <p class="pb-3 mb-0 border-bottom text-dark col-6">

                            <strong>

                                <?php echo $linha2['Nome'] ?>

                            </strong>
                            <br>
                            <span class="db-block">

                                <strong>Total da Compra: </strong> R$: <?php echo $linha['ValorTotal']; ?>

                            </span>
                            <br>
                            <strong>Descrição: </strong>
                            <span class="db-block">

                                <?php echo $linha2['Descricao']; ?>

                            </span>
                            <br>
                            <strong>Quantidade comprada: </strong>
                            <span class="db-block">

                                <?php echo $linha['Quantidade']; ?>

                            </span>
                            <br>
                            <small class="db-block">

                                <strong> Comprado em: </strong> <?php echo $linha['DataCompra']; ?>

                            </small>

                        </p>

                        <div class="float-end">

                            <a target="_blank" href="../produtos/recibo.php?Idvenda=<?php echo $linha['Id']; ?>" class="btn btn-light">Ver recibo <i class="bi bi-pencil-square"></i></a>

                        </div>
                        <!--    MODAL AVALIAÇÃO  -->

                        <div class="modal fade" id="a<?php echo $linha['Id']; ?>" aria-hidden="true" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Avaliação</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <!--FORM AVALIACAO-->
                                        <form class="m-3" action="../configuracoes/avaliacao.php" method="post">

                                            <div style="display: none;">
                                                <label class="form-label"> Id compra </label><br>
                                                <input type="text" name="idcompra" value="<?php echo $linha['Id']; ?>" class="form-control">
                                                <br>
                                            </div>

                                            <input class="slider myRange" type="range" max="5" min="1" value="1" name="nota">
                                            <div class="d-flex">

                                                <p class="text-warning"><i class="bi bi-star-fill"></i> : <span class="demo"></span></p>

                                            </div>

                                            <div class="comentario" style="margin-top: 2rem;">
                                                <h6>Deixe seu comentário</h6>
                                                <div class="input-group input-group-lg" name="comentario">

                                                    <input name="comentario" type="text" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" style="border: 1px solid grey; border-radius: 20px; width: 100%; height: 2rem;">
                                                </div>

                                            </div>

                                            <button class="btn btn-dark" data-bs-target="#b<?php echo $linha['Id']; ?>" data-bs-toggle="modal" style="background-color: #A2E243">Avaliar </button>

                                        </form>

                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="b<?php echo $linha['Id']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Avaliado com sucesso</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!--    CHECK AVALIAÇÃO    -->
                                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php

                        $queryA = "SELECT * FROM Avaliacao WHERE IdCompra = $linha[Id]";
                        $resultadoA = $db->prepare($queryA);
                        $resultadoA->execute();
                        $row = $resultadoA->rowCount();

                        if ($row != 1) { ?>

                            <a class="btn btn-outline" data-bs-toggle="modal" href="<?php echo $linha['Id']; ?>" role="button" style="height: 37px; background-color: #A2E243; border:none;">Avaliar Compra<i class="fa-solid fa-star" style="font-size: 12px;"></i></a>

                        <?php } else { ?>

                            <a class="btn btn-outline" href="../configuracoes/ex_avaliacao.php?Id=<?php echo $linha['Id']; ?>" style="height: 37px; background-color: red; border:none; color: white;">Excluir Avaliação <i class="fa-solid fa-star" style="font-size: 12px;"></i></a>

                        <?php }

                        ?>
                    </div>
                    <!-- fim do modal  -->
            <?php
                }
            }
        } else { ?>

            <p>Você não realizou nenhuma compra até o momento.
            </p>

        <?php } ?>

    </div>
    <div id="content4">
        <?php

        $queryF = "SELECT * FROM favoritos WHERE IdUsuario = $_SESSION[UsuarioID]";
        $resultadoF = $db->query($queryF);

        if ($resultadoF->rowCount() >= 1) {

            foreach ($resultadoF as $linhaF) {

                $qP = "SELECT * FROM produtos WHERE Id = $linhaF[IdProduto]";
                $resQP = $db->query($qP);

                foreach ($resQP as $linhaQP) {

        ?>

                    <div class="d-flex pt-3">

                        <div class="bd-placeholder-img flex-shrink-0 me-2">

                            <img src="<?php echo $linhaQP['Imagem']; ?>" width="100" height="100" class="rounded-5" alt="">

                        </div>

                        <p class="pb-3 mb-0 border-bottom text-dark col-1">

                            <strong>
                                <?php echo $linhaQP['Nome']; ?>
                            </strong>

                        <form action="../configuracoes/remover_favorito.php" method="post">

                            <input type="hidden" name="Idusuario" value="<?php echo $_SESSION['UsuarioID']; ?>">
                            <input type="hidden" name="Idproduto" value="<?php echo $linhaQP['Id']; ?>">
                            <input type="hidden" name="local" value="perfil">

                            <button class="btn btn-sm btn-outline-dark btn-favorito-perfil">
                                <p class="mb-0">
                                    <i class="fa-solid fa-heart" style="font-size: 30px;"> </i>
                                </p>
                            </button>

                        </form>

                        </p>

                    </div>

            <?php
                }
            }
        } else { ?>

            <p>Você não favoritou nenhum produto</p>

        <?php
        }

        ?>
    </div>
    <div id="content5">
        <p>Você não avaliou nenhum pedido.
        </p>
    </div>

    <?php

    $queryT = $db->prepare("SELECT * FROM usuarios WHERE Id = '$_SESSION[UsuarioID]' AND Tipo = 0");

    $queryT->execute();

    $row = $queryT->rowCount();

    if ($row == 0) {
    ?>
        <div id="content6">

            <!-- BOTÃO ADD PRODUTOS -->
            <button type="button" class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#c" style="background-color:#A2E243;">
                Adicionar Produtos <i class="fa-solid fa-plus"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="c" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Produtos </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../produtos/add_produto.php" method="post">

                                <input class="form-control my-1" type="text" name="nome" placeholder="Nome do produto" required>
                                <input class="form-control my-1" type="text" name="tipo" placeholder="Tipo do produto" required>
                                <input class="form-control my-1" type="date" name="fabricado" placeholder="Data de fabricação" required>
                                <input class="form-control my-1" type="date" name="validade" placeholder="Data de validade" required>
                                <input class="form-control my-1" type="text" name="descricao" placeholder="Descrição do produto" required>
                                <input class="form-control my-1" id="teste" type="text" name="imagem" placeholder="Imagem do produto" required>
                                <input class="form-control my-1" type="text" name="valor" placeholder="Preço do produto" required>
                                <input class="form-control my-1" type="text" name="quantidade" placeholder="Quantidade do produto" required>
                                <input class="form-control" type="text" name="bula" placeholder="Bula">
                                <input class="form-control my-3" type="submit" value="Adicionar">

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-outline" style="background-color:#A2E243;">Adicionar Produto </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--   FIM DO BOTÃO ADD PRODUTO  -->

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Fabricação</th>
                        <th scope="col">Validade</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Url da imagem</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    foreach ($resultadoP as $linhaP) {

                    ?>

                        <div class="modal fade" id="a<?php echo $linhaP['Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseja realmente excluir:<?php echo $linhaP['Nome']; ?>? </p>
                                    </div>
                                    <div class="modal-footer">

                                        <a href="../../produtos/deletar_produtos.php?id=<?php echo $linhaP['Id']; ?>" class="btn btn-danger">Excluir</a>

                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Voltar</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <tr>
                            <th scope="row"> <?php echo $linhaP['Id']; ?> </th>
                            <td> <?php echo $linhaP['Nome']; ?> </td>
                            <td><?php echo $linhaP['Tipo']; ?></td>
                            <td><?php echo $linhaP['Fabricacao']; ?></td>
                            <td><?php echo $linhaP['Validade']; ?></td>
                            <td><?php echo $linhaP['Quantidade']; ?></td>
                            <td><?php echo $linhaP['Valor']; ?></td>
                            <td>
                                <p class="text-truncate" style="width: 200px;"> <?php echo $linhaP['Descricao']; ?> </p>
                            </td>
                            <td> <img src="<?php echo $linhaP['Imagem']; ?>" style="width: 100px; height: 100px;"> </td>
                            <td> <a href="../../produtos/editar_produtos.php?id=<?php echo $linhaP['Id']; ?> " class="btn m-2" style="width: 100px;background-color: #A2E243;">Editar <i class="fa-regular fa-pen-to-square"></i> </a>

                                <button class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#a<?php echo $linhaP['Id']; ?>" style="width: 100px;">Excluir <i class="fa-solid fa-trash"></i> </button>
                            </td>

                        </tr>

                    <?php  } ?>

                </tbody>
            </table>
        </div>

        <div id="content7">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Email</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Número da casa</th>
                            <th scope="col">Rua</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Data de Cadastro</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($resultadoU as $linha) {

                        ?>

                            <div class="modal fade" id="a<?php echo $linha['Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Excluir </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja realmente excluir: <?php $linha['Nome']; ?>? </p>
                                        </div>
                                        <div class="modal-footer">

                                            <a href="deletar_usuarios.php?id=<?php echo $linha['Id']; ?>" class="btn btn-danger">Excluir</a>

                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Voltar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <tr>
                                <th scope="row"> <?php echo $linha['Id']; ?> </th>
                                <td> <?php echo $linha['Nome']; ?> </td>
                                <td><?php echo $linha['Senha']; ?></td>
                                <td><?php echo $linha['Email']; ?></td>
                                <td><?php echo $linha['Cep']; ?></td>
                                <td><?php echo $linha['Numero']; ?></td>
                                <td><?php echo $linha['Rua']; ?></td>
                                <td><?php echo $linha['Bairro']; ?> </td>
                                <td><?php echo $linha['Cidade']; ?></td>
                                <td><?php echo $linha['Estado']; ?></td>
                                <td><?php echo $linha['Doc']; ?></td>
                                <td><?php echo $linha['DataNasc']; ?></td>
                                <td><?php echo $linha['DataCadastro']; ?></td>
                                <td> <img src="<?php echo $linha['Imagem']; ?>" style="width: 100px; height: 100px;"> </td>
                                <td> <a href="detalhes_usuarios.php?id=<?php echo $linha['Id']; ?> " class="btn m-2" style="width: 100px;background-color: #A2E243;">Editar <i class="fa-regular fa-pen-to-square"></i></a> <button class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#a<?php echo $linha['Id']; ?>" style="width: 100px;">Excluir <i class="fa-solid fa-trash"></i></button> </td>

                            </tr>
                        <?php
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div id="content8">
            <p>Entregadores
            </p>
        </div>

</div>

<?php } ?>



<script>
    var slider = document.getElementsByClassName('myRange');
    var output = document.getElementsByClassName('demo');
    for (let i = 0; i < slider.length; i++) {
        output[i].innerHTML = slider[i].value;
        slider[i].oninput = function() {
            output[i].innerHTML = this.value;
        }
    }
</script>

</body>

</html>