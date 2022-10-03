<?php 
/*arquivo com uma lista 
de usuarios cadastrados no banco de dados*/
//incluir o arquivo de conexao com o banco de dados
include "../configuracao/conexao.php";

//criar a query de selecao
$selecionar = "SELECT * FROM usuarios";

//executar a query
$resultado = $db->query($selecionar);

//incluir o arquivo de componentes/header.php
include "../componentes/header.php";
?>

<section class="py-5">
    <div class="container efeito-vidro">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">
                    Lista de Usuários
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
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($linha = $resultado->fetchArray()) { ?>
                        <tr>
                            <td><?php echo $linha["nome"]; ?></td>
                            <td><?php echo $linha["email"]; ?></td>
                            <td><?php echo $linha["senha"]; ?></td>
                            <td><?php echo $linha["data_nascimento"]; ?></td>
                            <td>
                            <a href="editarUser.php?id=<?php echo $linha["id"]; ?>"
                              class="btn btn-warning">Editar</a>
                            <a href="excluirUser.php?id=<?php echo $linha["id"]; ?>"
                              class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
//incluir o arquivo de componentes/footer.php
include "../componentes/footer.php";
?>