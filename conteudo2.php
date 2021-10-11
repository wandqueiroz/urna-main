<?php header("Refresh: 3");
include("./database/conn.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />



    <link rel="stylesheet" href="css/resultadoStyle.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




    <title>Servidor Destaque SDHDS/2021</title>
</head>

<body>


    <div class="container-fluid">

        <div class="card text-center swiper-slide">
            <h5 class="card-title">CONTAGEM DOS VOTOS 2</h5>
            <div class="card-body">

                <?php

                

                $conn = getConnection();
                $stmt = $conn->prepare('SELECT nome, setor, numero, COUNT(nome) AS votos FROM contagem_votos GROUP BY nome ORDER BY votos DESC');
                $stmt->execute();
                $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                for ($i = 0; count($dados) > $i; $i++) {

                ?>

                    <div class="container swiper-slide">
                        <div class="row row-cols-4">
                            <div class="col-sm-2">
                                <img class="img-thumbnail" alt="<?php echo $dados[$i]['nome'] ?>" src="./Images/<?php echo $dados[$i]['numero'] ?>.jpg">
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-8 col-sm-6">
                                        <h6><?php echo $dados[$i]['numero']; ?> - <?php echo $dados[$i]['nome']; ?> - <?php echo $dados[$i]['setor']; ?> </h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 col-sm-12">
                                        <div class="progress" style="height: 40px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $dados[$i]['votos']; ?>%;" aria-valuenow="<?php echo $dados[$i]['votos']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $dados[$i]['votos']; ?>"><strong><?php echo $dados[$i]['votos']; ?> VOTOS</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </br>

                <?php } ?>


            </div>


        </div>
    </div>
</body>

</html>