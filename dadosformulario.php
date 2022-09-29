<?php
$nomeDigitado = $_POST['nome'];
$tipo = $_POST['tipo'];
$descricao = $_POST['descricao'];
$Imagem = $_POST['imagem'];
?>

<?php
include 'componentes/header.php';
?>
<section>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="
        <?php
          echo $Imagem;
        ?>
        " class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          
          <?php
            echo $nomeDigitado
          ?>

        </h5>
        <p class="card-text">

        <?php
        echo $descricao;
        ?>
          
        </p>
        <p class="card-text"><small class="text-muted">
        <?php
            echo $valor;
        ?>
        </small></p>
      </div>
    </div>
  </div>
</div>
  
</section>
<?php
include 'componentes/footer.php';
?>