<?php

include('config.php');

try{
    
$id_usuarios = $_POST['id_usuarios'];

$stmtContratos = $pdo->prepare("DELETE FROM contratos WHERE id_usuarios = :id_usuarios");
$stmtContratos->bindParam(':id_usuarios', $id_usuarios, PDO::PARAM_INT);

$stmtModalidades = $pdo->prepare("DELETE FROM usuario_modalidade WHERE id_usuarios = :id_usuarios");
$stmtModalidades->bindParam(':id_usuarios', $id_usuarios, PDO::PARAM_INT);

$stmtUsuarios = $pdo->prepare("DELETE FROM usuarios WHERE id_usuarios = :id_usuarios");
$stmtUsuarios->bindParam(':id_usuarios', $id_usuarios, PDO::PARAM_INT);

$stmtSenhas = $pdo->prepare("DELETE FROM senhas_usuarios WHERE id_usuarios = :id_usuarios");
$stmtSenhas->bindParam(":id_usuarios", $id_usuarios, PDO::PARAM_INT);




$stmtContratos->execute();
$stmtModalidades->execute();
$stmtSenhas->execute();
$stmtUsuarios->execute();

echo json_encode(['success' => true, 'message' => 'Usuario excluído com sucesso']);
}catch(PDOException $e){
    echo json_encode(['success' => false, 'message' => 'Erro de banco de dados: ' . $e->getMessage()]);
}



?>