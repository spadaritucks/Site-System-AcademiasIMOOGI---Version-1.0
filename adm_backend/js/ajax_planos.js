$(document).ready(function () {
    listarTabela()
  


})



//Requisição para Adicionar Planos no Banco
$('#addPlanoForm').submit((e) => {
    e.preventDefault();

    let nomePlano = $('#nomePlano').val();
    let duracaoPlano = $('#duracaoPlano').val();
    let modalidadesPlano = $('#modalidadesPlano').val();
    let valorPlano = $('#valorPlano').val();
    let link_pagamento = $('#link_pagamento').val()
    

    $.ajax({
        url: 'crud_planos/inserir.php',
        method: 'POST',
        data: { nomePlano: nomePlano, duracaoPlano: duracaoPlano, modalidadesPlano: modalidadesPlano, valorPlano: valorPlano, link_pagamento: link_pagamento }
    }).done((result) => {
        console.log(result);
        $('#nomePlano').val('');
        $('#duracaoPlano').val('');
        $('#valorPlano').val('');
        $('#modalidadesPlano').val('');
        $('#link_pagamento').val('');
        listarTabela();

    })
})

//Requisição para Deletar Planos no Banco
$('#deletePlanoForm').submit((e) => {
    e.preventDefault();
    let idPlanoDelete = $('#idPlanoDelete').val();

    $.ajax({
        url: 'crud_planos/delete.php',
        method: 'POST',
        data: { idPlanoDelete: idPlanoDelete }
    }).done((result) => {
        console.log(result);
        $('#idPlanoDelete').val('');
        listarTabela();

    })
})

//Requisição para Listar Planos do Banco
function checkUndefined(value) { return value !== undefined ? value : ''; }

function formatarDuracao(duracao) { return duracao == 1 ? `${duracao} mês` : `${duracao} meses`; }

function listarTabela() {
    $.ajax({
        url: 'crud_planos/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {
        console.log(result);
        $('#planoTableBody').empty();
        $('#idPlano').empty();
        $('#idPlanoDelete').empty()
        if (result.length > 0) {
            for (let i = 0; i < result.length; i++) {
                //Listas Suspensas
                $('#idPlano').append(`<option value="${result[i].id_planos}">${result[i].nome_plano}</option>`);
                $('#idPlanoDelete').append(`<option value="${result[i].id_planos}">${result[i].nome_plano}</option>`);
                // Utiliza a função para verificar e lidar com valores undefined

                let idPlanos = checkUndefined(result[i].id_planos);
                let nomePlano = checkUndefined(result[i].nome_plano);
                let duracaoFormatada = formatarDuracao(checkUndefined(result[i].duracao_plano));
                let modalidadesFormatada = checkUndefined(result[i].num_modalidades);
                let valorPlano = checkUndefined(result[i].valor_plano);
                $('#planoTableBody').append(`
                    <tr>
                        <td>${idPlanos}</td>
                        <td>${nomePlano}</td>
                        <td>${duracaoFormatada}</td>
                        <td>${modalidadesFormatada !== '' ? modalidadesFormatada + ' modalidade' + (modalidadesFormatada == 1 ? '' : 's') : ''}</td>
                        <td>${valorPlano !== '' ? 'R$ ' + valorPlano : ''}</td>
                        
                    </tr>
                `);
            }




        } else {
            // Se a tabela estiver vazia, exiba uma mensagem
            $('#planoTableBody').html('<tr><td colspan="5" class="empty-table-message">A tabela está vazia.</td></tr>');
        }
    });
}

function listarLojaCliente() {



    $.ajax({
        url: 'adm_backend/crud_planos/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {

        result.forEach(plano => {
            let novoPlano = ` 
    <div class="plano" id="plano">       
        <div class="planoInfo">
            <h2 class="planoTitle">${plano.nome_plano}</h2>
            <p class="planoVal">R$ ${plano.valor_plano}</p>
            <button class="chooseButton"> <a href="${plano.link_pagamento}">EU QUERO</a></button>
        </div>
        
    </div>`;

            $("#containerPlanos").append(novoPlano);




        });

    }).fail((xhr, status, error) => {
        // Exibe um alerta indicando que ocorreu um erro
        console.log('Erro ao inserir dados: ' + error);
    });
}



//Requisição para Atualizar Planos no Banco

$('#updatePlanoForm').submit((e) => {
    e.preventDefault()
    let idPlano = $('#idPlano').val()
    let updateNome = $('#updateNome').val()
    let updateDuracao = $('#updateDuracao').val()
    let updateModalidades = $('#updateModalidades').val()
    let updateValor = $('#updateValor').val()
    let update_pagamento = $("#update_pagamento").val();

    $.ajax({
        url: 'crud_planos/update.php',
        method: 'POST',
        data: {
            idPlano: idPlano,
            updateNome: updateNome,
            updateDuracao: updateDuracao,
            updateModalidades: updateModalidades,
            updateValor: updateValor,
            update_pagamento: update_pagamento
        },
        dataType: 'json'
    }).done((result) => {
        console.log(result);
        $('#updateNome').val('')
        $('#updateDuracao').val('')
        $('#updateModalidades').val('')
        $('#updateValor').val('')
        $('#update_pagamento').val('');
        listarTabela();

    }).fail((xhr, status, error) => {
        alert('Erro ao alterar os dados' + error);
    })
})



function listarPlanosEdit() {

    $.ajax({

        url: 'crud_planos/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {
        $('#idPlano').on("change", function () {
            console.log(result)
            let planoSelecionado = $(this).val();

            for (let i = 0; i < result.length; i++) {

                if (planoSelecionado == result[i].id_planos) {
                    $('#updateNome').val(`${result[i].nome_plano}`)
                    $('#updateDuracao').val(`${result[i].duracao_plano}`)
                    $('#updateModalidades').val(`${result[i].num_modalidades}`)
                    $('#updateValor').val(`${result[i].valor_plano}`)
                    $('#update_pagamento').val(`${result[i].link_pagamento}`)
                }
            }






        })


    }).fail((xhr, status, error) => {
        alert("Erro ao listar o conteudo" + error);
    })
}

//Classes Manipuladas pelo PHP e JS
let fotoLogado = $(".perfil"); //Classe PHP
let loogedArea = $('.looged-area');//Classe HTML header.php
loogedArea.append(fotoLogado);

let funcionarioDadosModal = $(".funcionarioDados");//Classe HTML header.php
let dadosLogado = $(".areaPerfil");//Classe PHP
funcionarioDadosModal.append(dadosLogado)






listarTabela();
listarLojaCliente()
listarPlanosEdit()
