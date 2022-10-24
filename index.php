  <?php
  include "configuracao/conexao.php";
  include 'componentes/header.php';
  ?>

  <div class="py-5">
    <section>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 text-center text-lg-start">
            <h1 class="text-white fs-5 fs-xl-6">
              <span class="fw-bold">PetShop</span>
              Encontre o seu pet ideal aqui!
            </h1>
            <p class="text-white py-lg-3 py-2">
            Eles são graciosos e bons companheiros, mas não apenas isso. Animais de estimação fazem bem à saúde. Eles são capazes de reduzir o estresse, melhorar a autoestima e até mesmo ajudar a prevenir doenças cardíacas.
            </p>
            <div class="d-sm-flex align-items-center gap-3">
              <button class="btn btn-warning mb-3 w-75">Ver animais!</button>
            </div>
          </div>
          <div class="col-lg-6 text-center bg-white rounded p-3">
            <lottie-player src="https://assets6.lottiefiles.com/private_files/lf30_uqcbmc4h.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
          </div>
        </div>
      </div>

    </section>
  </div>


  <section class="pt-5 pt-lg-3 bg-light">

    <div class="container">
      <div class="d-flex flex-column-reverse flex-lg-row">
        <div class="col-lg-6">
          <h1 class="fs-lg-4 fs-md-3 fs-xl-5 mb-5">Animais saúdaveis e com tutores certificados.</h1>
          <ul class="list-unstyled">
            <li class="fs-2 shadow-sm offer-list-item">
              <i class="bi bi-check-circle text-success"></i>
              <span>incentivo aos tutores locais.</span></li>
            <li class="fs-2 shadow-sm offer-list-item">
              <i class="bi bi-check-circle text-success"></i>
              <span>Veja os produtos como ração, brinquedos e etc certificados.</span></li>
          </ul>
        </div>
        <div class="col-lg-6 text-center text-lg-end">
          <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_lb6Gsk.json" background="transparent" speed="1" style="width: 50vw; height: 500px;" loop autoplay></lottie-player>
        </div>
      </div>
    </div>
    <!-- end of .container-->

  </section>

  <?php
  include 'componentes/footer.php';
  ?>