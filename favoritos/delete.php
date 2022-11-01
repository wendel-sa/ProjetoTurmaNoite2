<?php 
//Arquivo irá deletar o item dos favoritos

//incluir banco de dados
include '../configuracao/conexao.php';

//Recebe o id do usuario
$id_usuario = $_POST['id_usuario'];
//Recebe o id do produto
$id_produto = $_POST['id_produto'];

//Deleta o produto dos favoritos
$deleta = $db->query("DELETE FROM favoritos
 WHERE id_usuario = '$id_usuario' AND id_produto = '$id_produto'");
if($deleta){
    echo "Produto deletado dos favoritos";
}else{
    echo "Erro ao deletar dos favoritos";
}
?>