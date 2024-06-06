<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header/header.css">
    <link rel="shortcut icon" href="../imagens/logo-favicon.png"" type=" image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="admin.php"><img src="imagens/logo imoogi novo.png" class="img-fluid rounded-top" alt="" style="width: 200px;" />
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="planos.php" aria-current="page">Planos & Contratos
                            <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modalidades.php">Modalidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="unidades.php">Unidades</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestão de Usuarios</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="register.php">Cadastrar Usuario</a>
                            <a class="dropdown-item" href="funcionarios.php">Cadastrar Funcionarios</a>

                        </div>
                    </li>
                </ul>
                <div class="looged-area"></div>

                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel">
                                   Perfil do Funcionario
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="funcionarioDados"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"><a href="functions_login_func/logout.php">Sair</a></button>
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
                                <form id="mudarSenhaForm">
                                    <div class="div">
                                        <span>Nova Senha</span>
                                        <input type="password" id="newPassword">
                                    </div>
                                    <div class="div">
                                        <span>Repita a senha</span>
                                        <input type="password" id="confirmPassword">
                                    </div>
                                    <button type="submit" class = "mudarSenhaSubmit">Alterar</button>
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