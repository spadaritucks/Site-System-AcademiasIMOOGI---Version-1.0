<?php
require("security.php");

?>
<!doctype html>
<html lang="en">

<head>
    <title>ADM PLANOS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/planos.css">
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
            <div class="list-plan">
                <h2>Listagem de Planos</h2>
                <div class="table-responsive-sm">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col-sm">ID</th>
                                <th scope="col-sm">NOME</th>
                                <th scope="col-sm">DURAÇÃO</th>
                                <th scope="col-sm">MODALIDADES</th>
                                <th scope="col-sm">VALOR INTEGRAL</th>
                                <th scope = "col-sm">STATUS</th>



                            </tr>
                        </thead>
                        <tbody id="planoTableBody">

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="create-plan">
                <h2>Gerencimanto de Planos</h2>
                <div class="buttons-table">
                    <button class="addPlano">Adicionar Plano</button>
                    <button class="atualizarPlano">Editar Plano</button>
                    <button class="delPlano">Deletar Plano</button>
                </div>
                <div class="areaAddPlano">
                    <form method="POST" id="addPlanoForm">
                        <div class="mb-3">
                            <label for="" class="form-label">Nome do Plano</label>
                            <input type="text" class="form-control" name="nomePlano" id="nomePlano" required />
                            <small id="helpId" class="form-text text-muted">Insira o nome do plano</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Duração do Plano</label>
                            <input type="text" class="form-control" name="duracaoPlano" id="duracaoPlano" required />
                            <small id="helpId" class="form-text text-muted">Insira a duração em "meses"</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Quantia de Modalidades Permitidas</label>
                            <select class="form-select form-select-lg" name="modalidadesPlano" id="modalidadesPlano">
                                <option selected></option>
                                <option value="1">1 Modalidade</option>
                                <option value="2">2 Modalidades</option>
                                <option value="3">3 Modalidades</option>
                                <option value="7">Treino Livre</option>
                            </select>
                        </div>

                        <small id="helpId" class="form-text text-muted">Insira a duração em "meses"</small>

                        <div class="mb-3">
                            <label for="" class="form-label">Valor do Plano</label>
                            <input type="text" class="form-control" name="valorPlano" id="valorPlano" required />
                            <small id="helpId" class="form-text text-muted">Insira o valor inteiro</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Status do Plano</label>
                            <select class="form-select form-select-lg" name="status_plano" id="status_plano">
                                <option value="ativo">Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                   
                        </div>
                        <button type="submit" class="enviarPlano" name="enviarPlano" id="enviarPlano">Criar Plano</button>

                    </form>
                </div>

                <div class="areaUpdatePlano">
                    <form method="POST" id="updatePlanoForm">
                        <div class="mb-3">

                            <div class="mb-3">
                                <label for="" class="form-label">Escolha o Plano</label>
                                <select class="form-select form-select-lg" name="idPlano" id="idPlano">
                                    <option value="" selected>Selecione o Plano</option>
                                </select>
                            </div>

                            <small id="helpId" class="form-text text-muted">Insira o ID do Plano que Deseja Editar</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nome do Plano</label>
                            <input type="text" class="form-control" name="updateNome" id="updateNome" required />
                            <small id="helpId" class="form-text text-muted">Insira o nome do plano</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Duração do Plano</label>
                            <input type="text" class="form-control" name="updateDuracao" id="updateDuracao" required />
                            <small id="helpId" class="form-text text-muted">Insira a duração em "meses"</small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Quantia de Modalidades Permitidas</label>
                            <select class="form-select form-select-lg" name="updateModalidades" id="updateModalidades">
                                <option selected></option>
                                <option value="1">1 Modalidade</option>
                                <option value="2">2 Modalidades</option>
                                <option value="3">3 Modalidades</option>
                                <option value="7">Treino Livre</option>
                            </select>
                        </div>



                        <div class="mb-3">
                            <label for="" class="form-label">Valor do Plano</label>
                            <input type="text" class="form-control" name="updateValor" id="updateValor" required />
                            <small id="helpId" class="form-text text-muted">Insira o valor inteiro</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Status do Plano</label>
                            <select class="form-select form-select-lg" name="status_plano_update" id="status_plano_update">
                                <option value="ativo">Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                            <small id="helpId" class="form-text text-muted">Escolha o status do plano</small>
                        </div>

                        <button type="submit" class="updatePlano" name="updatePlano" id="updatePlano">Atualizar</button>

                    </form>
                </div>
                <div class="areaDeletePlano">
                    <form method="POST" id="deletePlanoForm">
                        <div class="mb-3">
                            <label for="" class="form-label">Escolha o Plano</label>
                            <select class="form-select form-select-lg" name="idPlano" id="idPlanoDelete">
                                <option value="" selected>Selecione o Plano</option>
                            </select>
                            <small id="helpId" class="form-text text-muted">Insira o ID do Plano que Deseja Deletar</small>
                        </div>
                        <button type="submit" class="deletarPlano" name="deletarPlano" id="deletarPlano">Deletar</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="js/planos.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/ajax_planos.js"></script>


</body>

</html>