<?php
include "../configuracao/conexao.php";
include "../componentes/header.php";
?>

<div class="cards bg-2">
    <div class="framework-card">
        <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_h8chtt4u.json" background="transparent" speed="1" class="img" loop autoplay></lottie-player>
        <p>Dogs</p>
    </div>
    <div class="framework-card">
        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_tr1pjkop.json" background="transparent" speed="1" class="img" loop autoplay></lottie-player>
        <p>Gatos</p>
    </div>
    <div class="framework-card">
        <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_lmsysoyy.json" background="transparent" speed="1" class="img" loop autoplay></lottie-player>
        <p>Pássaros</p>
    </div>
    <div class="framework-card">
        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_9tnkyafk.json" background="transparent" speed="1" class="img" loop autoplay></lottie-player>
        <p>Roedores</p>
    </div>
    <div class="framework-card">
        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_vsozaneb.json" background="transparent" speed="1" class="img" loop autoplay></lottie-player>
        <p>Tartarugas</p>
    </div>
</div>

<div class="px-5 px-5-" id="custom-cards">
    <h3 class="pt-5 text-white">Cães</h3>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <?php
        $sql = "SELECT * FROM produtos WHERE tipo = 'cachorro'";
        $resultado = $db->query($sql);
        while ($item = $resultado->fetchArray(SQLITE3_ASSOC)) {
        ?>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo $item['imagem']; ?>'); background-size: cover;  background-position: center;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 bg-gradiente">
                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                            <?php
                            echo $item['nome'];
                            ?>
                        </h3>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center me-3">
                                R$
                                <small>
                                    <?php
                                    echo $item['preco'];
                                    ?>
                                </small>
                            </li>
                            <li class="d-flex align-items-center">
                                <a href="../produtos/item.php?u_id=<?php echo $item['id']; ?>
                          " class="btn btn-outline-light">
                                    Ver mais
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </div>

    <h3 class="pt-5 text-white">Gatos</h3>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <?php
        $sql = "SELECT * FROM produtos WHERE tipo = 'gato'";
        $resultado = $db->query($sql);
        while ($item = $resultado->fetchArray(SQLITE3_ASSOC)) {
        ?>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo $item['imagem']; ?>'); background-size: cover;  background-position: center;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 bg-gradiente">
                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                            <?php
                            echo $item['nome'];
                            ?>
                        </h3>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center me-3">
                                R$
                                <small>
                                    <?php
                                    echo $item['preco'];
                                    ?>
                                </small>
                            </li>
                            <li class="d-flex align-items-center">
                                <a href="../produtos/item.php?u_id=<?php echo $item['id']; ?>
                          " class="btn btn-outline-light">
                                    Ver mais
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </div>

    <h3 class="pt-5 text-white">Pássaros</h3>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <?php
        $sql = "SELECT * FROM produtos WHERE tipo = 'Aves'";
        $resultado = $db->query($sql);
        while ($item = $resultado->fetchArray(SQLITE3_ASSOC)) {
        ?>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo $item['imagem']; ?>'); background-size: cover;  background-position: center;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 bg-gradiente">
                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                            <?php
                            echo $item['nome'];
                            ?>
                        </h3>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center me-3">
                                R$
                                <small>
                                    <?php
                                    echo $item['preco'];
                                    ?>
                                </small>
                            </li>
                            <li class="d-flex align-items-center">
                                <a href="../produtos/item.php?u_id=<?php echo $item['id']; ?>
                          " class="btn btn-outline-light">
                                    Ver mais
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </div>



    <h3 class="pt-5 text-white">Tartarugas</h3>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <?php
        $sql = "SELECT * FROM produtos WHERE tipo = 'Tartaruga'";
        $resultado = $db->query($sql);
        while ($item = $resultado->fetchArray(SQLITE3_ASSOC)) {
        ?>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo $item['imagem']; ?>'); background-size: cover;  background-position: center;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 bg-gradiente">
                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                            <?php
                            echo $item['nome'];
                            ?>
                        </h3>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center me-3">
                                R$
                                <small>
                                    <?php
                                    echo $item['preco'];
                                    ?>
                                </small>
                            </li>
                            <li class="d-flex align-items-center">
                                <a href="../produtos/item.php?u_id=<?php echo $item['id']; ?>
                          " class="btn btn-outline-light">
                                    Ver mais
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </div>

    

    <h3 class="pt-5 text-white">Roedores
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <?php
        $sql = "SELECT * FROM produtos WHERE tipo = 'Roedores'";
        $resultado = $db->query($sql);
        while ($item = $resultado->fetchArray(SQLITE3_ASSOC)) {
        ?>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo $item['imagem']; ?>'); background-size: cover;  background-position: center;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1 bg-gradiente">
                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                            <?php
                            echo $item['nome'];
                            ?>
                        </h3>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center me-3">
                                R$
                                <small>
                                    <?php
                                    echo $item['preco'];
                                    ?>
                                </small>
                            </li>
                            <li class="d-flex align-items-center">
                                <a href="../produtos/item.php?u_id=<?php echo $item['id']; ?>
                          " class="btn btn-outline-light">
                                    Ver mais
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </div>
</div>

<?php
include "../componentes/footer.php";
?>