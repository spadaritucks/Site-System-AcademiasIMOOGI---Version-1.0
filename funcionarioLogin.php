<!doctype html>
<html lang="en">

<head>
    <title>AREA DO ALUNO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <header>
        <?php
        require("header/header.html");

        ?>
    </header>
    <main>
        <section class="loginArea">
            <h2>LOGIN DO FUNCIONARIO</h2>
            <form id="loginFuncionario">
                <div class="formComponent">
                    <span>Insira o seu CPF</span>
                    <input type="text" placeholder="CPF" id="cpf">
                </div>
                <div class="formComponent">
                    <span>Insira a sua senha</span>
                    <input type="password" placeholder="Senha" id = "senha">
                </div>
                 
                <div class="loginButtons">
                    <button id = "buttonLogin"  type="submit">Login</button>
                    <button id="buttonPrimeiroAcesso"><a href="primeiroAcessoFuncionario.php">Primeiro Acesso</a></button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="adm_backend/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="adm_backend/js/ajax_login_funcionario.js"></script>
</body>

</html>