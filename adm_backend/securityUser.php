<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

session_start();




// Verifica se a sessão possui os dados do funcionário
if(isset($_SESSION['foto_usuario']) && isset($_SESSION['nome'])) {
    // Armazena a foto e o nome em variáveis
    $foto_usuario= $_SESSION['foto_usuario'];
    $nome = $_SESSION['nome'];
    $cpf = $_SESSION['cpf'];
  
    // Exibe a foto e o nome na página
    echo '<a class = "perfil"  data-bs-toggle="modal" href="#exampleModalToggle" role="button" href=""><img style = "width:70px; height:70px; border-radius: 80px;" src="' . "./crud_usuarios/uploads/".$foto_usuario . '" alt=""></a>';
    echo '
    <div class = "areaPerfil">
     <img style = "width:180px; border-radius: 40px; height: 180px;" src="' . "./crud_usuarios/uploads/".$foto_usuario . '" alt="">
       <h4>' . $nome . '</h4>
    </div>';

} else {
    // Se os dados não estiverem disponíveis na sessão, exibe uma mensagem alternativa
    echo "Dados do Usuario não encontrados na sessão.";
}


if (!isset($_SESSION['cpf']) || !isset($_SESSION['senha'])) {
    session_destroy(); 
    header("location: ../funcionarioLogin.php");
    exit();
}
?>
