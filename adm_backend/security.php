<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

session_start();



// Verifica se a sessão possui os dados do funcionário
if(isset($_SESSION['foto_funcionario']) && isset($_SESSION['nome'])) {
    // Armazena a foto e o nome em variáveis
    $foto_funcionario = $_SESSION['foto_funcionario'];
    $nome = $_SESSION['nome'];

    // Exibe a foto e o nome na página
    echo '<a class = "perfil"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" href=""><img style = "width:60px; border-radius: 80px;" src="' . "./crud_funcionarios/uploads/".$foto_funcionario . '" alt=""> ' . $nome . '</a>';
    echo '
    <div class = "areaPerfil">
     <img style = "width:180px; border-radius: 40px;" src="' . "./crud_funcionarios/uploads/".$foto_funcionario . '" alt="">
       <h4>' . $nome . '</h4>
    </div>';
} else {
    // Se os dados não estiverem disponíveis na sessão, exibe uma mensagem alternativa
    echo "Dados do funcionário não encontrados na sessão.";
}


if (!isset($_SESSION['cpf']) || !isset($_SESSION['senha'])) {
    session_destroy(); 
    header("location: ../funcionarioLogin.php");
    exit();
}
?>
