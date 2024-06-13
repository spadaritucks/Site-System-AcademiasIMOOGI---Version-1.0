<?php

session_start();

include('../config.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $sql_usuarios = "SELECT * FROM usuarios WHERE email = :email";
    $stmt_usuarios = $pdo->prepare($sql_usuarios);
    $stmt_usuarios->bindParam(':email', $email);
    $stmt_usuarios->execute();

    $user = $stmt_usuarios->fetch(PDO::FETCH_ASSOC);
    $id = $user['id_usuarios'];

    $stmtSenha = $pdo->prepare("SELECT senha FROM senhas_usuarios WHERE id_usuarios = :id");
    $stmtSenha->bindParam(":id", $id);
    $stmtSenha->execute();

    $senhaEmailVerification = $stmtSenha->fetch(PDO::FETCH_ASSOC);

    if ($user && !$senhaEmailVerification) {
        $_SESSION['email'] = $email;
        $_SESSION['user'] = $user;
        echo json_encode(['status' => 'existing_user']);
        die();
    } else {
        echo json_encode(['status' => 'email_not_found']);
        die();
    }
}

if (isset($_POST['novaSenha'])) {

    $novaSenha = $_POST['novaSenha'];
    $senhaRepetida = $_POST['senhaRepetida'];

    if ($novaSenha == $senhaRepetida) {
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $user = $_SESSION['user'];
            $id_usuarios = $user['id_usuarios'];
            $hashedPassword = password_hash($novaSenha, PASSWORD_DEFAULT);

            $sql_insert = "INSERT INTO senhas_usuarios(id_usuarios, senha) VALUES (:id, :senha)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->bindParam(':id', $id_usuarios);
            $stmt_insert->bindParam(':senha', $hashedPassword);
            $stmt_insert->execute();

            echo json_encode(['status' => 'password_created']);
            die();
        } else {
            echo json_encode(['status' => 'session_email_not_set']);
            die();
        }
    } else {
        echo json_encode(['status' => 'password_mismatch']);
        die();
    }
}



if (isset($_POST['cpf']) && isset($_POST['senha'])) {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql_usuarios = "SELECT * FROM usuarios WHERE cpf = :cpf";
    $stmt_usuarios = $pdo->prepare($sql_usuarios);
    $stmt_usuarios->bindParam(':cpf', $cpf);
    $stmt_usuarios->execute();
    $user = $stmt_usuarios->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $sql_senha_usuario = "SELECT senha FROM senhas_usuarios WHERE id_usuarios = :id";
        $stmt_senha_usuario = $pdo->prepare($sql_senha_usuario);
        $stmt_senha_usuario->bindParam(':id', $user['id_usuarios']);
        $stmt_senha_usuario->execute();
        $senha_armazenada = $stmt_senha_usuario->fetchColumn();


        if (password_verify($senha, $senha_armazenada)) {

            $stmtPlanoUsuario = $pdo->prepare("SELECT contratos.*, planos.nome_plano AS nome_plano 
            FROM contratos
            INNER JOIN planos ON contratos.id_planos = planos.id_planos WHERE id_usuarios = :id_usuarios");
            $stmtPlanoUsuario->bindParam(":id_usuarios", $user['id_usuarios']);
            $stmtPlanoUsuario->execute();
            $contratos = $stmtPlanoUsuario->fetch(PDO::FETCH_ASSOC);

            $stmtModalidadeUsuario = $pdo->prepare("SELECT usuario_modalidade.*,modalidades.nome_modalidade AS nome_modalidade
            FROM usuario_modalidade INNER JOIN modalidades ON usuario_modalidade.id_modalidades = modalidades.id_modalidades
            WHERE id_usuarios = :id_usuarios");
            $stmtModalidadeUsuario->bindParam(":id_usuarios", $user['id_usuarios'] );
            $stmtModalidadeUsuario->execute();
            $modalidades = $stmtModalidadeUsuario->fetchAll(PDO::FETCH_ASSOC);

           

            $_SESSION['foto_usuario'] = $user['foto_usuario'];
            $_SESSION['id_usuarios'] = $user['id_usuarios'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['cpf'] = $user['cpf'];
            $_SESSION['contratos'] = $contratos['nome_plano'];
            $_SESSION['data_inicio'] = $contratos['data_inicio'];
            $_SESSION['data_renovacao'] = $contratos['data_renovacao'];
            $_SESSION['data_validade'] = $contratos['data_validade'];
            $_SESSION['senha'] = $senha;
            $_SESSION['modalidades'] = [];
            foreach ($modalidades as $mod) {
                $_SESSION['modalidades'][] = $mod['nome_modalidade'];
                if (count($_SESSION['modalidades']) >= 2) {
                    break; // Garantir que no máximo duas modalidades sejam armazenadas
                }
            }
            
           

            echo json_encode(['status' => 'login_user']);
            die();
        } else {
            echo json_encode(['status' => 'login_fail']);
            die();
        }
    } else {

        echo json_encode(['status' => 'login_failed']);
        die();
    }
}
