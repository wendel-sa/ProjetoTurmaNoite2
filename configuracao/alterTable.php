<?php
/*ARQUIVO PARA ALTERAÇÃO DE TABELAS */

//incluir o arquivo de conexao com o banco de dados
include "../configuracao/conexao.php";

//alterar a tabela de usuarios para o email ser unico
//em sqlite
$alterar = "CREATE UNIQUE INDEX IF NOT EXISTS email ON usuarios(email)";

//executar a query
//se der erro, exibir a mensagem de erro
if(!$db->exec($alterar)) {
    echo $db->lastErrorMsg();
} else {
    echo "Tabela alterada com sucesso!";
}

?>