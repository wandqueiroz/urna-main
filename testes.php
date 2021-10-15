<?php 

/* include("./database/conn.php");

$conn = getConnection();

/* $numero = $_POST['numero'];
$numero = 55;
$nome = 'JOAO BALBINO';
$setor = 'TRANSPORTE';


$stmt = $conn->prepare('INSERT INTO contagem_votos (nome, setor, numero) VALUES (:nome, :setor, :numero)');
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':setor', $setor);
$stmt->bindValue(':numero', $numero);


$i = 1;
while( $i < 8){
    $stmt->execute();
    $i++;
    echo($i);
}
 */


echo($_SERVER['SERVER_ADDR'])

?>