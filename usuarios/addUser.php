<?php 
// arquivo de cadastro de usuario no banco de dados

// incluir o arquivo de conexao com o banco de dados
include "../configuracao/conexao.php";
// pegar os dados do formulario
$nome = $_POST["nome"];
$email = $_POST["email"];
$data_nascimento = $_POST["data_nascimento"];
$senha = $_POST["senha"];

// inserir os dados no banco de dados

// criar a query de insercao

$inserir = "INSERT INTO usuarios (nome, email,
data_nascimento, senha) VALUES
('$nome', '$email', '$data_nascimento', '$senha')";

// executar a query
$db->exec($inserir);

// redirecionar para a pagina de listar usuarios
header("Location: listaUser.php");
?>