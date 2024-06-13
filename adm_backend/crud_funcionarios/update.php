<?php
include('../config.php');


try {
    $id_funcionarios = $_POST['id_funcionarios'];
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


    $sql = "UPDATE funcionarios SET nome = ?, email = ?, data_nascimento = ?, cpf = ?, telefone  = ?, rg = ?, cep = ?, logradouro = ? , numero_endereco = ? WHERE id_funcionarios = ?";
    $params = [$nome, $email, $data_nascimento, $cpf, $telefone, $rg, $cep, $logradouro, $numero, $id_funcionarios];

    if (isset($_FILES['foto_funcionario']) && $_FILES['foto_funcionario']['error'] === UPLOAD_ERR_OK) {
        $diretorio_destino = 'uploads/';

        $nome_arquivo = $_FILES['foto_funcionario']['name'];
        $nome_temporario = $_FILES['foto_funcionario']['tmp_name'];
        $erro = $_FILES['foto_funcionario']['error'];

        if (move_uploaded_file($nome_temporario, $diretorio_destino . $nome_arquivo)) {
            $sql = "UPDATE funcionarios SET foto_funcionario = ?, nome = ?, email = ?, data_nascimento = ?, cpf = ?, telefone  = ?, rg = ?, cep = ?, logradouro = ? , numero_endereco = ? WHERE id_funcionarios = ?";
            array_unshift($params, $nome_arquivo);
        } else {
            echo 'Erro ao enviar o arquivo.';
            exit;
        }
    }


    $stmtFuncionarios = $pdo->prepare($sql);
    $stmtFuncionarios->execute($params);

    $stmtDadosFuncionario = $pdo->prepare("UPDATE dados_funcionario SET tipo_funcionario = ?, cargo = ?, atividades = ? WHERE id_funcionarios = ? ");
    $stmtDadosFuncionario->execute([$tipo_funcionario, $cargo, $atividades, $id_funcionarios]);



    if (!empty($id_dia_semana) && !empty($horario_inicio) && !empty($horario_saida)) {
        // Garantir que os arrays tenham o mesmo número de elementos
        $num_elementos = min(count($id_dia_semana), count($horario_inicio), count($horario_saida));
    
        // Iterar pelos arrays
        for ($i = 0; $i < $num_elementos; $i++) {
            $id_dia = $id_dia_semana[$i];
            $inicio = $horario_inicio[$i];
            $saida = $horario_saida[$i];
    
            // Preparar e executar a consulta SQL para cada conjunto de valores
            $stmtHorariosFuncionario = $pdo->prepare("UPDATE horarios_funcionarios SET horario_inicio = ?, horario_saida = ? WHERE id_funcionarios = ? AND id_dia_semana = ?");
            $stmtHorariosFuncionario->execute([$inicio, $saida, $id_funcionarios, $id_dia]);
        }
    }
    
} catch (PDOException $e) {
    echo json_encode("Erro em processar os dados" . $e->getMessage());
}
