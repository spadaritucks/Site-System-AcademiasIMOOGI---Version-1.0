<?php 
include('../config.php');

$idModalidade = $_POST['idModalidadeDel'];

try {
    $stmt = $pdo->prepare("DELETE FROM modalidades WHERE id_modalidades = :id_modalidades");
    $stmt->bindParam(':id_modalidades', $idModalidade, PDO::PARAM_INT);
    $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'Modalidade excluída com sucesso']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro de banco de dados: ' . $e->getMessage()]);
}







?>