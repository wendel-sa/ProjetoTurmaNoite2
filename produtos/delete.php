<?php
$id = $_GET['u_id'];

include '../conexao.php';
$query = "DELETE FROM produtos WHERE id = '$id'";

if ($db->exec($query)) {
    echo "Produto excluído com sucesso!";
} else {
    echo "Erro ao excluir produto!";
}

?>