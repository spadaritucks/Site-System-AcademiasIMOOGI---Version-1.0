<?php
require("security.php");

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/funcionarios.css">
</head>

<body>
    <header>
        <?php
        require('header/header.php')
        ?>
    </header>
    <main>
        <form id="formFuncionario" class = "formFuncionario">
            <h2>Cadastro IMOOGI</h2>
            <section class="dados_pessoais">
            <div class="div">
                    <span>Foto do Funcionario</span>
                    <input type="file" name="" id="foto_funcionario">
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

            <section class="dadosFuncionarios">
                <div class="div">
                    <span>Tipo do Funcionario</span>
                    <select name="tipo_funcionario" id="tipo_funcionario">
                    <option selected>Selecione</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Professor">Professor</option>
                            <option value="Recepcionista">Recepcionista</option>
                    </select>
                </div>
                <div class="div">
                    <span>Cargo</span>
                    <input type="text" name="numero" placeholder="Cargo" id="cargo">
                </div>
                <div class="div">
                    <span>Atividades</span>
                    <input type="text" name="numero" placeholder="Atividades" id="atividades">
                </div>

            </section>
            <section class="horariosFuncionarios">
                <table>
                    <thead>
                        <tr>
                            <th>Dia da Semana</th>
                            <th>Horario de Inicio</th>
                            <th>Horario de Saida</th>
                        </tr>
                        <tbody id = "tableHorarios">
                            <tr>
                                <td><select name="dia_semana[]" class="dia_semana"><option selected>Selecione</option></select></td>
                                <td><input type="time" name="horario_inicio[]" class="horario_inicio"></td>
                                <td><input type="time" name="horario_saida[]" class="horario_saida"></td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
                <div class = "addremoveButtons">
                <button class = "addHorario" id = "addHorario">Adicionar</button>
                <button class = "removerHorario" id = "removerHorario">Remover</button>
                </div>
            </section>
            <button type="submit" name="enviar" id="enviar" class="enviar">Enviar</button>
        </form>




    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/ajax_funcionarios.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>