function listarModalidadesCliente() {
    $.ajax({

        url: 'adm_backend/crud_modalidades/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {
        console.log(result)
        for (let i = 0; i < result.ArtesMarciais.length; i++) {
            let artesMarciaisArea = $('#artesMarciaisArea');

            artesMarciaisArea.append(
                `<div class = "modalidade">
                     <h2>${result.ArtesMarciais[i].nome_modalidade}</h2>
                     <p>${result.ArtesMarciais[i].descricao_modalidade}</p>
                 </div>`

            );
        }

        
        for (let i = 0; i < result.Danca.length; i++) {
            let danceArea = $("#danceArea");

            danceArea.append(`
        
        <div class = "modalidade">
                 <h2>${result.Danca[i].nome_modalidade}</h2>
                 <p>${result.Danca[i].descricao_modalidade}</p>
             </div>
        
        
        
        
        `)
        }


    });
}

$(document).ready(function () {
    listarModalidadesCliente()
})