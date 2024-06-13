<?php
include('../config.php');

header('Content-Type: application/json');

$idPlano = $_POST['idPlano'];
$updateNome = $_POST['updateNome'];
$updateDuracao = $_POST['updateDuracao'];
$updateModalidades = $_POST['updateModalidades'];
$updateValor = $_POST['updateValor'];
$status_plano_update = $_POST["status_plano_update"];

$stmt = $pdo->prepare('UPDATE planos SET nome_plano= ?, duracao_plano = ?, num_modalidades = ?, valor_plano = ?, status_plano = ? WHERE id_planos = ?');
$result = $stmt->execute([$updateNome, $updateDuracao, $updateModalidades, $updateValor,$status_plano_update, $idPlano]);

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Plano atualizado com sucesso']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao atualizar o plano']);
}

?>