$(document).ready(function () {
    $("#formPrimeiroAcessoUsuario").submit(function (e) {
        e.preventDefault()
        let email = $("#email").val();

        $.ajax({
            url: "adm_backend/functions_login_user/userLogin.php",
            method: "POST",
            data: {email: email},
           
        }).done(function (result) {
            console.log(result)
            var response = JSON.parse(result);
            if (response.status === "existing_user") {
                window.location.href = "novaSenhaUsuario.php";
            } else {
                alert("Email não encontrado ou Primeiro Acesso já realizado");
                window.location.href = "primeiroAcessoUsuario.php";
            }
        }).fail((xhr, status, error) => {
            alert("Erro ao verificar o email  " + error)
        })

    })

    $("#formNovaSenhaUsuario").submit(function (e) {
        e.preventDefault()
        let novaSenha = $("#nova_senha").val();
        let senhaRepetida = $("#senha_repetida").val();

        $.ajax({

            url: "adm_backend/functions_login_user/userLogin.php",
            method: "POST",
            data: { novaSenha: novaSenha, senhaRepetida: senhaRepetida }

        }).done((result) => {
            console.log(result)
            var response = JSON.parse(result);
            console.log(result)// Converte a resposta em um objeto JavaScript
            if (response.status === "password_created") {
                window.location.href = "usuarioLogin.php";
            }else{
                alert("A senha invalida");
            }
        }).fail((xhr, status, error) => {
            alert("Erro ao criar a senha" + error)
        })

    })

    //Formulario para verificação para o login do usuario
    $("#loginUsuario").submit(function (e) {
        e.preventDefault()
        let cpf = $("#cpf").val();
        let senha = $("#senha").val();

        $.ajax({

            url: "adm_backend/functions_login_user/userLogin.php",
            method: "POST",
            data: { cpf: cpf, senha: senha }

        }).done((result) => {
            console.log(result)
            let response = JSON.parse(result);
            if (response.status == "login_user") {
                window.location.href = "adm_backend/painelAluno.php"
            } else {
                alert("CPF ou senha inválidos");
            }

        }).fail((xhr, status, error) => {
            alert("Erro ao realizar o login " + error)
        })
    })

})

$("#mudarSenhaFormUsuario").submit(function(e){
    e.preventDefault();
    
    let newPassword = $("#newPassword").val();
    let confirmPassword = $("#confirmPassword").val();
    
    $.ajax({

        url: 'functions_login_user/mudarSenha.php',
        method: "POST",
        data: {newPassword:newPassword, confirmPassword:confirmPassword}

    }).done(function(result){
        console.log(result);
        alert("Senha alterada com sucesso!")
        
    }).fail(function(xhr, status, error){
        alert("Erro em alterar a senha" + error)
    })
})

