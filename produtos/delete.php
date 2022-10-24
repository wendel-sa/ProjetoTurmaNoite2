<?php
$id = $_GET['u_id'];

include '../configuracao/conexao.php';
$query = "DELETE FROM produtos WHERE id = '$id'";


if ($db->exec($query)) {
    echo "Produto excluído com sucesso!";
    //deletando todos os comentarios do produto
    $deleteCometarios = "DELETE FROM comentarios WHERE id_produto = '$id'";
    //se o comando for executado com sucesso
    if ($db->exec($deleteCometarios)) {
        echo "Comentarios do utem excluídos com sucesso!";
    } else {
        echo "Erro ao excluir comentarios";
    }
    
} else {
    echo "Erro ao excluir produto!";
}

?>