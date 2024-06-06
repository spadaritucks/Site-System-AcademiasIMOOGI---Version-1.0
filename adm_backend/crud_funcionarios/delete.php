<?php

include("config.php");

try {
    $id_funcionarios = $_POST['id_funcionarios'];

    $stmtFuncionarios = $pdo->prepare("DELETE FROM funcionarios WHERE id_funcionarios = :id_funcionarios");
    $stmtFuncionarios->bindParam(":id_funcionarios", $id_funcionarios, PDO::PARAM_INT);

    $stmtDadosFuncionarios = $pdo->prepare("DELETE FROM dados_funcionario WHERE id_funcionarios = :id_funcionarios");
    $stmtDadosFuncionarios->bindParam(':id_funcionarios', $id_funcionarios, PDO::PARAM_INT);

    $stmtHorariosFuncionarios = $pdo->prepare("DELETE FROM horarios_funcionarios WHERE id_funcionarios = :id_funcionarios");
    $stmtHorariosFuncionarios->bindParam(":id_funcionarios", $id_funcionarios, PDO::PARAM_INT);

    $stmtSenhasFuncionarios = $pdo->prepare("DELETE FROM senhas_funcionarios WHERE id_funcionarios = :id_funcionarios");
    $stmtSenhasFuncionarios->bindParam(":id_funcionarios", $id_funcionarios, PDO::PARAM_INT);

    $stmtSenhasFuncionarios->execute();
    $stmtDadosFuncionarios->execute();
    $stmtHorariosFuncionarios->execute();
    $stmtFuncionarios->execute();
   

    echo json_encode(['success' => true, 'message' => 'Usuario excluído com sucesso']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro de banco de dados: ' . $e->getMessage()]);
}
