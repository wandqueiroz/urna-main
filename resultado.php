<?php
header("Refresh:3");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/resultadoStyle.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d8e2fcabdf.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" type="imagex/png" href="./images/brasao.png">
    <title>Servidor Destaque SDHDS/2021</title>
</head>

<body>
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright: COTIC/SDHDS
        </div>
        <!-- Copyright -->
    </footer>
    <div class="container-fluid">
        <div class="header">
            <img class="rounded mx-auto d-block" src="./Images/sd2.svg">
        </div>
        <div class="section text-center">
            <h1 class="title-site">ELEIÇÃO SERVIDOR DESTAQUE</h1>

            <div class="footer">
                <button type="button" class="btn btn-success" title="Imprimir" id="btnexample" onclick="funcao_pdf()"><i class="fas fa-print"></i></button>
            </div>

            <div class="container text-center">
                <div class="row">
                    <div class="col" id="table-pdf">

                        <h5>CONTAGEM DOS VOTOS</h5>

                        <table class="table table-striped">
                            <tr>
                                <th>NÚMERO</th>
                                <th>NOME</th>
                                <th>SETOR</th>
                                <th>VOTOS</th>
                            </tr>
                            <?php
                            include("./database/conn.php");

                            $conn = getConnection();
                            $stmt = $conn->prepare('SELECT nome, setor, numero, COUNT(nome) AS votos FROM contagem_votos GROUP BY nome ORDER BY votos DESC');
                            $stmt->execute();
                            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            for ($i = 0; count($dados) > $i; $i++) {

                            ?>
                                <tr>
                                    <td><?php echo $dados[$i]['numero']; ?></td>
                                    <td><?php echo $dados[$i]['nome']; ?></td>
                                    <td><?php echo $dados[$i]['setor']; ?></td>
                                    <td><?php echo $dados[$i]['votos']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>

                    </div>

                    <div class="col">
                        <h5>RANKING DE VOTOS</h5>
                        <?php

                        for ($i = 0; count($dados) > $i; $i++) {

                        ?>
                            <div class="container">

                                <div class="row row-text-left">
                                    <div class="col-2">
                                        <img class="img-thumbnail" alt="<?php echo $dados[$i]['nome'] ?>" src="./Images/<?php echo $dados[$i]['numero'] ?>.jpg">
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h6><?php echo $dados[$i]['numero']; ?> - <?php echo $dados[$i]['nome']; ?> - <?php echo $dados[$i]['setor']; ?> </h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="progress" style="height: 40px;">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $dados[$i]['votos']; ?>%;" aria-valuenow="<?php echo $dados[$i]['votos']; ?>" aria-valuemin="0" aria-valuemax="3000"><strong><?php echo $dados[$i]['votos']; ?> VOTOS</strong></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <br>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <script src="js/gerarPDF.js"></script>
</body>

</html>