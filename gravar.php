<?php 
header('Content-Type: application/json');

/* $numero = $_POST['numero'];*/
$numero = $_POST['numero'];
$nome = $_POST['nome'];
$setor = $_POST['setor'];

$pdo = new PDO('mysql:host=localhost; dbname=votacao_serv_dest_2021;', 'root', 'password');

$stmt = $pdo->prepare('INSERT INTO contagem_votos (nome, setor, numero) VALUES (:nome, :setor, :numero)');
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':setor', $setor);
$stmt->bindValue(':numero', $numero);
$stmt->execute();

if($stmt->rowCount() >=1){
    echo json_encode('Dados salvos com sucesso!');
}else {
    echo json_encode('Falha ao salvar os dados');
}

echo $numero;
echo $nome;
echo $setor;

?>