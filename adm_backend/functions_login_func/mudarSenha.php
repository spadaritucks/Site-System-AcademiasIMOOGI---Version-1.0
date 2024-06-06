<?php
include("config.php");

session_start();

$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

// Verifica se o ID do funcionário está definido na sessão
if(isset($_SESSION['id_funcionarios'])){
    $id_funcionarios = $_SESSION['id_funcionarios'];
    // Use a comparação correta para verificar se as senhas coincidem
    if($newPassword === $confirmPassword){
        $senhaHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmtNovaSenha = $pdo->prepare("UPDATE senhas_funcionarios SET senha = ? WHERE id_funcionarios = ?");
        $stmtNovaSenha->execute([$senhaHash,$id_funcionarios]);

        echo json_encode(['status' => 'password_altered']);
    }else{
        echo json_encode(['status' => 'password_mismatch']);
    }
} else {
    echo json_encode(['status' => 'id_not_found']);
}
?>
