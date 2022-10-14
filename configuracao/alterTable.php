<?php
/*ARQUIVO PARA ALTERAÇÃO DE TABELAS */

//incluir o arquivo de conexao com o banco de dados
include "../configuracao/conexao.php";

//alterar a tabela de usuarios para o email ser unico
//em sqlite
$alterarEmail = "CREATE UNIQUE INDEX
 IF NOT EXISTS email ON usuarios(email)";

//executar a query
//se der erro, exibir a mensagem de erro
if(!$db->exec($alterarEmail)) {
    echo $db->lastErrorMsg();
} else {
    echo "Tabela alterada com sucesso!";
}

//adicione um campo para o usuario salvar a foto
//em sqlite
$alterarFoto = "ALTER TABLE usuarios ADD COLUMN foto TEXT";

//executar a query
//se der erro, exibir a mensagem de erro
if(!$db->exec($alterarFoto)) {
    echo $db->lastErrorMsg();
} else {
    echo "Tabela alterada com sucesso!";
}

//desc usuario
$descUsuario = "PRAGMA table_info(usuarios)";

//executar a query
$resultado = $db->query($descUsuario);

//exibir o resultado
while($linha = $resultado->fetchArray()) {
    echo $linha["name"] . "<br>";
}
?>