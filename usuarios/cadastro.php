<?php
//Arquivo de cadastro do usuario
//Path: usuarios\cadastro.php
//incluir o arquivo de componentes/header.php
include "../componentes/header.php";
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">
                    Cadastro de Usuário
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="addUser.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control"
                          name="nome" id="nome" placeholder="Digite seu nome">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" 
                          name="email" id="email" placeholder="Digite seu email">
                    </div>

                    <div class="form-group">
                        <label>Data de nascimento</label>
                        <input type="date" class="form-control" 
                          name="data_nascimento" id="data_nascimento">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" 
                          name="senha" id="senha" placeholder="Digite sua senha">
                    </div>

                    <div class="py-3">
                        <button type="submit" class="btn btn-primary">
                          Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
//incluir o arquivo de componentes/footer.php
include "../componentes/footer.php";
?>