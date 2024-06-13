$(document).ready(function(){
    $("#formPrimeiroAcessoFuncionario").submit(function(e){
        e.preventDefault();
        let email = $("#email").val();
        let formData = new FormData();
        formData.append('email', email);
        $.ajax({
            url: 'adm_backend/functions_login_func/funcLogin.php',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false
        }).done(function(result) {
            console.log(result);
            let response = JSON.parse(result);
            if(response.status === "email_found"){
                window.location.href = "novaSenhaFuncionario.php";
            }else{
                alert("Email não encontrado ou Primeiro Acesso já realizado");
                window.location.href = "primeiroAcessoFuncionario.php";
            }
        }).fail(function(xhr, status, error) {
            alert("Erro ao verificar o email: " + error);
        });
    });

    $("#formNovaSenhaFuncionario").submit(function(e){
        e.preventDefault();
        
        let novaSenha = $("#nova_senha").val();
        let senha_repetida = $("#senha_repetida").val();

        $.ajax({
            url: 'adm_backend/functions_login_func/funcLogin.php',
            method: "POST",
            data: {novaSenha:novaSenha, senha_repetida:senha_repetida}
        }).done(function(result){
            let response = JSON.parse(result);
            if(response.status == "password_created"){
                window.location.href = "funcionarioLogin.php";
            }else{
                alert("Senha inválida");
            }
            console.log(result);
        }).fail(function(xhr, status, error) {
            alert("Erro ao criar nova senha: " + error);
        });
    });

    $("#loginFuncionario").submit(function(e){
        e.preventDefault();

        let cpf = $("#cpf").val();
        let senha = $("#senha").val();

        $.ajax({
            url: 'adm_backend/functions_login_func/funcLogin.php',
            method: "POST",
            data:{cpf:cpf, senha:senha}
        }).done(function(result){
            
            let response = JSON.parse(result);
            
            if(response.status == "login_success"){
                window.location.href = "adm_backend/admin.php";
            }else{
                alert("CPF ou senha inválidos");
            }
        }).fail(function(xhr, status, error) {
            alert("Erro ao fazer login: " + error);
        });
    });
});

$("#mudarSenhaForm").submit(function(e){
    e.preventDefault();

    let newPassword = $("#newPassword").val();
    let confirmPassword = $("#confirmPassword").val();
    
    $.ajax({

        url: 'functions_login_func/mudarSenha.php',
        method: "POST",
        data: {newPassword:newPassword, confirmPassword:confirmPassword}

    }).done(function(result){
        console.log(result);
        
    }).fail(function(xhr, status, error){
        alert("Erro em alterar a senha" + error)
    })
})
