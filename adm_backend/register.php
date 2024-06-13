<?php
require("security.php");

?>
<!doctype html>
<html lang="en">

<head>
    <title>AREA DO ALUNO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/register.css">

</head>





<body>
    <header>

        <?php
          require('header/header.php');
        ?>

    </header>
    <main>
        <form id="formUsuario" method="POST">
            <h2>Cadastro IMOOGI</h2>
            <section class="dados_pessoais">
                <div class="div">
                    <span>Foto do Usuario</span>
                    <input type="file" name="" id="foto_usuario">
                </div>
                <div class="div">
                    <span>Nome</span>
                    <input type="text" name="nome" placeholder="Nome Completo" id="nome">
                </div>
                <div class="div">
                    <span>Email</span>
                    <input type="email" name="email" placeholder="Email" id="email">
                </div>
                <div class="div">
                    <span>Data de Nascimento</span>
                    <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento">
                </div>

                <div class="div">
                    <span>CPF</span>
                    <input type="text" name="cpf" placeholder="CPF" id="cpf">
                </div>
                <div class="div">
                    <span>Telefone</span>
                    <input type="text" name="telefone" placeholder="Telefone" id="telefone">
                </div>
                <div class="div">
                    <span>RG</span>
                    <input type="text" name="rg" placeholder="RG" id="rg">
                </div>
            </section>

            <section class="endereço">
                <div class="div">
                    <span>CEP</span>
                    <input type="text" name="cep" placeholder="CEP" id="cep">
                </div>
                <div class="div">
                    <span>Logradouro</span>
                    <input type="text" name="logradouro" placeholder="Logradouro" id="logradouro">
                </div>
                <div class="div">
                    <span>Numero</span>
                    <input type="text" name="numero" placeholder="Numero" id="numero">
                </div>
            </section>


            <section class="planos" id="planos">
                <div class="div">
                    <span>Planos</span>
                    <select name="planosArea" id="planosArea">
                        <option value="" selected>Selecione</option>
                    </select>


                </div>
                <div class="div">
                    <span>Modalidades</span>
                    <select name="modalidadesArea[]" id="modalidadesArea" class="modalidadesArea">
                        <option value="" selected>Selecione</option>
                    </select>
                    <div class="modalidadesContainer" id="modalidadesContainer">

                    </div>
                </div>
            </section>
            <section class="validade">
                <div class="div">
                    <span>Data de Inicio</span>
                    <input type="date" name="data_inicio" id="data_inicio">
                </div>
                <div class="div">
                    <span>Data de Renovação</span>
                    <input type="date" name="data_renovacao" id="data_renovacao">
                </div>
                <div class="div">
                    <span>Data de Vencimento</span>
                    <input type="date" name="data_validade" id="data_validade">
                </div>
            </section>
            <section class="observacoes">
                <span>Observações</span>
                <textarea class="desktop-textarea" name="observacoes" id="observacoes" cols="50" rows="5"></textarea>

            </section>
            <button type="submit" name="enviar" id="enviar" class="enviarRegister">Enviar</button>
        </form>


    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/ajax_usuarios.js"></script>
    <script src="js/ajax_modalidades.js"></script>
    <script src="js/ajax_planos.js"></script>
    <script src="js/register.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>