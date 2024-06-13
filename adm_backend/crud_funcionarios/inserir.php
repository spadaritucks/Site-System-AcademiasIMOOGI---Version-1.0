<?php

include('../config.php');

try {
    if (isset($_FILES['foto_funcionario'])) {
        $diretorio_destino = 'uploads/';

        $nome_arquivo = $_FILES['foto_funcionario']['name'];
        $nome_temporario = $_FILES['foto_funcionario']['tmp_name'];
        $erro = $_FILES['foto_funcionario']['error'];

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
            $tipo_funcionario = $_POST['tipo_funcionario'];
            $cargo = $_POST['cargo'];
            $atividades = $_POST['atividades'];
            
            // Verificando se os arrays estão definidos antes de usar
            $id_dia_semana = isset($_POST['dia_semana']) ? json_decode($_POST['dia_semana']) : [];
            $horario_inicio = isset($_POST['horario_inicio']) ? json_decode($_POST['horario_inicio']) : [];
            $horario_saida = isset($_POST['horario_saida']) ? json_decode($_POST['horario_saida']) : [];

            $stmtFuncionarios = $pdo->prepare("INSERT INTO funcionarios (foto_funcionario, nome, email, data_nascimento, cpf, telefone, rg, cep, logradouro, numero_endereco) 
            VALUES (:foto_funcionario,:nome, :email, :data_nascimento, :cpf, :telefone, :rg, :cep, :logradouro, :numero_endereco)");

            $stmtFuncionarios->bindParam(':foto_funcionario', $nome_arquivo);
            $stmtFuncionarios->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmtFuncionarios->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtFuncionarios->bindParam(':data_nascimento', $data_nascimento, PDO::PARAM_STR);
            $stmtFuncionarios->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $stmtFuncionarios->bindParam(':telefone', $telefone, PDO::PARAM_STR);
            $stmtFuncionarios->bindParam(':rg', $rg, PDO::PARAM_STR);
            $stmtFuncionarios->bindParam(':cep', $cep, PDO::PARAM_STR);
            $stmtFuncionarios->bindParam(':logradouro', $logradouro, PDO::PARAM_STR);
            $stmtFuncionarios->bindParam(':numero_endereco', $numero, PDO::PARAM_INT);

            $resultFuncionarios = $stmtFuncionarios->execute();

            $id_funcionarios = $pdo->lastInsertId();
            $stmtDados_funcionario = $pdo->prepare("INSERT INTO dados_funcionario(id_funcionarios, tipo_funcionario, cargo, atividades) 
            VALUES (:id_funcionarios, :tipo_funcionario, :cargo, :atividades)");
            $stmtDados_funcionario->bindParam(':id_funcionarios', $id_funcionarios, PDO::PARAM_INT);
            $stmtDados_funcionario->bindParam(':tipo_funcionario', $tipo_funcionario, PDO::PARAM_STR);
            $stmtDados_funcionario->bindParam(':cargo', $cargo, PDO::PARAM_STR);
            $stmtDados_funcionario->bindParam(':atividades', $atividades, PDO::PARAM_STR);
    
            $resultDados_funcionario = $stmtDados_funcionario->execute();

            // Verificando se os arrays não estão vazios antes de percorrer
            if(!empty($id_dia_semana) && !empty($horario_inicio) && !empty($horario_saida)) {
                foreach($id_dia_semana as $key => $dia_semana){
                    $stmtHorarios_funcionario = $pdo->prepare("INSERT INTO horarios_funcionarios(id_funcionarios,id_dia_semana,horario_inicio,horario_saida)
                    VALUES(:id_funcionarios, :id_dia_semana, :horario_inicio, :horario_saida)");
                    $stmtHorarios_funcionario->bindParam(':id_funcionarios', $id_funcionarios, PDO::PARAM_INT);
                    $stmtHorarios_funcionario->bindParam(':id_dia_semana', $dia_semana);
                    $stmtHorarios_funcionario->bindParam(':horario_inicio', $horario_inicio[$key]);
                    $stmtHorarios_funcionario->bindParam(':horario_saida', $horario_saida[$key]);
        
                    $resultHorarios_funcionario = $stmtHorarios_funcionario->execute();
                
                }
            }

            if($resultFuncionarios && $resultDados_funcionario && $resultHorarios_funcionario){
                echo json_encode(['success' => true, 'message' => 'Funcionario inserido com sucesso']);
            }else{
                echo json_encode(['success' => false, 'message' => 'Erro ao inserir o funcionario']);
            }
        }
    }
} catch (PDOException $e) {
    echo json_encode("Erro em processar os dados" .$e->getMessage());
}
