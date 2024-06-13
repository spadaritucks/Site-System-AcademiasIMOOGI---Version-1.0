<?php

session_start();

include('../config.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $stmtEmail = $pdo->prepare("SELECT * FROM funcionarios WHERE email = :email");
    $stmtEmail->bindParam(":email", $email);
    $stmtEmail->execute();

    $emailVerification = $stmtEmail->fetch(PDO::FETCH_ASSOC);
    $id = $emailVerification['id_funcionarios']; 

    $stmtSenha = $pdo->prepare("SELECT * FROM senhas_funcionarios WHERE id_funcionarios = :id_funcionarios");
    $stmtSenha->bindParam(":id_funcionarios",$id);
    $stmtSenha->execute();

    $senhaEmailVerification = $stmtSenha->fetch(PDO::FETCH_ASSOC);

    if ($emailVerification && !$senhaEmailVerification) {
        $_SESSION['email'] = $email;
        $_SESSION['emailVerification'] = $emailVerification;
        echo json_encode(['status' => 'email_found']);
        die();
    } else {
        echo json_encode(['status' => 'email_not_found']);
        die();
    }
}

if (isset($_POST['novaSenha'])) {
    $novaSenha = $_POST['novaSenha'];
    $senhaRepetida = $_POST['senha_repetida'];

    if ($novaSenha == $senhaRepetida) {
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $emailVerification = $_SESSION['emailVerification'];
            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $id = $emailVerification['id_funcionarios'];

            if ($emailVerification) {
                $stmtSenha = $pdo->prepare("INSERT INTO senhas_funcionarios (id_funcionarios, senha) VALUES (:id_funcionarios, :senha)");
                $stmtSenha->bindParam(":id_funcionarios", $id);
                $stmtSenha->bindParam(":senha", $senhaHash);
                $stmtSenha->execute();

                echo json_encode(['status' => 'password_created']);
                die();
            } else {
                echo json_encode(['status' => 'session_email_not_set']);
                die();
            }
        }
    }
    echo json_encode(['status' => 'password_not_found']);
    die();
}

if (isset($_POST['cpf']) && isset($_POST['senha']) ) {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $stmt_cpf = $pdo->prepare("SELECT * FROM funcionarios WHERE cpf = :cpf");
    $stmt_cpf->bindParam(":cpf", $cpf);
    $stmt_cpf->execute();

    $cpfVerification = $stmt_cpf->fetch(PDO::FETCH_ASSOC);

    if ($cpfVerification) {
        $id = $cpfVerification['id_funcionarios'];
        $stmt_senha = $pdo->prepare("SELECT senha FROM senhas_funcionarios WHERE id_funcionarios = :id_funcionarios");
        $stmt_senha->bindParam(":id_funcionarios", $id);
        $stmt_senha->execute();

        $senhaVerification = $stmt_senha->fetchColumn();

        if ($senhaVerification && password_verify($senha, $senhaVerification)) {
            $_SESSION['id_funcionarios'] = $cpfVerification['id_funcionarios'];
            $_SESSION['cpf'] = $cpf;
            $_SESSION['senha'] = $senha;
            $_SESSION['foto_funcionario'] = $cpfVerification['foto_funcionario'];
            $_SESSION['nome'] = $cpfVerification['nome'];
            $_SESSION['senha'] = $senha;
            echo json_encode(['status' => 'login_success']);
            die();
        } else {
            echo json_encode(['status' => 'login_failed']);
            die();
        }
    }
    
}

?>