<?php

include('../config.php');

try {
    // Recebendo os dados do formulário
    $id_usuarios = $_POST['id_usuarios'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $rg = $_POST['rg'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $plano = $_POST['planosArea'];
    $modalidades = array_unique(array_slice($_POST['modalidadesArea'], 0, 2)); // Garantir que no máximo duas modalidades únicas sejam inseridas
    $data_inicio = $_POST['data_inicio'];
    $data_renovacao = $_POST['data_renovacao'];
    $data_validade = $_POST['data_validade'];
    $observacoes = $_POST['observacoes'];

    $sql = "UPDATE usuarios SET nome = ?, email = ?, data_nascimento = ?, cpf = ?, telefone = ?, rg = ?, cep = ?, logradouro = ?, numero_endereco = ? WHERE id_usuarios = ?";
    $params = [$nome, $email, $data_nascimento, $cpf, $telefone, $rg, $cep, $logradouro, $numero, $id_usuarios];

    if (isset($_FILES['foto_usuario']) && $_FILES['foto_usuario']['error'] === UPLOAD_ERR_OK) {
        $diretorio_destino = 'uploads/';
        $nome_arquivo = basename($_FILES['foto_usuario']['name']);
        $nome_temporario = $_FILES['foto_usuario']['tmp_name'];

        // Verifica se o diretório de destino existe, se não, cria o diretório
        if (!is_dir($diretorio_destino)) {
            mkdir($diretorio_destino, 0777, true);
        }

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($nome_temporario, $diretorio_destino . $nome_arquivo)) {
            $sql = "UPDATE usuarios SET foto_usuario = ?, nome = ?, email = ?, data_nascimento = ?, cpf = ?, telefone = ?, rg = ?, cep = ?, logradouro = ?, numero_endereco = ? WHERE id_usuarios = ?";
            array_unshift($params, $nome_arquivo);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao enviar o arquivo.']);
            exit;
        }
    }

    $stmtUsuarios = $pdo->prepare($sql);
    $stmtUsuarios->execute($params);

    $stmtContratos = $pdo->prepare("UPDATE contratos SET id_planos = ?, data_inicio = ?, data_renovacao = ?, data_validade = ?, observacoes = ? WHERE id_usuarios = ?");
    $stmtContratos->execute([$plano, $data_inicio, $data_renovacao, $data_validade, $observacoes, $id_usuarios]);

    // Remover todas as modalidades existentes para o usuário
    $stmtDeleteModalidades = $pdo->prepare("DELETE FROM usuario_modalidade WHERE id_usuarios = ?");
    $stmtDeleteModalidades->execute([$id_usuarios]);

    // Inserir as novas modalidades (no máximo duas)
    $stmtInsertModalidade = $pdo->prepare("INSERT INTO usuario_modalidade (id_usuarios, id_modalidades) VALUES (?, ?)");
    foreach ($modalidades as $mod) {
        $stmtInsertModalidade->execute([$id_usuarios, $mod]);
    }

    // Verificando o número de linhas afetadas
    $affectedRowsUsuarios = $stmtUsuarios->rowCount();
    $affectedRowsContratos = $stmtContratos->rowCount();
    $affectedRowsModalidades = $stmtInsertModalidade->rowCount();

    if ($affectedRowsUsuarios > 0 || $affectedRowsContratos > 0 || $affectedRowsModalidades > 0) {
        $response = [
            'success' => true,
            'message' => 'Cadastro atualizado com sucesso',
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Nenhuma alteração realizada no cadastro'
        ];
    }

    echo json_encode($response);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro ao atualizar os dados: ' . $e->getMessage()]);
}
