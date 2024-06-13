<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREA DO ALUNO</title>
    <link rel="stylesheet" href="headerAluno/headerAluno.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="painelAluno.php"><img src="imagens/logo imoogi novo.png" class="img-fluid rounded-top" alt="" style="width: 200px;" />
            </a>

                <div class="looged-area"></div>

                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel">
                                    Perfil do Aluno
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="usuarioDados"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"><a href="functions_login_user/logoutUsuario.php">Sair</a></button>
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                                    Mudar Senha
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel2">
                                    Mudança de Senha
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="mudarSenhaFormUsuario">
                                    <div class="div">
                                        <span>Nova Senha</span>
                                        <input type="password" id="newPassword">
                                    </div>
                                    <div class="div">
                                        <span>Repita a senha</span>
                                        <input type="password" id="confirmPassword">
                                    </div>
                                    <button type="submit" class="mudarSenhaSubmit">Alterar</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                                    Voltar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

        </div>
    </nav>

</body>

</html>