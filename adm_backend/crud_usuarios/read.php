<?php
header('Content-Type: application/json');
include('../config.php');
try {
    
    $stmtUsuarios = $pdo->prepare("SELECT * FROM usuarios");
    $stmtUsuarios->execute();
    $usuarios = $stmtUsuarios->fetchAll(PDO::FETCH_ASSOC);

   
    $stmtContratos = $pdo->prepare("SELECT contratos.*, planos.nome_plano AS nome_plano 
                                    FROM contratos
                                    INNER JOIN planos ON contratos.id_planos = planos.id_planos");
    $stmtContratos->execute();
    $contratos = $stmtContratos->fetchAll(PDO::FETCH_ASSOC);

    $stmtModalidades = $pdo->prepare("SELECT usuario_modalidade. *, modalidades.nome_modalidade AS nome_modalidade FROM 
    usuario_modalidade INNER JOIN modalidades ON modalidades.id_modalidades = usuario_modalidade.id_modalidades");
    $stmtModalidades->execute();
    $modalidades = $stmtModalidades->fetchAll(PDO::FETCH_ASSOC);


    

    // Montar o resultado final
    $result = [
        'usuarios' => $usuarios,
        'contratos' => $contratos,
        'modalidades' => $modalidades
    ];

    // Retornar como JSON
    echo json_encode($result);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro de banco de dados: ' . $e->getMessage()]);
}
?>
