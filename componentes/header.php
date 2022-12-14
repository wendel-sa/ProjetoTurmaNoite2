<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../componentes/estilo.css">
</head>

<body class="bg-2">

  <nav  class="navbar navbar-expand-lg bg-1 navbar-dark opacidade sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="bi bi-shop"></i>
        <span class="text-light">Pet Shop</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../produtos/categorias.php">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../produtos/listaprodutos.php">Lista Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../produtos/cadastro.php" >Cadastrar Produto</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../usuarios/login.php">Login</a></li>
              <li><a class="dropdown-item" href="../usuarios/cadastro.php">Cadastro</a></li>
              <li><a class="dropdown-item" href="../usuarios/listaUser.php">Lista de Usuarios</a></li>

            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>