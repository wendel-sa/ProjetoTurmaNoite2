<?php 
//arquivo de login do usuario

//inclui o componente header.php
include "../componentes/header.php";
?>

<section class="py-5">
    <div class="container efeito-vidro text-white">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">
                    Login
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" 
                          name="email" id="email" placeholder="Digite seu email">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" 
                          name="senha" id="senha" placeholder="Digite sua senha">
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-blue">
                          Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
//inclui o componente footer.php
include "../componentes/footer.php";
?>