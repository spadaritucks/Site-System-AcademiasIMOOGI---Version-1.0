<?php
require("securityUser.php")
?>

<!doctype html>
<html lang="en">

<head>
    <title>Carteira do Aluno</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/carteirinha.css">
    <script src="js/jquery-3.5.1.min.js"></script>
</head>


<body>
    <header>
        <?php
        require("headerAluno/header.php")
        ?>
    </header>
    <main>
        <section class="menuCarteira">
            <h2>Carteira do Aluno</h2>
            <section class="areaCarteira">
                <img class = "carteirinhaLogo" src="imagens/logomarca preto.png" alt="">
                <?php
                require("gerarCarteira.php")
                ?>
            </section>
        </section>
        <button class = "pdfButton" onclick="gerarPDF()">Download PDF</button>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        async function gerarPDF() {
            const { jsPDF } = window.jspdf;
            const menuCarteira = document.querySelector('.menuCarteira');

            // Use html2canvas to capture the content
            const canvas = await html2canvas(menuCarteira, {
                scale: 2,
                useCORS: true,
                allowTaint: true,
                logging: true
            });

            // Convert the canvas to an image
            const imgData = canvas.toDataURL('image/png');

            // Create a new jsPDF instance
            const pdf = new jsPDF('p', 'mm', 'a4');

            // Add the image to the PDF
            pdf.addImage(imgData, 'PNG', 10, 10, 190, 0); // Adjust the size and position as needed

            // Save the PDF
            pdf.save('Carteira_do_Aluno.pdf');
        }
    </script>
    <script src="js/ajax_usuarios.js"></script>
</body>

</html>