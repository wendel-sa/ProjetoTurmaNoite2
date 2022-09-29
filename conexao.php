<?php 
$dbname = "../bancodedados.db";
$db = new SQLite3($dbname);

// criando a tabela no banco de dados de produtos
$TabelaProdutos = 
"CREATE TABLE IF NOT EXISTS produtos(
id INTEGER PRIMARY KEY AUTOINCREMENT,
nome TEXT,
tipo TEXT,
descricao TEXT,
preco REAL,
quantidade INTEGER,
imagem TEXT
)";

$db->exec($TabelaProdutos);

// criando a tabela no banco de dados de usuarios
$TabelaUsuarios =
"CREATE TABLE IF NOT EXISTS usuarios(
id INTEGER PRIMARY KEY AUTOINCREMENT,
nome TEXT,
email TEXT,
data_nascimento TEXT,
senha TEXT
)";

$db->exec($TabelaUsuarios);
?>