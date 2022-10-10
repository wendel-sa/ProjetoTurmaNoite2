<?php
include 'componentes/header.php';
include 'conexao.php';
?>

<div class="row">
    <div class="col">
        <form action="insert.php" method="POST">
            <h1 class="col-md-6 offset-md-2">Escolha:</h1>
            <div class="row pb-4">
                <div class="col-md-6 offset-md-2">
                    <fieldset>
                        <legend>Nome</legend>
                        <input class="form-control-lg" type="text" name="nome" id="nome">
                    </fieldset>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-md-6 offset-md-2">
                    <fieldset>
                        <legend>Raça</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="raca" id="humano" value="humano">
                            <label class="form-check-label" for="humano">
                                Humano
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="raca" id="elfo" value="elfo">
                            <label class="form-check-label" for="elfo">
                                Elfo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="raca" id="anao" value="anao">
                            <label class="form-check-label" for="anao">
                                Anão
                            </label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-2">
                    <fieldset>
                        <legend>Classe</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="classe" id="ladino" value="ladino">
                            <label class="form-check-label" for="ladino">
                                Ladino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="classe" id="mago" value="mago">
                            <label class="form-check-label" for="mago">
                                Mago
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="classe" id="guerreiro" value="guerreiro">
                            <label class="form-check-label" for="guerreiro">
                                Guerreiro
                            </label>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="py-5">
                <button type="submit" class="btn btn-success btn-lg" value="inserir">Cadastrar</button>
            </div>
        </form>

    </div>

    <div class="col h-100">
        <img class="pp h-50" src="https://cdn.pixabay.com/photo/2020/06/29/20/31/man-5354308_1280.png" alt="profile-pic">
    </div>
</div>
<table>
    <tr>
        <th>Nome</th>
        <th>Raça</th>
        <th>Classe</th>
    </tr>
    <?php
    $query = "SELECT * from chars";
    $result = $db->query($query);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td><?php echo $row['nome'] ?></td>
            <td><?php echo $row['raca'] ?></td>
            <td><?php echo $row['classe'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>

</html>