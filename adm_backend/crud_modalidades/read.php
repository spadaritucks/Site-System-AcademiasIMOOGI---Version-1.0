<?php
header('Content-Type: application/json');

include('config.php');

try {
    $stmtArtesMarciais = $pdo->prepare("SELECT * FROM modalidades WHERE tipo_modalidades = 'Artes Marciais'");
    $stmtArtesMarciais->execute();

    $resultArtesMarciais = $stmtArtesMarciais->fetchAll(PDO::FETCH_ASSOC);

    $stmtDança = $pdo->prepare("SELECT * FROM modalidades WHERE tipo_modalidades = 'Dança'");
    $stmtDança->execute();

    $resultDança = $stmtDança->fetchAll(PDO::FETCH_ASSOC);

    $result = [
        'ArtesMarciais' => $resultArtesMarciais,
        'Danca' => $resultDança,
    ];


    echo json_encode($result);
} catch (PDOException $e) {
    // Tratar erros de banco de dados
    echo json_encode(['error' => 'Erro de banco de dados: ' . $e->getMessage()]);
}
?>
