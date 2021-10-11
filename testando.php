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
    <div class="section">

        <div class="container">
            <div class="row">
                <div class="col">
                <div class="card text-center ">
                <h5 class="card-title">CONTAGEM DOS VOTOS</h5>
                <div class="card-body">
                    <table class="table table-warning table-striped">
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
            </div>
                </div>
                <div class="col">
                   
                </div>

            </div>
        </div>
</body>

</html>