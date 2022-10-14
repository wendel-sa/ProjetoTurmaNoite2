<?php
include '../componentes/header.php';
include '../configuracao/conexao.php';

$id = $_GET['u_id'];

//fazer um select na tabela produtos
$sql = "SELECT * FROM produtos WHERE Id= $id";

//executar o select em pdo

$resultado = $db->query($sql);
while ($item = $resultado->fetchArray()) {

?>
    <!-- Product section-->
    <section>
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 shadow rounded" src="<?php echo $item['imagem'] ?>" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?php echo
                                                    $item['nome']; ?>
                    </h1>
                    <div class="fs-5 mb-5">

                        <h2>R$ <?php echo $item['preco']; ?></h2>
                    </div>
                    <p class="lead"> <?php echo $item['descricao']; ?></p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" min="1" style="max-width: 6rem" />
                        <div class="row gx-1 d-flex justify-content-between me-2">
                            <div class="col-sm-2">
                                <button class="btn btn-primary rounded-3 custom-btn px-2">Comprar</button></a>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary rounded-3 custom-btn px-3"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <main class="container">
            <!--Produtos-->
            <section id="produtos">

                <!--Medicamentos-->
                <div class="accordion mb-5" id="accordionExample">
                    <div class="accordion-item">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <img src="https://cdn-icons-png.flaticon.com/512/4383/4383360.png" alt="icon" class="px-2 img-responsive custom-logo w-auto" height="90">
                            <h2 class="accordion-header" id="headingOne">Medicamentos</h2>
                        </button>

                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <?php
                                $todosMedicamentos = "SELECT * FROM produtos WHERE tipo ='Medicamento'";
                                $Medicamentos = $db->query($todosMedicamentos);
                                ?>

                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    <?php
                                    while ($medicamento = $Medicamentos->fetchArray()) {
                                    ?>
                                        <div class="col">
                                            <div class="card h-100 shadow custom-card">
                                                <img src="<?php echo $medicamento['imagem'] ?>" alt="Medicamento" class="card-img-top w-100 custom-bg">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $medicamento['nome'] ?> </h4>
                                                </div>
                                                <div class="card-footer custom-footer d-flex align-items-center justify-content-between mb-3">
                                                    <div class="float-start">
                                                        <h4 class="custom-highlight mb-0">R$<?php echo $medicamento['preco'] ?></h4>
                                                    </div>
                                                    <div class="row gx-1 d-flex justify-content-between me-2">
                                                        <div class="col-sm-2">
                                                            <a href="../produtos/item.php?u_id=<?php echo $medicamento['id'] ?>"><button class="btn btn-primary rounded-3 custom-btn px-2">Comprar</button></a>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button class="btn btn-primary rounded-3 custom-btn px-3"><i class="fas fa-shopping-cart"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Vitaminas-->
                <div class="accordion mb-5" id="accordionExample">
                    <div class="accordion-item">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <img src="https://cdn-icons-png.flaticon.com/512/3159/3159839.png" alt="icon" class="px-2 img-responsive custom-logo w-auto" height="90">
                            <h2 class="accordion-header" id="headingTwo">Vitaminas</h2>
                        </button>

                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <?php
                                $todosVitaminas = "SELECT * FROM produtos WHERE tipo ='Vitamina'";
                                $Vitaminas = $db->query($todosVitaminas);
                                ?>

                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-2">
                                    <?php
                                    while ($vitamina = $Vitaminas->fetchArray()) {
                                    ?>
                                        <div class="col">
                                            <div class="card h-100 shadow custom-card">
                                                <img src="<?php echo $vitamina['imagem'] ?>" alt="<?php echo $vitamina['nome'] ?>" class="card-img-top w-100 custom-bg">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $vitamina['nome'] ?></h4>
                                                </div>
                                                <div class="card-footer custom-footer d-flex align-items-center justify-content-between mb-3">
                                                    <div class="float-start">
                                                        <h4 class="custom-highlight mb-0">R$<?php echo $vitamina['preco'] ?></h4>
                                                    </div>
                                                    <div class="row gx-1 d-flex justify-content-between me-2">
                                                        <div class="col-sm-2">
                                                            <a href="../produtos/item.php?u_id=<?php echo $vitamina['id'] ?>"><button class="btn btn-primary rounded-3 custom-btn px-2">Comprar</button></a>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button class="btn btn-primary rounded-3 custom-btn px-3"><i class="fas fa-shopping-cart"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Cuidados-->
                <div class="accordion mb-5" id="accordionExample">
                    <div class="accordion-item">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <img src="https://cdn-icons-png.flaticon.com/512/3993/3993693.png" alt="icon" class="px-2 img-responsive custom-logo w-auto" height="90">
                            <h2 class="accordion-header ps-2" id="headingThree">Cuidados Pessoais</h2>
                        </button>

                        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <?php
                                $todosCuidados = "SELECT * FROM produtos WHERE tipo ='Cuidados Pessoais'";
                                $Cuidados = $db->query($todosCuidados);
                                ?>

                                <div class="row row-cols-1 row-cols-md-3 g-4 mb-2">
                                    <?php
                                    while ($cuidado = $Cuidados->fetchArray()) {
                                    ?>
                                        <div class="col">
                                            <div class="card h-100 shadow custom-card">
                                                <img src="<?php echo $cuidado['imagem'] ?>" alt="<?php echo $cuidado['nome'] ?>" class="card-img-top w-100 custom-bg">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $cuidado['nome'] ?></h4>
                                                </div>
                                                <div class="card-footer custom-footer d-flex align-items-center justify-content-between mb-3">
                                                    <div class="float-start">
                                                        <h4 class="custom-highlight mb-0">R$<?php echo $cuidado['preco'] ?></h4>
                                                    </div>
                                                    <div class="row gx-1 d-flex justify-content-between me-2">
                                                        <div class="col-sm-2">
                                                            <a href="../produtos/item.php?u_id=<?php echo $cuidado['id'] ?>"><button class="btn btn-primary rounded-3 custom-btn px-2">Comprar</button></a>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button class="btn btn-primary rounded-3 custom-btn px-3"><i class="fas fa-shopping-cart"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </section>
    <!-- Related items section-->
    <section class="py-2 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Produtos Relacionados</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->

                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->

                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Fancy Product</h5>
                                <!-- Product price-->
                                $40.00 - $80.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver opções</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Promoção</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="<?php echo $todosMedicamentos['imagem'] ?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Item especial</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Adicionar ao carrinho</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Promoção</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Item à venda</h5>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$50.00</span>
                                $25.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Adicionar ao carrinho</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Mais itens para você</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                $40.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção dos comentarios-->
    <h2 class="text-center">Sessão de comentários</h2>
    <div class="row">
        <div class="col-2">
            <input type="text">
        </div>
        <div class="col-2">
            <button class="btn btn-secondary" type="submit">Enviar</button>
        </div>
    </div>
<?php
}
include '../componentes/footer.php'
?>