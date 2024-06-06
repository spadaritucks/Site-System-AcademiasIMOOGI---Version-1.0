//Funções para a pagina Funcionarios.php

$(document).ready(function () {
    //Chamada de função para funcionarios.php
    addDiaSemana();
    //Chamadas de funções para gen_funcionarioss.php
    modalOperationFuncionarios();
})

$('#addHorario').on("click", function (e) {
    e.preventDefault();

    $('#tableHorarios').append(`
        <tr>
          <td><select name="dia_semana" class="dia_semana"><option selected>Selecione</option></select></td>
          <td><input type="time" name="horario_inicio" class="horario_inicio"></td>
          <td><input type="time" name="horario_saida" class="horario_saida"></td>
       </tr>`);

    addDiaSemana()
})

$('#removerHorario').on("click", function (e) {
    e.preventDefault();
    $('#tableHorarios tr:last').remove();

})

$('#formFuncionario').submit(function (e) {
    e.preventDefault();

    let foto_funcionario = $("#foto_funcionario")[0].files[0];
    let nome = $('#nome').val();
    let email = $('#email').val();
    let data_nascimento = $('#data_nascimento').val();
    let cpf = $('#cpf').val();
    let telefone = $('#telefone').val();
    let rg = $('#rg').val();
    let cep = $('#cep').val();
    let logradouro = $('#logradouro').val();
    let numero = $('#numero').val();
    let tipo_funcionario = $('#tipo_funcionario').val();
    let cargo = $('#cargo').val();
    let atividades = $('#atividades').val();

    //Componentes que serão enviados como Array
    let dia_semana = [];
    $('.dia_semana').each(function () {
        dia_semana.push($(this).val());
    });
    let horario_inicio = []
    $('.horario_inicio').each(function () {
        horario_inicio.push($(this).val())
    })
    let horario_saida = []
    $('.horario_saida').each(function () {
        horario_saida.push($(this).val())
    })

    let formData = new FormData($('#formFuncionario')[0]);
    formData.append("foto_funcionario", foto_funcionario);
    formData.append("nome", nome);
    formData.append("email", email);
    formData.append("data_nascimento", data_nascimento);
    formData.append("cpf", cpf);
    formData.append("telefone", telefone);
    formData.append("rg", rg);
    formData.append("cep", cep);
    formData.append("logradouro", logradouro);
    formData.append("numero", numero);
    formData.append("tipo_funcionario", tipo_funcionario);
    formData.append("cargo", cargo);
    formData.append("atividades", atividades);
    formData.append("dia_semana", JSON.stringify(dia_semana));
    formData.append("horario_inicio", JSON.stringify(horario_inicio));
    formData.append("horario_saida" , JSON.stringify(horario_saida))



    $.ajax({
        url: 'crud_funcionarios/inserir.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false
    }).done((result) => {
        console.log(result)
        $('#nome').val('');
        $('#email').val('');
        $('#data_nascimento').val('');
        $('#cpf').val('');
        $('#telefone').val('');
        $('#rg').val('');
        $('#cep').val('');
        $('#logradouro').val('');
        $('#numero').val('');
        $('#tipo_funcionario').val('');
        $('#cargo').val('');
        $('#atividades').val('');
        $('.dia_semana').val('');
        $('.horario_inicio').val('');
        $('.horario_saida').val('')
    }).fail((xhr, status, error) => {
        alert('Erro ao inserir os dados' + error)
    })


})

$("#editFuncionarios").submit(function(e){
    e.preventDefault()
    let id_funcionarios = $(this).data("id");
    let foto_funcionario = $("#foto_funcionario")[0].files[0];
    let nome = $('#nome_funcionario').val();
    let email = $('#email_funcionario').val();
    let data_nascimento = $('#data_nascimento_funcionario').val();
    let cpf = $('#cpf_funcionario').val();
    let telefone = $('#telefone_funcionario').val();
    let rg = $('#rg_funcionario').val();
    let cep = $('#cep_funcionario').val();
    let logradouro = $('#logradouro_funcionario').val();
    let numero = $('#numero_funcionario').val();
    let tipo_funcionario = $('#tipo_funcionario').val();
    let cargo = $('#cargo').val();
    let atividades = $('#atividades').val();

    //Componentes que serão enviados como Array
    let dia_semana = [];
    $('.dia_semana').each(function () {
        dia_semana.push($(this).val());
    });
    let horario_inicio = []
    $('.horario_inicio').each(function () {
        horario_inicio.push($(this).val())
    })
    let horario_saida = []
    $('.horario_saida').each(function () {
        horario_saida.push($(this).val())
    })

    let formData = new FormData();

    formData.append("id_funcionarios", id_funcionarios);
    formData.append("foto_funcionario", foto_funcionario);
    formData.append("nome", nome);
    formData.append("email", email);
    formData.append("data_nascimento", data_nascimento);
    formData.append("cpf", cpf);
    formData.append("telefone", telefone);
    formData.append("rg", rg);
    formData.append("cep", cep);
    formData.append("logradouro", logradouro);
    formData.append("numero", numero);
    formData.append("tipo_funcionario", tipo_funcionario);
    formData.append("cargo", cargo);
    formData.append("atividades", atividades);
    formData.append("dia_semana", JSON.stringify(dia_semana));
    formData.append("horario_inicio", JSON.stringify(horario_inicio));
    formData.append("horario_saida" , JSON.stringify(horario_saida));

    $.ajax({

        url: 'crud_funcionarios/update.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false
    }).done((result) => {
        alert("Dados Alterados com sucesso!")
        console.log(dia_semana)
        console.log(id_funcionarios)
        console.log(result)
        

    }).fail((xhr, status, error) => {
        alert("Erro em alterar os dados" + error)
    })
}) 


function addDiaSemana() {
    //Receber os dias da semana via mySQL
    $.ajax({
        url: 'crud_funcionarios/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {
        $('.dia_semana').empty();
        result.dia_semana.forEach(dia_semana => {

            $('.dia_semana').append(`<option value="${dia_semana.id_dia_semana}">${dia_semana.dia_da_semana}</option>`)
        });
    }).fail((xhr, status, error) => {
        alert('Erro ao inserir os dias da semana', + error);
    })
}

//Funções para admin.php

function modalOperationFuncionarios() {
    $.ajax({
        url: 'crud_funcionarios/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {
        $('#list-funcionarios').empty();
        result.funcionarios.forEach(funcionarios => {
            let linhaFuncionario = `
            <tr data-id="${funcionarios.id_funcionarios}">
                 <td>${funcionarios.id_funcionarios}</td>
                 <td>${funcionarios.nome}</td>
    
            <td class="tdButtonsAction">
            <button class="buttonDadosFuncionario">Dados Pessoais</button>
            <button class="buttonInfoFuncionario">Informações</button>
            <button class="buttonHorariosFuncionario">Horarios</button>
            <button class="buttonEditFuncionario" data-id="${funcionarios.id_funcionarios}">Editar</button>
            <button class="buttonExcluirFuncionario" data-id="${funcionarios.id_funcionarios}">Excluir</button>
        
             </td>
             </tr> `
            $('#list-funcionarios').append(linhaFuncionario)

            //Classes Manipuladas pelo PHP e JS
            let fotoLogado = $(".perfil"); //Classe PHP
            let loogedArea = $('.looged-area');//Classe HTML header.php
            loogedArea.append(fotoLogado);
            
            let funcionarioDadosModal = $(".funcionarioDados");//Classe HTML header.php
            let dadosLogado = $(".areaPerfil");//Classe PHP
            funcionarioDadosModal.append(dadosLogado)

            

            //Dados Pessoais

            $('.buttonDadosFuncionario').on('click', function () {
                $('.modalDadosFuncionario').css("display", "flex");
                let id_funcionario = $(this).closest('tr').data('id');
                if (id_funcionario == funcionarios.id_funcionarios) {
                    inserirDadosPessoaisFuncionarios(funcionarios);
                    
                }
            });

            

        })
        result.dados_funcionarios.forEach(infoFuncionario => {
            $('.buttonInfoFuncionario').on('click', function () {
                $('.modalInfoFuncionario').css("display", "flex");
                let id_funcionario = $(this).closest('tr').data('id');
                if (id_funcionario == infoFuncionario.id_funcionarios) {
                    inserirInfoFuncionario(infoFuncionario);
                    
                }
            });
           
        })



        $('.buttonHorariosFuncionario').on('click', function () {
            $('#td_horarios').empty()
            $('.modalHorariosFuncionario').css("display", "flex");
            let id_funcionario = $(this).closest('tr').data('id');

            // Filtra os horários associados a este funcionário
            let horariosFuncionario = result.horarios_funcionarios.filter(horario => horario.id_funcionarios == id_funcionario);

            // Adiciona as linhas na tabela para cada horário do funcionário
            horariosFuncionario.forEach(horario => {
                result.dia_semana.forEach(diaSemana => {
                    if (diaSemana.id_dia_semana == horario.id_dia_semana) {
                        inserirHorariosFuncionario(horario, diaSemana);
                    }
                });
            });
        });

        let buttonEditFuncionario = $(".buttonEditFuncionario");
        let modalEditFuncionario = $(".modalEditFuncionario");

        buttonEditFuncionario.each(function (index) {
            let idFuncionario = $(this).data("id");
           console.log(idFuncionario)
            $(this).on("click", function (e) {
                e.preventDefault()
                 $("#editFuncionarios").attr('data-id', idFuncionario)
                modalEditFuncionario.css("display", "flex");
                editarDadosFuncionario(idFuncionario)
                

            })
        })


        let buttonExcluirFuncionario = $(".buttonExcluirFuncionario");

        buttonExcluirFuncionario.each(function (index) {
            $(this).on("click", function (e) {
                e.preventDefault();
                let id_funcionarios = $(this).data("id")
                console.log(id_funcionarios)
                $.ajax({

                    url: "crud_funcionarios/delete.php",
                    method: "POST",
                    data: { id_funcionarios: id_funcionarios }
                }).done((result) => {
                    $(`tr[data-id='${id_funcionarios}']`).remove();
                    console.log(result)

                }).fail((xhr, status, error) => {
                    alert("Erro ao deletar os dados " + error)
                })
                
            })
        })





    }).fail((xhr, status, error) => {
        alert('Não possivel em inserir os dados' + error)
    })
}

function nossaEquipe(funcionarios,infoFuncionario){
    let equipeArea = $(".equipeArea");
    let linhaEquipe = `
       <div class="membro">
           <img src="${funcionarios.foto_usuario}" alt="">
           <h2>${funcionarios.nome}</h2>
           <p>${infoFuncionario.cargo}</p>
       </div>
    
    `
    equipeArea.append(linhaEquipe)
}

function inserirDadosPessoaisFuncionarios(funcionarios) {
    $("#infoDadosFuncionario").empty()
    let linhaDadosPessoais = `
    <div class="div">
        <img src="crud_funcionarios/uploads/${funcionarios.foto_funcionario}" id = "foto_colaborador" class = "foto" alt="">     
    </div>
    <div class="div">
        <h3>Nome Completo</h3>
        <p>${funcionarios.nome}</p>
    </div>
    <div class="div">
        <h3>Email</h3>
        <p>${funcionarios.email}</p>
    </div>
    <div class="div">
        <h3>Data de Nascimento</h3>
        <p>${funcionarios.data_nascimento}</p>
    </div>
    <div class="div">
        <h3>CPF</h3>
        <p>${funcionarios.cpf}</p>
    </div>
    <div class="div">
        <h3>Telefone</h3>
        <p>${funcionarios.telefone}</p>
    </div>
    <div class="div">
        <h3>RG</h3>
        <p>${funcionarios.rg}</p>
    </div>
    <div class="div">
        <h3>CEP</h3>
        <p>${funcionarios.cep}</p>
    </div>
    <div class="div">
        <h3>Logradouro</h3>
        <p>${funcionarios.logradouro}</p>
    </div>
    <div class="div">
        <h3>Numero da Residencia</h3>
        <p>${funcionarios.numero_endereco}</p>
    </div> `


    $('#infoDadosFuncionario').append(linhaDadosPessoais);
   
}

function inserirInfoFuncionario(infoFuncionario) {
    $("#infoFuncionario").empty()
    let linhaInfoFuncionario = `
    <div class="div">
    <h3>Tipo do Funcionario</h3>
    <p>${infoFuncionario.tipo_funcionario}</p>
    </div>
    <div class="div">
    <h3>Cargo</h3>
    <p>${infoFuncionario.cargo}</p>
    </div>
    <div class="div">
    <h3>Atividades</h3>
    <p>${infoFuncionario.atividades}</p>
    </div>
    
    `
    $("#infoFuncionario").append(linhaInfoFuncionario);
}

function inserirHorariosFuncionario(horarios, diaSemana) {

    let idDiaSemana = horarios.id_dia_semana;
    let nomeDiaSemana = diaSemana.dia_da_semana;
    let horario_inicio = horarios.horario_inicio.substring(0, 5);
    let horario_saida = horarios.horario_saida.substring(0, 5);
    let horarioLinha = `
    <tr>
        <td value = "${idDiaSemana}">${nomeDiaSemana}</td>
        <td>${horario_inicio}</td>
        <td>${horario_saida}</td>                  
    </tr>
    `

    $("#td_horarios").append(horarioLinha)
}

function editarDadosFuncionario(id_funcionarios) {

    $.ajax({

        url: "crud_funcionarios/read.php",
        method: 'GET',
        dataType: "json"

    }).done((result) => {
       
        result.funcionarios.forEach(funcionario => {

            if(id_funcionarios == funcionario.id_funcionarios){
                $('#nome_funcionario').val(funcionario.nome);
                $('#email_funcionario').val(funcionario.email);
                $('#data_nascimento_funcionario').val(funcionario.data_nascimento);
                $('#cpf_funcionario').val(funcionario.cpf);
                $('#telefone_funcionario').val(funcionario.telefone);
                $('#rg_funcionario').val(funcionario.rg);
                $('#cep_funcionario').val(funcionario.cep);
                $('#logradouro_funcionario').val(funcionario.logradouro);
                $('#numero_funcionario').val(funcionario.numero_endereco);
            }
        })
        

        result.dados_funcionarios.forEach(dadosFuncionario => {
            if(id_funcionarios == dadosFuncionario.id_funcionarios){
                $('#tipo_funcionario').val(dadosFuncionario.tipo_funcionario);
                $('#cargo').val(dadosFuncionario.cargo);
                $('#atividades').val(dadosFuncionario.atividades);
            }
        })

        $('#tableHorarios').empty();
        result.horarios_funcionarios.forEach(horario =>{
            if (id_funcionarios == horario.id_funcionarios) {
                $('#tableHorarios').append(`
                    <tr>
                        <td>
                            <select name="dia_semana" class="dia_semana">
                                <option selected>Selecione</option>
                                ${result.dia_semana.map(dia => `
                                    <option value="${dia.id_dia_semana}">${dia.dia_da_semana}</option>
                                `).join('')}
                            </select>
                        </td>
                        <td><input type="time" name="horario_inicio" class="horario_inicio" value="${horario.horario_inicio}"></td>
                        <td><input type="time" name="horario_saida" class="horario_saida" value="${horario.horario_saida}"></td>
                    </tr>`);
            }
        })
        addDiaSemana()

    }).fail((xhr, status, error)=>{
        alert("Erro em preencher as lacunas" + error)
    })
}