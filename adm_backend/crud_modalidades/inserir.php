<?php

include('config.php');

$nomeModalidade = $_POST['nomeModalidade'];
$descricaoModalidade = $_POST['descricaoModalidade'];
$tipo_modalidade = $_POST['tipo_modalidade'];

$stmt = $pdo->prepare("INSERT INTO modalidades(nome_modalidade,descricao_modalidade,tipo_modalidades) VALUES(:nomeModalidade, :descricaoModalidade, :tipo_modalidades)");

$stmt->bindParam(':nomeModalidade', $nomeModalidade, PDO::PARAM_STR);
$stmt->bindParam(':descricaoModalidade', $descricaoModalidade, PDO::PARAM_STR);
$stmt->bindParam(':tipo_modalidades', $tipo_modalidade, PDO::PARAM_STR);

$result = $stmt->execute();

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Modalidade inserida com sucesso']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao inserir a modalidade']);
}




?>