<?php
header('Content-Type: application/json');
include('config.php');

try {

    $stmtDia_semana = $pdo->prepare("SELECT * FROM dia_semana_funcionarios");
    $stmtDia_semana->execute();
    $resultDia_semana = $stmtDia_semana->fetchAll(PDO::FETCH_ASSOC);

    $stmtFuncionarios = $pdo->prepare("SELECT * FROM funcionarios");
    $stmtFuncionarios->execute();
    $resultFuncionarios = $stmtFuncionarios->fetchAll(PDO::FETCH_ASSOC);

    $stmtDadosFuncionario = $pdo->prepare("SELECT * FROM dados_funcionario");
    $stmtDadosFuncionario->execute();
    $resultDadosFuncionario = $stmtDadosFuncionario->fetchAll(PDO::FETCH_ASSOC);

    $stmtHorariosFuncionario = $pdo->prepare("SELECT * FROM horarios_funcionarios");
    $stmtHorariosFuncionario->execute();
    $resultHorariosFuncionario = $stmtHorariosFuncionario->fetchAll(PDO::FETCH_ASSOC);
    

    $result = [

        'dia_semana' => $resultDia_semana,
        'funcionarios' => $resultFuncionarios,
        'dados_funcionarios' => $resultDadosFuncionario,
        'horarios_funcionarios' => $resultHorariosFuncionario
    ];

    echo json_encode($result);

}catch (PDOException $e) {
    echo 'erro em listar os dados' . $e;
}
