<?php

// Preenchimento da Carteirinha
$foto_usuario = $_SESSION['foto_usuario'];
$nome = $_SESSION['nome'];
$cpf = $_SESSION['cpf'];
$contrato = $_SESSION['contratos'];
$modalidades = $_SESSION['modalidades'];


// Verificar se $_SESSION['modalidades'] é um array
if (is_array($modalidades)) {
    // Transformar o array de modalidades em uma string
    $modalidades_str = implode(', ', $modalidades);
} else {
    // Caso contrário, definir uma string vazia ou outra mensagem apropriada
    $modalidades_str = '';
}

// Exibe a foto e o nome na página
echo ' <div class="infoCarteira">
    <img src="crud_usuarios/uploads/' . $foto_usuario . '" alt="">
    <div class="textCarteira">
        <h2>' . $nome . '</h2>
        <h4>' . $contrato . '</h4>
        <p> CPF: ' . $cpf . '</p>
        <p> Modalidades: ' . $modalidades_str . '</p>
    </div>
</div>';

?>
