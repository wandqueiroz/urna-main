<?php 

function getConnection(){
    try{

        $pdo = new PDO('mysql:host=localhost; dbname=db_vt_servidor_destaque_2021;', 'root', '');
        return $pdo;
    } catch(PDOException $ex) {
        
        echo 'Erro: '.$ex->getMessage();
    }
    
}

?>