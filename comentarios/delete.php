<?php 
/*Arquivo que irá excluir um comentario  banco de dados */
//incluir o banco de dados
include '../configuracao/conexao.php';
//pegando o id do comentario
$id = $_GET['u_id'];
//deletando o comentario
$deleteComentario = "DELETE FROM comentarios WHERE id = '$id'";
//se o comando for executado com sucesso
if($db->exec($deleteComentario)){
    echo "Comentario excluído com sucesso!";
}else{
    echo "Erro ao excluir comentario";
}
?>