<?php

// Limpa todas as variáveis de sessão
$_SESSION = array();

session_destroy(); 
header("location: ../../usuarioLogin.php");
exit();



?>