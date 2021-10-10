<?php 
header('Content-Type: application/json');

include("./conn.php");

$conn = getConnection();

/* $numero = $_POST['numero'];*/
$numero = $_POST['numero'];
$nome = $_POST['nome'];
$setor = $_POST['setor'];


$stmt = $conn->prepare('INSERT INTO contagem_votos (nome, setor, numero) VALUES (:nome, :setor, :numero)');
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':setor', $setor);
$stmt->bindValue(':numero', $numero);
$stmt->execute();

if($stmt->rowCount() >=1){
    echo ('Dados salvos com sucesso!');
}else {
    echo ('Falha ao salvar os dados');
}

$this->$conn = '';

?>