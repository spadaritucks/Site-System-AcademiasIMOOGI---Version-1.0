$(document).ready(function(){
    
    $.ajax({
        url: 'adm_backend/crud_funcionarios/read.php',
        method: 'GET',
        dataType: 'json'
    }).done(function(result){
        
        function nossaEquipe(funcionarios,infoFuncionario){
            let equipeArea = $(".equipeArea");
            let linhaEquipe = `
               <div class="membro">
                   <img src="adm_backend/crud_funcionarios/uploads/${funcionarios.foto_funcionario}" alt="">
                   <h2>${funcionarios.nome}</h2>
                   <p>${infoFuncionario.cargo}</p>
               </div>
            
            `
            equipeArea.append(linhaEquipe)
        }

        if (result.funcionarios && result.dados_funcionarios) {
            result.funcionarios.forEach(funcionarios => {
                // Encontrar a informação adicional correspondente ao funcionário atual
                let infoFuncionario = result.dados_funcionarios.find(dados => dados.id_funcionarios === funcionarios.id_funcionarios);
                if (infoFuncionario) {
                    // Chamar a função nossaEquipe com os dados combinados
                    nossaEquipe(funcionarios, infoFuncionario);
                }
            });
        }



    }).fail(function(xhr, status, error){
        alert("Erro ao listar a equipe")

    })

})

