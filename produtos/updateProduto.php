<?php
/*Arquivo que ira receber os dados do formulario de update e mandar para o banco */
//incluir o arquivo de conexao com o banco de dados
include "../configuracao/conexao.php";

//receber os dados do formulario
$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$imagem = $_POST['imagem'];

//atualizar os dados do produto
$result_produto = "UPDATE produtos 
SET nome='$nome', descricao='$descricao', preco='$preco', quantidade='$quantidade', imagem='$imagem'
 WHERE id='$id'";

//executar a query em pdo
$resultado_produto = $db->exec($result_produto);

//verificar se foi alterado
if ($resultado_produto) {
    echo "Alterado com sucesso!";
} else {
    echo "Erro ao alterar!";
}
