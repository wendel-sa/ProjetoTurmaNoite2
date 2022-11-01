<?php
/*ARQUIVO DE PERFIL DO USUARIO */
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../usuarios/login.php");
    exit;
}
//incluir o arquivo de conexao com o banco de dados
include "../configuracao/conexao.php";

//criar a variavel de query com um select * da tabela usuarios
$DadosUser = "SELECT * FROM usuarios WHERE 
email = '" . $_SESSION['usuario'] . "'";

//executar a query em pdo
$consulta = $db->query($DadosUser);

//inclui o arquivo de componentes/header.php
include "../componentes/header.php";
?>

<section class="py-5">
    <div class="container efeito-vidro">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">
                    Perfil do Usuário
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Data de Nascimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($linha = $consulta->fetchArray()) { ?>
                            <tr>
                                <?php $id = $linha["id"]; ?>
                                <td><?php echo $linha["nome"]; ?></td>
                                <td><?php echo $linha["email"]; ?></td>
                                <td><?php echo $linha["senha"]; ?></td>
                                <td><?php echo $linha["data_nascimento"];
                                    ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<section class="py-5">
    <div class="container efeito-vidro">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">
                    Historico de Compras
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $historico = "SELECT * FROM compra WHERE
                           id_usuario = '" . $id . "'";
                        $consulta = $db->query($historico);
                        while ($linha = $consulta->fetchArray()) { ?>
                            <tr>
                                <?php
                                $produtos = "SELECT * FROM produtos WHERE
                                id = '" . $linha["id_produto"] . "'";
                                $consulta2 = $db->query($produtos);
                                while ($linha2 = $consulta2->fetchArray()) { ?>
                                    <td><?php echo $linha2["nome"]; ?></td>
                                    <td><?php echo $linha2["preco"]; ?></td>
                                    <td><?php echo $linha["quantidade"]; ?></td>
                                    <td><?php echo $linha["valorTotal"]; ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <h1 class="text-center">
        Favoritos
    </h1>

    <div class="container">
        <div class="row">
            <?php
            $favoritos = "SELECT * FROM favoritos WHERE
            id_usuario = '" . $id . "'";
            $consulta = $db->query($favoritos);
            //se a consulta retornar algum resultado
            if ($consulta->fetchArray() > 0) {
            ?>
                <div class="row row-cols-1 
                row-cols-lg-3 align-items-stretch g-4 py-5">

                    <?php
                    while ($linha = $consulta->fetchArray()) {
                        $produtos = "SELECT * FROM produtos WHERE
                    id = '" . $linha["id_produto"] . "'";
                        $consulta2 = $db->query($produtos);
                        while ($linha2 = $consulta2->fetchArray()) { ?>

                            <div class="col">
                                <div class="card card-cover h-100
                                 overflow-hidden text-bg-dark rounded-4 shadow-lg" 
                                 style="background-image: url('<?php echo $linha2['imagem'];
                                  ?>'); background-size: cover;  background-position: center;">
                                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white
                                     text-shadow-1 bg-gradiente">
                                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                                            <?php
                                            echo $linha2["nome"];
                                            ?>
                                        </h3>
                                        <ul class="d-flex list-unstyled mt-auto">
                                            <li class="d-flex align-items-center me-3">
                                                R$
                                                <small>
                                                    <?php
                                                    echo $linha2["preco"];
                                                    ?>
                                                </small>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <a href="../produtos/item.php?u_id=<?php echo $linha2["id"]; ?>"
                                                 class="btn btn-outline-light">Ver Produto</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                    <?php }
                    } ?>
                </div>
            <?php } else { ?>
                <div class="col-12">
                    <h1 class="text-center">
                        Nenhum produto favoritado
                    </h1>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
</section>

<?php
//inclui o arquivo de componentes/footer.php
include "../componentes/footer.php";
?>