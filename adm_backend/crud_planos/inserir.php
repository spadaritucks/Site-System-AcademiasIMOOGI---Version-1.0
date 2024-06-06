<?php
include('config.php');

//Inserir dados no Banco de Dados
$nomePlano = $_POST['nomePlano'];
$duracaoPlano = $_POST['duracaoPlano'];
$modalidadesPlano = $_POST['modalidadesPlano'];
$valorPlano = $_POST['valorPlano'];
$link_pagamento = $_POST['link_pagamento'];

$stmt = $pdo->prepare("INSERT INTO planos(nome_plano, duracao_plano, valor_plano, num_modalidades,link_pagamento) 
VALUES(:nome_plano, :duracao_plano, :valor_plano, :num_modalidades,:link_pagamento)");

$stmt->bindParam(':nome_plano',$nomePlano, PDO::PARAM_STR);
$stmt->bindParam(':duracao_plano',$duracaoPlano, PDO::PARAM_STR);
$stmt->bindParam(':valor_plano',$valorPlano, PDO::PARAM_INT);
$stmt->bindParam(':num_modalidades',$modalidadesPlano, PDO::PARAM_INT);
$stmt->bindParam(':link_pagamento',$link_pagamento, PDO::PARAM_STR);


$result = $stmt->execute();




?>
