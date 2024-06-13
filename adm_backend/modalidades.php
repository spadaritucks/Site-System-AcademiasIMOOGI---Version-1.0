<?php
require("security.php");

?>
<!doctype html>
<html lang="en">

<head>
    <title>ADM DASHBOARD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/modalidades.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>





<body>
    <header>
        <?php
        require('header/header.php');
        ?>

    </header>
    <main>
        <section class="home">
            <div class="list-mod">
                <h2>LISTAGEM DE MODALIDADES</h2>
                <div class="table-responsive-sm">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col-sm">ID da Modalidade</th>
                                <th scope="col-sm">Nome da Modalidade</th>
                                <th scope="col-sm">Descrição da Modalidade</th>
                                <th scope="col-sm">Tipo de Modalidade</th>
                            </tr>
                        </thead>
                        <tbody id="tableModalidades">

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="create-mod">
                <h2>GERENCIAMENTO DE MODALIDADES</h2>
                <div class="buttons-table">
                    <button class="addModalidade">Adicionar Modalidade</button>
                    <button class="atualizarModalidade">Editar Modalidade</button>
                    <button class="delModalidade">Deletar Modalidade</button>
                </div>

                <div class="areaAddModalidade">
                    <form method="POST" id="AddModalidadeForm">
                        <div class="mb-3">
                            <label for="" class="form-label">Nome da Modalidade</label>
                            <input type="text" class="form-control" name="nomeModalidade" id="nomeModalidade" />
                            <small id="helpId" class="form-text text-muted">Insira o Nome da Modalidade</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descrição da Modalidade</label>
                            <textarea class="form-control" name="descricaoModalidade" id="descricaoModalidade" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Descrição da Modalidade</label>
                            <select class="form-select form-select-lg" name="tipo_modalidade" id="tipo_modalidade">
                                <option value="Dança">Dança</option>
                                <option value="Artes Marciais">Artes Marciais</option>
                            </select>
                        </div>

                        <button class="submitAddModalidade" type="submit" id="submitAddModalidade">Enviar</button>
                    </form>


                </div>

                <div class="areaUpdateModalidade">
                    <form id="UpdateModalidadeForm">
                        <div class="mb-3">
                            <label for="" class="form-label">Escolha a Modalidade</label>
                                <select class="form-select form-select-lg" name="idModalidade" id="idModalidade">
                                    <option value="" selected>Selecione a Modalidade</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nome da Modalidade</label>
                            <input type="text" class="form-control" name="nomeModalidadeUpdate" id="nomeModalidadeUpdate" />
                            <small id="helpId" class="form-text text-muted">Insira o Nome da Modalidade</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descrição da Modalidade</label>
                            <textarea class="form-control" name="descricaoModalidade" id="descricaoModalidadeUpdate" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Tipo da Modalidade</label>
                            <select class="form-select form-select-lg" name="tipo_modalidadeUp" id="tipo_modalidadeUp">
                                <option value="Dança">Dança</option>
                                <option value="Artes Marciais">Artes Marciais</option>
                            </select>
                        </div>

                        <button class="submitUpdate" type="submit" id="submitUpdate">Enviar</button>
                    </form>


                </div>

                <div class="areaDeletarModalidade">
                    <form id="DeletarModalidadeForm">
                        <div class="mb-3">
                            <label for="" class="form-label">Selecione a Modalidade</label>
                            <select class="form-select form-select-lg" name="" id="idModalidadeDel">
                                <option value="" selected> Selecione</option>
                            </select>
                            <small id="helpId" class="form-text text-muted">Insira o ID da Modalidade</small>
                        </div>

                        <button class="submitDeletar" type="submit" id="submitDeletar">Deletar</button>
                    </form>


                </div>
            </div>
        </section>


    </main>

    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/ajax_modalidades.js"></script>
    <script src="js/modalidades.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>