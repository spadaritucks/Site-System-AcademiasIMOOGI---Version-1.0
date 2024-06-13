<?php

include('../config.php');



try {

    if (isset($_FILES['foto_usuario'])) {
        $diretorio_destino = 'uploads/';

        $nome_arquivo = $_FILES['foto_usuario']['name'];
        $nome_temporario = $_FILES['foto_usuario']['tmp_name'];
        $erro = $_FILES['foto_usuario']['error'];

        if (move_uploaded_file($nome_temporario, $diretorio_destino . $nome_arquivo)) {
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
            $modalidades = array_unique(array_slice($_POST['modalidadesArea'], 0, 2));
            var_dump($modalidade);
            $data_inicio = $_POST['data_inicio'];
            $data_renovacao = $_POST['data_renovacao'];
            $data_validade = $_POST['data_validade'];
            $observacoes = $_POST['observacoes'];

            $stmt = $pdo->prepare("INSERT INTO usuarios (foto_usuario, nome, email, data_nascimento, cpf, telefone, rg, cep, logradouro, numero_endereco) 
            VALUES (:foto_usuario, :nome, :email, :data_nascimento, :cpf, :telefone, :rg, :cep, :logradouro, :numero_endereco)");


            $stmt->bindParam(":foto_usuario", $nome_arquivo);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":data_nascimento", $data_nascimento, PDO::PARAM_STR);
            $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
            $stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
            $stmt->bindParam(":rg", $rg, PDO::PARAM_STR);
            $stmt->bindParam(":cep", $cep, PDO::PARAM_STR);
            $stmt->bindParam(":logradouro", $logradouro, PDO::PARAM_STR);
            $stmt->bindParam(":numero_endereco", $numero, PDO::PARAM_INT);

            $result = $stmt->execute();

            $idUsuarios = $pdo->lastInsertId();
            $stmtContratos = $pdo->prepare("INSERT INTO contratos(id_usuarios,id_planos,data_inicio,data_renovacao,data_validade,observacoes) VALUES(:id_usuarios,
            :id_planos, :data_inicio, :data_renovacao, :data_validade,:observacoes)");

            $stmtContratos->bindParam(":id_usuarios", $idUsuarios, PDO::PARAM_INT);
            $stmtContratos->bindParam(":id_planos", $plano, PDO::PARAM_INT);
            $stmtContratos->bindParam(":data_inicio", $data_inicio, PDO::PARAM_STR);
            $stmtContratos->bindParam(":data_renovacao", $data_renovacao, PDO::PARAM_STR);
            $stmtContratos->bindParam(":data_validade", $data_validade, PDO::PARAM_STR);
            $stmtContratos->bindParam(":observacoes", $observacoes, PDO::PARAM_STR);

            $resultContratos = $stmtContratos->execute();

            // Processamento das informações do usuário

            // Verifica se há múltiplas entradas para modalidadesArea
            $stmtInsertModalidade = $pdo->prepare("INSERT INTO usuario_modalidade (id_usuarios, id_modalidades) VALUES (:id_usuarios, :id_modalidades)");
        foreach ($modalidades as $mod) {
            $stmtInsertModalidade->bindParam(":id_usuarios", $idUsuarios, PDO::PARAM_INT);
            $stmtInsertModalidade->bindParam(":id_modalidades", $mod, PDO::PARAM_INT);

            $resultModalidade = $stmtInsertModalidade->execute();
        }





            // Responda com JSON indicando sucesso ou falha
            if ($result && $resultContratos && $resultModalidade) {
                echo json_encode(['success' => true, 'message' => 'Usuário inserido com sucesso']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Erro ao inserir']);
            }
        }
    } else {
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
        $modalidades = array_unique(array_slice($_POST['modalidadesArea'], 0, 2));
        $data_inicio = $_POST['data_inicio'];
        $data_renovacao = $_POST['data_renovacao'];
        $data_validade = $_POST['data_validade'];
        $observacoes = $_POST['observacoes'];

        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, data_nascimento, cpf, telefone, rg, cep, logradouro, numero_endereco) 
        VALUES (:nome, :email, :data_nascimento, :cpf, :telefone, :rg, :cep, :logradouro, :numero_endereco)");


        $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":data_nascimento", $data_nascimento, PDO::PARAM_STR);
        $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
        $stmt->bindParam(":rg", $rg, PDO::PARAM_STR);
        $stmt->bindParam(":cep", $cep, PDO::PARAM_STR);
        $stmt->bindParam(":logradouro", $logradouro, PDO::PARAM_STR);
        $stmt->bindParam(":numero_endereco", $numero, PDO::PARAM_INT);

        $result = $stmt->execute();

        $idUsuarios = $pdo->lastInsertId();
        $stmtContratos = $pdo->prepare("INSERT INTO contratos(id_usuarios,id_planos,data_inicio,data_renovacao,data_validade,observacoes) VALUES(:id_usuarios,
        :id_planos, :data_inicio, :data_renovacao, :data_validade,:observacoes)");

        $stmtContratos->bindParam(":id_usuarios", $idUsuarios, PDO::PARAM_INT);
        $stmtContratos->bindParam(":id_planos", $plano, PDO::PARAM_INT);
        $stmtContratos->bindParam(":data_inicio", $data_inicio, PDO::PARAM_STR);
        $stmtContratos->bindParam(":data_renovacao", $data_renovacao, PDO::PARAM_STR);
        $stmtContratos->bindParam(":data_validade", $data_validade, PDO::PARAM_STR);
        $stmtContratos->bindParam(":observacoes", $observacoes, PDO::PARAM_STR);

        $resultContratos = $stmtContratos->execute();



        // Processamento das informações do usuário

        $stmtInsertModalidade = $pdo->prepare("INSERT INTO usuario_modalidade (id_usuarios, id_modalidades) VALUES (:id_usuarios, :id_modalidades)");
        foreach ($modalidades as $mod) {
            $stmtInsertModalidade->bindParam(":id_usuarios", $idUsuarios, PDO::PARAM_INT);
            $stmtInsertModalidade->bindParam(":id_modalidades", $mod, PDO::PARAM_INT);

            $resultModalidade = $stmtInsertModalidade->execute();
        }



        // Responda com JSON indicando sucesso ou falha
        if ($result && $resultContratos && $resultModalidade) {
            echo json_encode(['success' => true, 'message' => 'Usuário inserido com sucesso']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao inserir']);
        }
    }
} catch (PDOException $e) {
    echo json_encode("Erro em processar os dados" . $e->getMessage());
}
