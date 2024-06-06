<!doctype html>
<html lang="en">

<head>
    <title>Primeiro Acesso</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/primeiroAcesso.css">
</head>

<body>
    <header>
        <?php
        require("header/header.html")
        ?>
    </header>
    <main>
        <section class="primeiroAcessoArea">
            <h2>Primeiro Acesso</h2>
            <form id="formPrimeiroAcessoUsuario">
                <div class="formComponent">
                    <span>Insira o seu Email</span>
                    <input type="text" placeholder="Email" id="email">
                </div>
                <div class="buttons">
                    <button type="submit" id="verificar">Verificar</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="adm_backend/js/jquery-3.5.1.min.js"></script>
    <script src="adm_backend/js/ajax_login_usuario.js"></script>
</body>

</html>