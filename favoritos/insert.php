<?php 
//Arquivo irá mandar o item para os favoritos

//incluir banco de dados
include '../configuracao/conexao.php';

//Recebe o id do usuario
$id_usuario = $_POST['id_usuario'];
//Recebe o id do produto
$id_produto = $_POST['id_produto'];

//Verifica se o produto já está nos favoritos
$verifica = $db->query("SELECT * FROM favoritos 
WHERE id_usuario = '$id_usuario' AND id_produto = '$id_produto'");

$verifica = $verifica->fetchArray(SQLITE3_ASSOC);
if ($verifica > 0) {
  echo "Produto já está nos favoritos";
}else{
    
    //Insere o produto nos favoritos
    $insere = $db->query("INSERT INTO 
    favoritos (id_usuario, id_produto) 
    VALUES ('$id_usuario', '$id_produto')");

    if($insere){
        echo "Produto adicionado aos favoritos";
    }else{
        echo "Erro ao adicionar aos favoritos";
    }
}
?>
