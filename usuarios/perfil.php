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

<?php
//inclui o arquivo de componentes/footer.php
include "../componentes/footer.php";
?>