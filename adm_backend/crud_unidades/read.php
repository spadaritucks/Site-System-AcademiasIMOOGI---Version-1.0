<?php
header('Content-Type: application/json');
include('../config.php');

try{
    $stmtUnidades = $pdo->prepare("SELECT * FROM unidades");
    $stmtUnidades->execute();
    $unidade = $stmtUnidades->fetchAll(PDO::FETCH_ASSOC);

    $stmtRecursos = $pdo->prepare("SELECT * FROM recursos_unidades");
    $stmtRecursos->execute();
    $recursos = $stmtRecursos->fetchAll(PDO::FETCH_ASSOC);

    $result = [
        'unidades' => $unidade,
        'recursos' => $recursos
    ];
    echo json_encode($result);
}catch(PDOException $e){
    echo json_encode("Erro ao listar os dados" .$e->getMessage());
}




?>