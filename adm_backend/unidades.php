<?php
require("security.php");

?>

<!doctype html>
<html lang="en">

<head>
    <title>IMOOGI DASHBOARD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/unidades.css">
</head>

<body>
    <header>
        <?php
        include('header/header.php');

        ?>
    </header>
    <main>

        <section class="home">
            <h2>Gerenciamento de Unidades</h2>
            <section class="painelUnidades">
                <div class="painelShow">
                    <table class="tableUnidades">
                        <thead>
                            <tr>
                                <th>ID da Unidade</th>
                                <th>Nome da Unidade</th>
                                
                            </tr>
                        </thead>
                        <tbody class="UnidadesList" id="UnidadesList">

                        </tbody>
                    </table>
                </div>
                <div class="painelCreate">

                    <div class="buttonsOperacion">
                        <button class="addUnidade">Criar Unidade</button>
                        <button class="editarUnidade">Editar Unidade</button>
                        <button class="excluirUnidade">Deletar Unidade</button>
                    </div>

                    <div class="addUnidadeArea">
                        <form id="formAddUnidade">
                            <div class="formComponent">
                                <span>Foto da Unidade</span>
                                <input type="file" id="fotoUnidade" name="fotoUnidade">
                                <small>Insira a foto do espaço</small>
                            </div>
                            <div class="formComponent">
                                <span>Nome da Unidade</span>
                                <input type="text" id="nomeUnidade" name="nomeUnidade">
                                <small>Insira o nome da unidade</small>
                            </div>
                            <div class="formComponent">
                                <span>Endereço</span>
                                <input type="text" id="enderecoUnidade" name="enderecoUnidade">
                                <small>Insira o endereço da unidade</small>
                            </div>
                            <div class="formComponent">
                                <span>Grade Horaria</span>
                                <input type="file" name="gradeUnidade" id="gradeUnidade">
                                <small>Aceito PDF,JPEG,JPG,PNG</small>
                            </div>
                            <div class="formComponent">
                                <span>Descrição da Unidade</span>
                                <textarea name="unidadeDescricao" id="unidadeDescricao" cols="30" rows="10"></textarea>
                                <small>Faça uma breve descrição sobre a unidade</small>
                            </div>

                            <button type="submit" class="enviarUnidade">Criar</button>
                        </form>
                    </div>


                    <div class="editUnidadeArea">
                        <form id="formEditUnidade">
                            <div class="formComponent">
                                <span>Selecione a unidade</span>
                                <select name="" id="id_edit">
                                    <option value="">Selecione a unidade</option>
                                </select>
                                <small>Escolha a unidade para alterações</small>
                            </div>
                            <div class="formComponent">
                                <span>Foto da Unidade</span>
                                <img id="imgPreview" src="" alt="">
                                <input type="file" id="fotoUnidadeUp" name="fotoUnidade">
                                <small>Insira a foto do espaço</small>
                            </div>
                            <div class="formComponent">
                                <span>Nome da Unidade</span>
                                <input type="text" id="nomeUnidadeUp" name="nomeUnidadeUp">
                                <small>Insira o nome da unidade</small>
                            </div>
                            <div class="formComponent">
                                <span>Endereço</span>
                                <input type="text" id="enderecoUnidadeUp" name="enderecoUnidadeUp"">
                                <small>Insira o endereço da unidade</small>
                            </div>
                            <div class=" formComponent">
                                <span>Grade Horaria</span>
                                <input type="file" id="gradeUnidadeUp" name="gradeUnidadeUp">
                                <small>Aceito PDF,JPEG,JPG,PNG</small>
                            </div>
                            <div class="formComponent">
                                <span>Descrição da Unidade</span>
                                <textarea name="unidadeDescricaoUp" id="unidadeDescricaoUp" cols="30" rows="10"></textarea>
                                <small>Faça uma breve descrição sobre a unidade</small>
                            </div>
                            <button type="submit" class="alterarUnidade">Alterar</button>
                        </form>
                    </div>


                    <div class="deleteUnidadeArea">
                        <form id="formDeleteUnidade">
                            <div class="formComponent">
                                <span>Selecione a unidade</span>
                                <select name="" id="id_delete">
                                    <option value="">Selecione a unidade</option>
                                </select>
                                <small>Escolha a unidade para exclusão</small>
                            </div>
                            <button type="submit" class="excluirUnidadeForm">Excluir</button>
                        </form>
                    </div>
                </div>

            </section>
            <div class="containerUnidades">

            </div>
        </section>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/ajax_unidades.js"></script>

</html>