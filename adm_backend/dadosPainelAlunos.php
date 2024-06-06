<?php


$nome = $_SESSION['nome'];
$contrato = $_SESSION['contratos'];
$data_inicio = new DateTime($_SESSION['data_inicio']);
$data_renovacao = new DateTime($_SESSION['data_renovacao']);
$data_validade = new DateTime($_SESSION['data_validade']);
$modalidades = $_SESSION['modalidades'];
$foto_usuario = $_SESSION['foto_usuario'];


// Verificar se $_SESSION['modalidades'] é um array
if (is_array($modalidades)) {
    // Transformar o array de modalidades em uma string
    $modalidades_str = implode('<br> ', $modalidades);
} else {
    // Caso contrário, definir uma string vazia ou outra mensagem apropriada
    $modalidades_str = '';
}
$data_atual = new DateTime();

// Calcular a diferença entre a data de validade e a data atual
$intervalo = $data_validade->diff($data_atual);
$dias_restantes = $intervalo->format('%a');

// Exibir o HTML
echo '        
<section class="menuAluno">

<h2>Olá ' . $nome . ' </h2>
      
<section class="divsAluno">
    <div class="divStyle" id="planosVinculados">
        <h2>' . $contrato . '</h2>
        <div class="datas">
            <div class="info">
               <span>Data de Inicio</span>
               <h3>' . $data_inicio->format('d/m/Y') . '</h3>
            </div>
            <div class="info">
              <span>Data de Renovação</span>
              <h3>' . $data_renovacao->format('d/m/Y') . '</h3>
            </div>
            <div class="info">
               <span>Data de Vencimento</span>
               <h3>' . $data_validade->format('d/m/Y') . '</h3>
            </div>
        </div>
        <div class="status">
            <span>Status do Plano</span>
            <h3>' . ($data_validade > $data_atual ? 'ATIVO' : 'EXPIRADO') . '</h3>
            <span>Dias Restantes do Plano</span>
            <h3>' . $dias_restantes . ' dias</h3>
        </div>
    </div>
    <div class="divStyle" id="modalidadesVinculadas">
       <h2>Modalidades</h2>
       <h3>'.$modalidades_str.'</h3>
    </div>


</section>
    <div class = "routeCarterinha"> 
        <button><a href = "carteirinha.php">Acessar Carteirinha</a></button>
    </div>
</section>';
?>
