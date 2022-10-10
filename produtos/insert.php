<?php
include '../configuracao/conexao.php';

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['valor'];
    $quantidade = $_POST['qtd'];
    $imagem = $_POST['imagem'];

    $sql = "INSERT INTO produtos (nome, tipo, descricao, preco, quantidade, imagem) VALUES ('$nome', '$tipo', '$descricao', '$preco', '$quantidade', '$imagem')";

    //inserir no banco de dados em forma pdo
    $db->exec($sql);

    header('location: listaprodutos.php');

?>