<?php
/*Arquivo que irá receber os dados do formulario da compra*/

//incluir o arquivo de conexao com o banco de dados
include "../configuracao/conexao.php";

//receber os dados do formulario
$idProduto = $_POST['idProduto'];
$idUsuario = $_POST['idUsuario'];
$quantidade = $_POST['quantidade'];
$valor = $_POST['valor'];
//converte valor para float
$valor = str_replace(",", ".", $valor);
//conerte quantidade para int
$quantidade = (int)$quantidade;
$valorTotal = $quantidade * $valor;

//inserir os dados da compra
$result_compra = "INSERT INTO compra (id_produto, id_usuario, quantidade, valorTotal) VALUES ('$idProduto', '$idUsuario', '$quantidade', '$valorTotal')";

//executar a query em pdo
$resultado_compra = $db->exec($result_compra);

//verificar se foi inserido
if ($resultado_compra) {
    echo "Compra realizada com sucesso!";
} else {
    echo "Erro ao realizar a compra!";
}

?>