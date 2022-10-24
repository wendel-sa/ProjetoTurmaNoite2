<?php
/*Arquivo que irá listar todos os comentarios */
//incluir o banco de dados
include '../configuracao/conexao.php';

//fazendo o select no banco de dados
$selecionarComentarios = "SELECT * FROM comentarios";

//executando o comando
$comentarios = $db->query($selecionarComentarios);

//incluindo o header
include '../componentes/header.php';
?>

<div class="container ">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-white">Comentarios</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ID Usuario</th>
                        <th scope="col">ID Produto</th>
                        <th scope="col">Comentario</th>
                        <th scope="col">Nota</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //se a tabela tiver dados
                    if ($comentarios->fetchArray()) {
                        //percorrer a tabela
                        while ($comentario = $comentarios->fetchArray()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $comentario['id']; ?></th>
                                <td><?php echo $comentario['id_usuario']; ?></td>
                                <td><?php echo $comentario['id_produto']; ?></td>
                                <td><?php echo $comentario['comentario']; ?></td>
                                <td><?php echo $comentario['nota']; ?></td>
                                <td><?php echo $comentario['dataComentario']; ?></td>
                                <td>
                                    <a href="delete.php?u_id=<?php echo $comentario['id']; ?>" class="btn btn-danger">Excluir</a>
                                    <a href="editar.php?u_id=<?php echo $comentario['id']; ?>" class="btn btn-warning">Editar</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7" class="text-center">Nenhum comentario cadastrado</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
//incluindo o footer
include '../componentes/footer.php';
?>