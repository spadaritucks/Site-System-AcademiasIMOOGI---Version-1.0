<!doctype html>
<html lang="en">

<head>
    <title>ACADEMIAS IMOOGI</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imagens/logo-favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/8a892c1faf.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <?php
        require('header/header.html')
        ?>
    </header>
    <main>
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="3" aria-label="4 slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="imagens/queda.jpeg" class="w-100 d-block" alt="First slide" />
                </div>
                <div class="carousel-item">
                    <img src="imagens/Apresentação imoogidance (1).jpeg" class="w-100 d-block" alt="First slide" />
                </div>
                <div class="carousel-item">
                    <img src="imagens/Feminino.jpeg" class="w-100 d-block" alt="Third slide" />
                </div>
                <div class="carousel-item">
                    <img src="imagens/IKGAI.jpeg" class="w-100 d-block" alt="Third slide" />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



        <section class="sobreNos">
            <div class="conteudo">
                <h1>SOBRE AS ACADEMIAS IMOOGI</h1>
                <p>Inaugurada em Novembro de 2012, pelo Grão Mestre Jeferson da Silva, foi criada com o intuito
                    de tornar-se o maior modelo de franquia desse segmento, abrangendo em um único espaço todas as
                    modalidades conhecidas e praticadas pelo mundo das lutas, esportes de combate,
                    defesa pessoal e artes marciais.

                    Trabalhamos na melhoria continua da sáude fisica, sistema imunológico e ajudando familias brasileiras
                    no combate á obesidade, sedentarismo, Stress, Esquizofrenia, doenças cardiovasculares, alzheimer,
                    borderline, ansiedade e a maior doença do século<br><span style="color: red; font-size: 30px; font-weight: bold;">A DEPRESSÃO.</span>

                </p>

            </div>

            <div class="conteudo">
                <img src="imagens/MARECHAL JEFERSON.jpeg" alt="">
                <h2>AULA DE DPU KRAV MAGA - IMOOGI UNIDADE MARECHAL</h2>
                <p>Ministrada por Grão Mestre Jeferson da Silva</p>
            </div>
        </section>

        <section class="midia">
            <h1>Multimidia de Nossas Aulas</h1>
            <section class="midiaArea">

                <div class="videoArea">
                    <video controls>
                        <source src="imagens/MAK FITNESS.mp4" type="video/mp4">
                    </video>
                    <h2>KICKBOXING NA MAK FITNESS</h2>
                    <p>ACADEMIA MAK FITNESS - RUDGE RAMOS</p>
                </div>

                <div class="videoArea">
                    <video controls>
                        <source src="imagens/Jeferson Marechal.mp4" type="video/mp4">
                    </video>
                    <h2>KRAV MAGA NA IMOOGI MARECHAL</h2>
                    <p>IMOOGI ACADEMIA - UNIDADE MARECHAL</p>
                </div>

                <div class="videoArea">
                    <video controls>
                        <source src="imagens/BOXEMARECHAL.mp4" type="video/mp4">
                    </video>
                    <h2>BOXE NA IMOOGI MARECHAL</h2>
                    <p>IMOOGI ACADEMIA - UNIDADE MARECHAL</p>
                </div>

                <div class="videoArea">
                    <video controls>
                        <source src="imagens/BOXEROTARY.mp4" type="video/mp4">
                    </video>
                    <h2>BOXE NA IMOOGI ROTARY</h2>
                    <p>IMOOGI ACADEMIA - UNIDADE ROTARY</p>
                </div>
                <div class="videoArea">
                    <video controls>
                        <source src="imagens/SERTANEJO.mp4" type="video/mp4">
                    </video>
                    <h2>SERTANEJO NA IMOOGI MARECHAL</h2>
                    <p>UNIDADE MARECHAL - SALA 2</p>
                </div>
                <div class="videoArea">
                    <video controls>
                        <source src="imagens/MUSUBI.mp4" type="video/mp4">
                    </video>
                    <h2>MUSUBI NA IMOOGI MARECHAL</h2>
                    <p>UNIDADE MARECHAL - SALA 2</p>
                </div>
                




            </section>
            <footer>
                <?php
                require('footer/footer.html')
                ?>
            </footer>





    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>