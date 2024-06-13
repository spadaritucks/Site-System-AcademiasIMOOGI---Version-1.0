<?php
include('../config.php');

//Excluir dados no Banco de Dados
$idPlanoDelete = $_POST['idPlanoDelete'];

try{
    
$stmt = $pdo->prepare("DELETE FROM planos WHERE id_planos = :id_planos" );
$stmt->bindParam(":id_planos",$idPlanoDelete, PDO::PARAM_INT);

$result = $stmt->execute();


}catch(PDOException $e){

    echo 'erro de banco de dados : ' .$e->getMessage();
}



?>
