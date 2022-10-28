<?php 
/*Arquivo que irá adicionar os comentarios
 no banco de dados */

//incluir o banco de dados
include '../configuracao/conexao.php';
//pegando os dados do formulario
$comentario = $_POST['comentario'];
$nota = $_POST['nota'];
$id_produto = $_POST['id_produto'];
$id_usuario = $_POST['id_usuario'];
$dataComentario = date('d/m/Y');

//inserindo os dados no banco de dados
$inserirComentario = "INSERT 
INTO comentarios (id_usuario, id_produto,
 comentario, nota, dataComentario) 
VALUES ('$id_usuario', '$id_produto',
 '$comentario', '$nota', '$dataComentario')";

//se o comando for executado com sucesso
if($db->exec($inserirComentario)){
   echo "Comentario adicionado com sucesso";
}else{
    echo "Erro ao adicionar comentario";
}
?>