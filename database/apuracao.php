<?php 
require __DIR__ . './conn.php';


function getApuracao(){
    $conn = getConnection();
    $stmt = $conn->prepare('SELECT nome, setor, numero, COUNT(nome) AS votos FROM contagem_votos GROUP BY nome ORDER BY votos DESC;');
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $dados;

    
}

?>