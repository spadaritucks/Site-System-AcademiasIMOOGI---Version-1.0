$(document).ready(function () {
    listarUnidadesModal()
    openFunctionUnidades()
    listarUpdateUnidades()
    listarSelectDelete()

})

function openFunctionUnidades() {
    //Chamada dos Botões
    let addUnidade = $('.addUnidade');
    let editarUnidade = $('.editarUnidade');
    let excluirUnidade = $(".excluirUnidade");
    let buttonExit = $(".buttonExit");
    //Declaração das Janelas

    let addUnidadeArea = $('.addUnidadeArea');
    let editUnidadeArea = $('.editUnidadeArea');
    let deleteUnidadeArea = $('.deleteUnidadeArea');
    let modalUnidades = $(".modalUnidades");

  

    buttonExit.on("click", function (e) {
        e.preventDefault()
        modalUnidades.css("display", "none")
    })

    addUnidade.on("click", function (e) {
        e.preventDefault()
        addUnidadeArea.css("display", "flex");
        editUnidadeArea.css("display", "none");
        deleteUnidadeArea.css("display", "none");
    })
    editarUnidade.on("click", function (e) {
        e.preventDefault()
        editUnidadeArea.css("display", "flex");
        addUnidadeArea.css("display", "none");
        deleteUnidadeArea.css("display", "none");
    })
    excluirUnidade.on("click", function (e) {
        e.preventDefault()
        deleteUnidadeArea.css("display", "flex");
        addUnidadeArea.css("display", "none");
        editUnidadeArea.css("display", "none");
    })

}
 //Classes Manipuladas pelo PHP e JS
            let fotoLogado = $(".perfil"); //Classe PHP
            let loogedArea = $('.looged-area');//Classe HTML header.php
            loogedArea.append(fotoLogado);
            
            let funcionarioDadosModal = $(".funcionarioDados");//Classe HTML header.php
            let dadosLogado = $(".areaPerfil");//Classe PHP
            funcionarioDadosModal.append(dadosLogado)

$("#formAddUnidade").submit(function (event) {
    event.preventDefault();

    let fotoUnidade = $("#fotoUnidade")[0].files[0];
    let gradeUnidade = $("#gradeUnidade")[0].files[0];
    let formData = new FormData(this);
  
    console.log(formData);
   

    if (fotoUnidade) {
      $.ajax({

        url: 'crud_unidades/inserir.php',
        method: 'POST',
        data : formData,
        processData: false,
        contentType: false,

      }).done(function(result){
         console.log(result)

      }).fail(function(xhr, status, error){
          alert("Erro ao inserir os dados " + error);
      })
    }
});

$("#formEditUnidade").submit(function (event) {
    event.preventDefault();

    let id_unidades = $("#id_edit").val();
    let fotoUnidade = $("#fotoUnidadeUp")[0].files[0];
    let gradeUnidade = $("#gradeUnidadeUp")[0].files[0]; // Obtenha o arquivo selecionado
    let formData = new FormData(this);
    formData.append("id_unidades", id_unidades);
   

    console.log(formData);
        // Verifique se o campo de arquivo foi preenchido
        if (!fotoUnidade && !gradeUnidade) {
            // Se o campo de arquivo estiver vazio, remova-o dos dados do formulário
            formData.delete('fotoUnidade');
            formData.delete('gradeUnidadeUp');
        }
        else if(!gradeUnidade && fotoUnidade){
            formData.delete('gradeUnidadeUp');
        }else if(!fotoUnidade && gradeUnidade){
            formData.delete('fotoUnidade');
        }

    // Faça a chamada AJAX para enviar os dados do formulário
    $.ajax({
        url: 'crud_unidades/update.php',
        method: 'POST',
        data: formData,
        processData: false, // Não processar os dados
        contentType: false, // Não definir o tipo de conteúdo
    }).done((result) => {
        alert("Dados atualizados com sucesso!");
        console.log(result);
    }).fail((xhr, status, error) => {
        alert("Erro ao enviar os dados: " + error);
    });
});



$("#formDeleteUnidade").submit((event) => {
    event.preventDefault()
    let id_delete = $("#id_delete").val();
    console.log(id_delete);

    $.ajax({
        url: "crud_unidades/delete.php",
        method: "POST",
        data: { id_delete }
    }).done((result) => {

    }).fail((xhr, status, error) => {
        alert("Erro em deletar os dados" + error)
    })
})

function listarSelectDelete(){
    $.ajax({
        url: "crud_unidades/read.php",
        method: "GET",
        dataType: "json"

    }).done((result)=>{
        result.unidades.forEach(unidade =>{
            let selectDeleteUnidade = $("#id_delete");
            let deleteOption = `<option value="${unidade.id_unidades}">${unidade.nome_unidade}</option>`;

            selectDeleteUnidade.append(deleteOption);
        })
    }).fail((xhr, status, error)=>{
        alert("Falha em listar os dados no select" + error)
    })
}

function listarUnidadesModal() {
    $.ajax({

        url: "crud_unidades/read.php",
        method: "GET",
        dataType: "json"
    }).done((result) => {
        console.log(result)

        result.unidades.forEach(unidades => {

            //Listar na tabela
            let UnidadesList = $("#UnidadesList");
            let linhaUnidades = `
            <tr>
              <td>${unidades.id_unidades}</td>
              <td>${unidades.nome_unidade}</td>
            </tr>
        `
            UnidadesList.append(linhaUnidades)
            openFunctionUnidades()

            //Listar na Janela Modal
            let containerUnidades = $(".containerUnidades");
            let componentUnidades = `
            <div class = "componentUnidades">
              <img src= "crud_unidades/uploads/${unidades.imagem_unidade}" alt="">
              <h2>${unidades.nome_unidade}</h2>
              <p>${unidades.endereco}</p>
              <button class = "gradeUnidade"><a href="crud_unidades/uploads/${unidades.grade}">Download da Grade Horaria</a></button>
              <p>${unidades.descricao}</p>
        </div>
      
            `
            containerUnidades.append(componentUnidades);


        });




    }).fail((xhr, status, error) => {
        alert("Erro ao listar os dados" + error)
    })
}


function listarUpdateUnidades() {

    $.ajax({

        url: "crud_unidades/read.php",
        method: 'GET',
        dataType: 'json'

    }).done((result) => {

        let editarUnidade = $(".editarUnidade");

        
        editarUnidade.on("click", (e) => {
            e.preventDefault();
            result.unidades.forEach(unidade => {
                let selectUnidade = $("#id_edit");
                let optionUnidade = `<option value="${unidade.id_unidades}">${unidade.nome_unidade}</option>`
    
                selectUnidade.append(optionUnidade)


                selectUnidade.on("change", function(){
                    let idUnidade = $(this).val();
                    
                    if(idUnidade == unidade.id_unidades){
                        console.log(unidade)
                        let imgPreview = $("#imgPreview");
                        imgPreview.attr("src", `crud_unidades/uploads/${unidade.imagem_unidade}`);
                    
                        $("#nomeUnidadeUp").val(unidade.nome_unidade);
                        $("#enderecoUnidadeUp").val(unidade.endereco);
                        $("#gradeUnidadeUp").val(unidade.grade);
                        $("#unidadeDescricaoUp").val(unidade.descricao)
        
                    }
                })

              

            })


          
            


        })
    }).fail((xhr, status, error) => {
        alert("falha em listar os dados" + error);
    })

    
}