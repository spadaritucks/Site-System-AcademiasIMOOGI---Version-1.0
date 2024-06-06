$('#AddModalidadeForm').submit((e) => {
    e.preventDefault();

    let nomeModalidade = $('#nomeModalidade').val();
    let descricaoModalidade = $('#descricaoModalidade').val()
    let tipo_modalidade = $("#tipo_modalidade").val();


    $.ajax({
        url: 'crud_modalidades/inserir.php',
        method: 'POST',
        data: { nomeModalidade: nomeModalidade, descricaoModalidade: descricaoModalidade, tipo_modalidade: tipo_modalidade },
    }).done((result) => {
        console.log(result)
        listarModalidades()
        $('#nomeModalidade').val('');
        $('#descricaoModalidade').val('');
    })
})

$('#DeletarModalidadeForm').submit((e) => {
    e.preventDefault();

    let idModalidadeDel = $("#idModalidadeDel").val();

    $.ajax({
        url: 'crud_modalidades/delete.php',
        method: 'POST',
        data: { idModalidadeDel: idModalidadeDel },
    }).done((result) => {
        console.log(result)

        $("#idModalidade").val('')
        listarModalidades()

    })
})

$('#UpdateModalidadeForm').submit((e) => {
    e.preventDefault();
    
    let nomeModalidadeUp = $('#nomeModalidadeUpdate').val();
    let descricaoModalidadeUp = $('#descricaoModalidadeUpdate').val()
    let tipo_modalidade = $("#tipo_modalidadeUp").val();

    let idModalidadeUp = $('#idModalidade').val()
    $.ajax({

        url: 'crud_modalidades/update.php',
        method: 'POST',
        data: { nomeModalidadeUp: nomeModalidadeUp, descricaoModalidadeUp: descricaoModalidadeUp, tipo_modalidade: tipo_modalidade, idModalidadeUp: idModalidadeUp },
        
    }).done((result) => {
        console.log(result)
        $('#nomeModalidadeUpdate').val('');
        $('#descricaoModalidadeUpdate').val('')
        $('#idModalidadeUpdate').val('')
        listarModalidades()

    }).fail(function(xhr, status, error){
        alert("Erro ao atualizar as modalidades" + error)
    })
})






function checkUndefined(value) { return value !== undefined ? value : ''; }

function formatarDuracao(duracao) { return duracao == 1 ? `${duracao} mês` : `${duracao} meses`; }

function listarModalidades() {
    $.ajax({
        url: 'crud_modalidades/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {
        console.log(result);
        $('#tableModalidades').empty();
        
        // Processar Artes Marciais
        for (let i = 0; i < result.ArtesMarciais.length; i++) {
            $('#tableModalidades').append(`
                <tr>
                    <td>${checkUndefined(result.ArtesMarciais[i].id_modalidades)}</td>
                    <td>${checkUndefined(result.ArtesMarciais[i].nome_modalidade)}</td>
                    <td>${checkUndefined(result.ArtesMarciais[i].descricao_modalidade)}</td>
                    <td>${checkUndefined(result.ArtesMarciais[i].tipo_modalidades)}</td>
                </tr>
            `);
            $("#idModalidade").append(`<option value="${result.ArtesMarciais[i].id_modalidades}">${result.ArtesMarciais[i].nome_modalidade}</option>`)
            $("#idModalidadeDel").append(`<option value="${result.ArtesMarciais[i].id_modalidades}">${result.ArtesMarciais[i].nome_modalidade}</option>`)
        }

        // Processar Dança
        for (let i = 0; i < result.Danca.length; i++) {
            $('#tableModalidades').append(`
                <tr>
                    <td>${checkUndefined(result.Danca[i].id_modalidades)}</td>
                    <td>${checkUndefined(result.Danca[i].nome_modalidade)}</td>
                    <td>${checkUndefined(result.Danca[i].descricao_modalidade)}</td>
                    <td>${checkUndefined(result.Danca[i].tipo_modalidades)}</td>
                </tr>
            `);
            $("#idModalidade").append(`<option value="${result.Danca[i].id_modalidades}">${result.Danca[i].nome_modalidade}</option>`)
            $("#idModalidadeDel").append(`<option value="${result.Danca[i].id_modalidades}">${result.Danca[i].nome_modalidade}</option>`)
        }

        $("#idModalidade").on("change", function(e){
            e.preventDefault();
            let todasModalidades = result.ArtesMarciais.concat(result.Danca);
            let idModalidade = $(this).val();
            console.log(todasModalidades)
            for(let i = 0; i < todasModalidades.length; i++){
                if(idModalidade == todasModalidades[i].id_modalidades){
                    $("#nomeModalidadeUpdate").val(todasModalidades[i].nome_modalidade);
                    $("#descricaoModalidadeUpdate").val(todasModalidades[i].descricao_modalidade)
                    $("#tipo_modalidadeUp").val(todasModalidades[i].tipo_modalidades)
                }
                
            }
        
        })

        
    });
}



//Classes Manipuladas pelo PHP e JS
let fotoLogado = $(".perfil"); //Classe PHP
let loogedArea = $('.looged-area');//Classe HTML header.php
loogedArea.append(fotoLogado);

let funcionarioDadosModal = $(".funcionarioDados");//Classe HTML header.php
let dadosLogado = $(".areaPerfil");//Classe PHP
funcionarioDadosModal.append(dadosLogado)

listarModalidades()