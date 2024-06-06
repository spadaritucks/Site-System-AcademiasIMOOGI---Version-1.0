<?php
header('Content-Type: application/json');
include("config.php");

// Prepare and execute the SQL query
$stmt = $pdo->prepare('SELECT * FROM planos');
$stmt->execute();

// Check if the query returned any rows
if($stmt->rowCount() >= 1){
    // Fetch all rows as an associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Output the result as JSON
    echo json_encode($result);
} else {
    // If no rows were returned, output an error message
    echo json_encode('Falha ao selecionar os dados');
}
?>
