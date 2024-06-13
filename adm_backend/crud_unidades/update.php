<?php
include('../config.php');


try {
    $id_unidades = $_POST['id_unidades'];
    $nomeUnidade = $_POST['nomeUnidadeUp'];
    $enderecoUnidade = $_POST['enderecoUnidadeUp'];
    $descricao = isset($_POST['unidadeDescricaoUp']) ? $_POST['unidadeDescricaoUp'] : '';

    $sql = "UPDATE unidades SET nome_unidade = ?, endereco = ?, descricao = ? WHERE id_unidades = ?";
    $params = [$nomeUnidade, $enderecoUnidade, $descricao, $id_unidades];
    $diretorio_destino = 'uploads/';

    if (isset($_FILES['fotoUnidade']) && isset($_FILES['gradeUnidadeUp'])) {
        $nome_arquivo_foto = $_FILES['fotoUnidade']['name'];
        $nome_temporario_foto = $_FILES['fotoUnidade']['tmp_name'];
        $erro_foto = $_FILES['fotoUnidade']['error'];

        $nome_arquivo_grade = $_FILES['gradeUnidadeUp']['name'];
        $nome_temporario_grade = $_FILES['gradeUnidadeUp']['tmp_name'];
        $erro_grade = $_FILES['gradeUnidadeUp']['error'];

        if (
            move_uploaded_file($nome_temporario_foto, $diretorio_destino . $nome_arquivo_foto) &&
            move_uploaded_file($nome_temporario_grade, $diretorio_destino . $nome_arquivo_grade)
        ) {
            $sql = "UPDATE unidades SET imagem_unidade = ?, nome_unidade = ?, endereco = ?, grade = ?, descricao = ? WHERE id_unidades = ?";
            $params = [];
            $params[] = $nome_arquivo_foto;
            $params[] = $nomeUnidade;
            $params[] = $enderecoUnidade;
            $params[] = $nome_arquivo_grade;
            $params[] = $descricao;
            $params[] = $id_unidades; // Adiciona o nome do arquivo no início do array de parâmetros
        } 
    } else if (isset($_FILES['fotoUnidade']) && !isset($_FILES['gradeUnidadeUp'])) {

        $nome_arquivo_foto = $_FILES['fotoUnidade']['name'];
        $nome_temporario_foto = $_FILES['fotoUnidade']['tmp_name'];
        $erro_foto = $_FILES['fotoUnidade']['error'];

        if (move_uploaded_file($nome_temporario_foto, $diretorio_destino . $nome_arquivo_foto)) {
            $sql = "UPDATE unidades SET imagem_unidade = ?, nome_unidade = ?, endereco = ?, descricao = ? WHERE id_unidades = ?";
            $params = [];
            $params[] = $nome_arquivo_foto;
            $params[] = $nomeUnidade;
            $params[] = $enderecoUnidade;
            $params[] = $descricao;
            $params[] = $id_unidades; // Adiciona o nome do arquivo no início do array de parâmetros
        } 
    } else if (!isset($_FILES['fotoUnidade']) && isset($_FILES['gradeUnidadeUp'])) {

        $nome_arquivo_grade = $_FILES['gradeUnidadeUp']['name'];
        $nome_temporario_grade = $_FILES['gradeUnidadeUp']['tmp_name'];
        $erro_grade = $_FILES['gradeUnidadeUp']['error'];

        if (move_uploaded_file($nome_temporario_grade, $diretorio_destino . $nome_arquivo_grade)) {
            $sql = "UPDATE unidades SET nome_unidade = ?, endereco = ?, grade = ?, descricao = ? WHERE id_unidades = ?";
            $params = [];
            $params[] = $nomeUnidade;
            $params[] = $enderecoUnidade;
            $params[] = $nome_arquivo_grade;
            $params[] = $descricao;
            $params[] = $id_unidades; // Adiciona o nome do arquivo no início do array de parâmetros
        } 
    }else {
        echo 'Erro ao enviar o arquivo.';
        exit;
    }


    // Executa a consulta preparada
    $stmtUnidades = $pdo->prepare($sql);
    $stmtUnidades->execute($params);
    var_dump($params);

    echo json_encode(['success' => true, 'message' => 'Unidade atualizada com sucesso']);
} catch (PDOException $e) {
    echo json_encode("Erro ao enviar os dados"  . $e->getMessage());
}
