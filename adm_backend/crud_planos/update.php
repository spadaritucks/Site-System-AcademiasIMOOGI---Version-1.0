<?php
include('config.php');
header('Content-Type: application/json');

$idPlano = $_POST['idPlano'];
$updateNome = $_POST['updateNome'];
$updateDuracao = $_POST['updateDuracao'];
$updateModalidades = $_POST['updateModalidades'];
$updateValor = $_POST['updateValor'];
$update_pagamento = $_POST["update_pagamento"];

$stmt = $pdo->prepare('UPDATE planos SET nome_plano= ?, duracao_plano = ?, num_modalidades = ?, valor_plano = ?, link_pagamento = ? WHERE id_planos = ?');
$result = $stmt->execute([$updateNome, $updateDuracao, $updateModalidades, $updateValor,$update_pagamento, $idPlano]);

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Plano atualizado com sucesso']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao atualizar o plano']);
}

?>