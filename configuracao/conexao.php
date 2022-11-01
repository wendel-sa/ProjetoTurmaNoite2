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

/* criando a tabela no 
banco de dados de usuarios*/
$TabelaUsuarios =
"CREATE TABLE IF NOT EXISTS usuarios(
id INTEGER PRIMARY KEY AUTOINCREMENT,
nome TEXT,
email TEXT,
data_nascimento TEXT,
senha TEXT
)";

$db->exec($TabelaUsuarios);


//tabela de compra
$TabelaCompra =
"CREATE TABLE IF NOT EXISTS compra(
id INTEGER PRIMARY KEY AUTOINCREMENT,
id_usuario INTEGER,
id_produto INTEGER,
quantidade INTEGER,
valorTotal REAL,
FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
FOREIGN KEY(id_produto) REFERENCES produtos(id)
)";

$db->exec($TabelaCompra);

/*Tabela de comentarios */

$tabelaComentarios =
"CREATE TABLE IF NOT EXISTS comentarios(
id INTEGER PRIMARY KEY AUTOINCREMENT,
id_usuario INTEGER,
id_produto INTEGER,
comentario TEXT,
nota INTEGER,
dataComentario TEXT,
FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
FOREIGN KEY(id_produto) REFERENCES produtos(id)
)";

$db->exec($tabelaComentarios);

//Tabela de favoritos
$tabelaFavoritos =
"CREATE TABLE IF NOT EXISTS favoritos(
id INTEGER PRIMARY KEY AUTOINCREMENT,
id_usuario INTEGER,
id_produto INTEGER,
FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
FOREIGN KEY(id_produto) REFERENCES produtos(id)
)";
$db->exec($tabelaFavoritos);

?>