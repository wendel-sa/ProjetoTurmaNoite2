<?php 
//arquivo que irá criar as sessões de login

//incluir o arquivo conexao.php
include '../configuracao/conexao.php';


//Verifica se houve POST e se o usuario ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
    header("Location: index.php"); exit;
}

//pegar os dados do formulario
$email = $_POST['email'];
$senha = $_POST['senha'];

//criar a variavel de query com um select * da tabela usuarios
$query = "SELECT * FROM usuarios WHERE (`email` = '".$email ."') 
AND (`senha` = '". $senha ."') LIMIT 1";

//executar a query em pdo
$consulta = $db->query($query);

//verificar se a consulta retornou algum resultado do sqlite
if ($consulta->fetchArray()) {
    //se retornou, criar uma sessao com o nome de usuario
    session_start();
    $_SESSION['usuario'] = $email;
    header("Location: ../usuarios/perfil.php");
    exit;
} else {
    //se nao retornou, redirecionar para a pagina de login
    echo "Login ou senha incorretos!";
}

?>
