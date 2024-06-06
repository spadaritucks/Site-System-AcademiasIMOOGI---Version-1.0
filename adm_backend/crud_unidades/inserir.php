<?php

include("config.php");
// Verifica se foi enviado um arquivo

try {
    if (isset($_FILES['fotoUnidade']) && isset($_FILES['gradeUnidade'])) {
        $diretorio_destino = 'uploads/';

        $nome_arquivo_foto = $_FILES['fotoUnidade']['name'];
        $nome_temporario_foto = $_FILES['fotoUnidade']['tmp_name'];
        $erro_foto = $_FILES['fotoUnidade']['error'];

        $nome_arquivo_grade = $_FILES['gradeUnidade']['name'];
        $nome_temporario_grade = $_FILES['gradeUnidade']['tmp_name'];
        $erro_grade = $_FILES['gradeUnidade']['error'];

        if (
            move_uploaded_file($nome_temporario_foto, $diretorio_destino . $nome_arquivo_foto) &&
            move_uploaded_file($nome_temporario_grade, $diretorio_destino . $nome_arquivo_grade)
        ) {
            echo 'Arquivos enviados com sucesso!';
            $nomeUnidade = $_POST['nomeUnidade'];
            $enderecoUnidade = $_POST['enderecoUnidade'];
            $descricao = isset($_POST['unidadeDescricao']) ? $_POST['unidadeDescricao'] : '';

            $stmtUnidades = $pdo->prepare("INSERT INTO unidades(imagem_unidade, nome_unidade, endereco, grade, descricao) VALUES (:imagem_unidade,
            :nome_unidade, :endereco, :grade, :descricao)");
            $stmtUnidades->bindParam(":imagem_unidade", $nome_arquivo_foto);
            $stmtUnidades->bindParam(":nome_unidade", $nomeUnidade);
            $stmtUnidades->bindParam(":endereco", $enderecoUnidade);
            $stmtUnidades->bindParam(":grade",  $nome_arquivo_grade);
            $stmtUnidades->bindParam(":descricao", $descricao);
            
            $result = $stmtUnidades->execute();

            echo json_encode(['success' => true, 'message' => 'Usuário inserido com sucesso']);
            



            // Aqui você pode continuar com o restante do seu código
        } else {
            echo 'Erro ao enviar os arquivos.';
        }
    }
} catch (PDOException $e) {
    echo json_encode("Erro ao enviar os Dados"  . $e->getMessage());
}


