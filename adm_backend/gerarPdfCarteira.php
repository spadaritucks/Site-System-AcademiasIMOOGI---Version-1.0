<?php
require_once '../dompdf/vendor/autoload.php';
use Dompdf\Dompdf;

// Verifique se o HTML da área da carteira foi enviado
if(isset($_POST['areaCarteiraHtml'])) {
    // Crie uma instância do Dompdf
   
    $dompdf = new Dompdf();

    // Carregue o HTML da área da carteira
    $html = $_POST['areaCarteiraHtml'];

    // Carregue o HTML no Dompdf
    $dompdf->loadHtml($html);

    // (Opcional) Defina o tamanho do papel e a orientação
    $dompdf->setPaper('A4', 'portrait');

    // Renderize o PDF
    $dompdf->render();

    // Saída do PDF gerado
    $dompdf->stream("carteirinha_aluno.pdf");
} else {
    echo 'Erro: Nenhum HTML da área da carteira recebido.';
}

?>