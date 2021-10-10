<?php 

function getConnection(){
    try{

        $pdo = new PDO('mysql:host=localhost; dbname=votacao_serv_dest_2021;', 'root', 'password');
        return $pdo;
    } catch(PDOException $ex) {
        
        echo 'Erro: '.$ex->getMessage();
    }
    
}

?>