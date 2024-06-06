$(document).ready(function(){
 listarUnidadesCliente()
})

function listarUnidadesCliente(){

    $.ajax({

        url: "adm_backend/crud_unidades/read.php",
        method: "GET",
        dataType: "json"
    }).done((result)=>{
        result.unidades.forEach(unidades=> {
            let containerUnidades = $(".containerUnidades");
            let componentUnidades = `
            <div class = "componentUnidades">
              <img src= "adm_backend/crud_unidades/uploads/${unidades.imagem_unidade}" alt="">
              <h2>${unidades.nome_unidade}</h2>
              <p>${unidades.endereco}</p>
              <button class = "gradeUnidade"><a href="adm_backend/crud_unidades/uploads/${unidades.grade}">Download da Grade Horaria</a></button>
              <p>${unidades.descricao}</p>
        </div>
      
            `

            containerUnidades.append(componentUnidades)
        });
    }).fail((xhr, status, error)=>{
        alert("Falha ao listar as unidades " + error)
    })
}