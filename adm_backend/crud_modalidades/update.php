<?php
include('config.php');


$nomeModalidade = $_POST['nomeModalidadeUp'];
$descricaoModalidade = $_POST['descricaoModalidadeUp'];
$idModalidadeUp = $_POST['idModalidadeUp'];
$tipo_modalidade = $_POST['tipo_modalidade'];

    $stmt = $pdo->prepare("UPDATE modalidades SET nome_modalidade = ?, descricao_modalidade = ?, tipo_modalidades = ? WHERE id_modalidades = ?");
    $result = $stmt-> execute([$nomeModalidade,$descricaoModalidade,$tipo_modalidade,$idModalidadeUp]);

if($result){
    echo json_encode(['success' => true, 'message' => 'Plano atualizado com sucesso']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao atualizar o plano']);
}







?>