  <?php
include 'componentes/header.php';
?>

    <div class="py-3">
      <div class="card text-bg-dark">
  <img src="http://parqueshoppingbelem.com.br/data/files/60/21/F3/4C/29F4E7106D5512E7ACBBF9C2/WhatsApp%20Image%202022-01-12%20at%2015.09.17%20_1_.jpeg" class="card-img" height="300px" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small>Last updated 3 mins ago</small></p>
  </div>
</div>
    </div>

    <div class="row px-5">
      
      <h1 class="text-center py-3">Cadastre um Produto</h1>
      
      <div class="col-8">
        
        <form action="dadosformulario.php" method="post">
          <div>
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control">
          </div>

           <div>
            <label class="form-label">Tipo</label>
            <input type="text" name="tipo" class="form-control">
          </div>

          <div>
            <label class="form-label">Descrição</label>
            <input type="text" name="descricao" class="form-control">
          </div>

          <div>
            <label class="form-label">Valor</label>
            <input type="number" name="valor" class="form-control">
          </div>

          <div>
            <label class="form-label">Quantidade</label>
            <input type="number" name="qyd" class="form-control">
          </div>

          <div>
            <label class="form-label">Imagem</label>
            <input type="text" name="imagem" class="form-control">
          </div>
          <div class="py-3">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>

      <div class="col-4">
        <div class="card">
          <div class="card-header">
            Novidade
          </div>
          
          <div class="card-body">
            Agora você Pode cadastrar 
            facilmente um produto
          </div>
          
        </div>
      </div>

      
      
    </div>

    <div class="row">
      <h1 class="text-center">
        Todos os Produtos
      </h1>
      <div class="col-3">

        <div class="card" style="width: 18rem;">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Duck_wings_outstretched.jpg/1200px-Duck_wings_outstretched.jpg" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">
          Card title
        </h5>
        <p class="card-text">Some quick example text to build on 
          the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
          
        </div>
        </div>
        
      </div>

       <div class="col-3">

        <div class="card" style="width: 18rem;">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Duck_wings_outstretched.jpg/1200px-Duck_wings_outstretched.jpg" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">
          Card title
        </h5>
        <p class="card-text">Some quick example text to build on 
          the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
          
        </div>
        </div>
        
      </div>
    </div>

  <?php
include 'componentes/footer.php';
?>