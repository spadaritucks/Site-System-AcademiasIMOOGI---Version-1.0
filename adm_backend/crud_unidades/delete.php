<?php

include('../config.php');

$id_delete = $_POST['id_delete'];

try {
    $stmt = $pdo->prepare("DELETE FROM unidades WHERE id_unidades = :id_unidades");
    $stmt->bindParam(":id_unidades", $id_delete);
    $result = $stmt->execute();

    echo json_encode("Dados deletados com sucesso");
} catch (PDOException $e) {
    echo json_encode("Falha ao deletar os dados" . $e->getMessage());
}
