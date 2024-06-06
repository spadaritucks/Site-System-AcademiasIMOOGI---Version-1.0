<?php 

try{
    $pdo = new PDO('mysql:dbname=imoogi_database;host=localhost;','root','titi9632');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'Erro ao se conectar ao banco de dados ' .$e;
}

?>