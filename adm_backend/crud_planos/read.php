<?php
header('Content-Type: application/json');
include('../config.php');

try{

    $stmtAtivo = $pdo->prepare("SELECT * FROM planos WHERE status_plano = 'ativo'");
    $stmtAtivo->execute();
    $resultAtivo = $stmtAtivo->fetchAll(PDO::FETCH_ASSOC);
    
    $stmtInativo = $pdo->prepare("SELECT * FROM planos WHERE status_plano = 'inativo'");
    $stmtInativo->execute();
    $resultInativo = $stmtInativo->fetchAll(PDO::FETCH_ASSOC);
    
    $result = [
    
        'PlanosAtivos' => $resultAtivo,
        'PlanosInativos' => $resultInativo
    ];
    
    echo json_encode($result);
}catch(PDOException $e){
   echo json_encode("Falha na listagem " .$e->getMessage());
}

?>
