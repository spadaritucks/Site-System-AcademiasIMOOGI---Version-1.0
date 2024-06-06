$(document).ready(function () {
    listarModalidadesFicha();
    verificarModalidades();
    listarPlanoFicha()
    modalOperationUsuarios()
    loadModalidades()

});

function verificarModalidades() {
    const planosArea = $('#planosArea');

    $.ajax({
        url: 'crud_planos/read.php',
        method: 'GET',
        dataType: 'json'
    }).done(planosResult => {
        planosArea.on('change', function() {
            const selectedOption = $(this).val();
            updateModalidadesContainer(selectedOption, planosResult);
        });
    }).fail((xhr, status, error) => {
        alert('Erro ao carregar planos: ' + error);
    });
}

function updateModalidadesContainer(selectedOption, planosResult) {
    const modalidadesContainer = $('#modalidadesContainer');
    modalidadesContainer.empty();

    for (let i = 0; i < planosResult.length; i++) {
        if (selectedOption == planosResult[i].id_planos) {
            const numModalidades = planosResult[i].num_modalidades;

            if (numModalidades > 1) {
                for (let k = 2; k <= numModalidades; k++) {
                    modalidadesContainer.append(`
                        <span>Modalidades</span>
                        <select name="modalidadesArea[]" id="modalidadesArea${k}" class="modalidadesArea"></select>
                    `);
                }
            }

            loadModalidades();
            break; // Stop looping as we found the matching plan
        }
    }
}

function loadModalidades() {
    $.ajax({
        url: 'crud_modalidades/read.php',
        method: 'GET',
        dataType: 'json'
    }).done(modalidadesResult => {
        const artesMarciais = modalidadesResult.ArtesMarciais;
        const danca = modalidadesResult.Danca;

        $('.modalidadesArea').each(function() {
            const selectElement = $(this);
            selectElement.empty();

            artesMarciais.forEach(modalidade => {
                selectElement.append(`
                    <option value="${modalidade.id_modalidades}">
                        ${modalidade.nome_modalidade}
                    </option>
                `);
            });

            danca.forEach(modalidade => {
                selectElement.append(`
                    <option value="${modalidade.id_modalidades}">
                        ${modalidade.nome_modalidade}
                    </option>
                `);
            });
        });
    }).fail((xhr, status, error) => {
        alert('Erro ao carregar modalidades: ' + error);
    });
}





function listarModalidadesFicha() {
    $.ajax({
        url: 'crud_modalidades/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {
        for (let i = 0; i < result.length; i++) {
            $('#modalidadesAreaFirst').append(`
                <option value="${result[i].id_modalidades}">${result[i].nome_modalidade}</option>`)
        }


    })
}

function listarPlanoFicha() {
    $.ajax({
        url: 'crud_planos/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {
        for (let i = 0; i < result.length; i++) {
            $('#planosArea').append(`
            <option value="${result[i].id_planos}">${result[i].nome_plano}</option>`)

        }

    }).fail((xhr, status, error) => {
        // Exibe um alerta indicando que ocorreu um erro
        alert('Erro ao inserir dados: ' + error);
    });
}


$("#formUsuario").submit(function (e) {
    e.preventDefault();

    let foto_usuario = $("#foto_usuario")[0].files[0];
    let formData = new FormData(this);
    formData.append("foto_usuario", foto_usuario);


    if(!foto_usuario){
        formData.delete('foto_usuario')
    }

    console.log(formData);

    $.ajax({
        url: 'crud_usuarios/inserir.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
    }).done((result) => {
        console.log(result);

        // Limpa os campos do formulário
        $("#formUsuario").trigger('reset');
        $("#modalidadesContainer").empty();  // Limpa as modalidades dinâmicas
        alert('Os dados foram inseridos com sucesso!');
        modalOperationUsuarios();
    }).fail((xhr, status, error) => {
        alert('Erro ao inserir dados: ' + error);
    });
});

$('#editAlunos').submit(function (e) {
    e.preventDefault();

    let id_usuarios = $(this).data("id");
    let foto_usuario = $("#foto_usuario")[0].files[0];
    let formData = new FormData(this);
    formData.append("id_usuarios", id_usuarios);
    formData.append("foto_usuario", foto_usuario);

    // Adiciona as modalidades selecionadas ao formData
    $(".modalidadesArea").each(function() {
        formData.append("modalidadesArea[]", $(this).val());
    });
    console.log(formData);

    $.ajax({
        url: 'crud_usuarios/update.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
    }).done((result) => {
        console.log(result);
        $('#editAlunos').trigger('reset');
        $("#modalidadesContainer").empty();  // Limpa as modalidades dinâmicas
        alert('Os dados foram atualizados com sucesso!');
        modalOperationUsuarios();
    }).fail((xhr, status, error) => {
        alert('Erro ao atualizar dados: ' + error);
    });
});


function modalOperationUsuarios() {
    $.ajax({
        url: 'crud_usuarios/read.php',
        method: 'GET',
        dataType: 'json'
    }).done((result) => {
        $('#list-alunos').empty()
        result.usuarios.forEach(usuarios => {
            let linhaUsuario = `
            <tr class = "idUsuario" data-id="${usuarios.id_usuarios}">
                 <td>${usuarios.id_usuarios}</td>
                 <td>${usuarios.nome}</td>
    
            <td class="tdButtonsAction">
            <button class="buttonDados">Dados Pessoais</button>
            <button class="buttonPlanos">Contratos</button>
            <button class="buttonEdit" data-id="${usuarios.id_usuarios}">Editar</button>
            <button class="buttonExcluir" data-id="${usuarios.id_usuarios}">Excluir</button>
        
             </td>
             <td class = "tdStatus"></td>
             </tr> `
            $('#list-alunos').append(linhaUsuario);



            //Classes Manipuladas pelo PHP e JS
            let fotoLogado = $(".perfil"); //Classe PHP
            let loogedArea = $('.looged-area');//Classe HTML header.php
            loogedArea.append(fotoLogado);

            let usuarioDadosModal = $(".usuarioDados");//Classe HTML header.php
            let dadosLogado = $(".areaPerfil");//Classe PHP
            usuarioDadosModal.append(dadosLogado)

            let areaCarteira = $(".areaCarteira");
            let infoCarteira = $(".infoCarteira")
        
            areaCarteira.append(infoCarteira);




            //Dados Pessoais

            $('.buttonDados').on('click', function () {
                $('.modalDados').css("display", "flex");
                let id_usuario = $(this).closest('tr').data('id');
                if (id_usuario == usuarios.id_usuarios) {
                    inserirDadosPessoaisUsuarios(usuarios);
                }
            });

        })
        result.contratos.forEach(contratos => {
            $('.buttonPlanos').on('click', function () {
                $('.modalPlanos').css("display", "flex");
                let id_usuario = $(this).closest('tr').data('id');
                if (id_usuario == contratos.id_usuarios) {
                    inserirContratos(contratos);
                    result.modalidades.forEach(modalidade => {
                        if (id_usuario == modalidade.id_usuarios) {
                            inserirModalidades(modalidade); 
                        }
                    })

                }

            });
            statusPlano(contratos);



        })





        let buttonExit = $('.buttonExit')
        let modalWindow = $('.modalWindow')
        buttonExit.each(function (index) {
            $(this).on("click", function (e) {
                e.preventDefault();
                
                modalWindow.eq(index).css('display', 'none');
            })
        })

        let buttonEdit = $(".buttonEdit");
        let modalEdit = $(".modalEdit")

        buttonEdit.each(function (index) {
            let idUsuarios = $(this).data("id")
            

            $(this).on("click", function (e) {
                e.preventDefault()
                $('#editAlunos').attr('data-id', idUsuarios);
                
               
                modalEdit.css("display", "flex");
                editarDadosUsuario(idUsuarios);



            })
        })

        let buttonExcluir = $(".buttonExcluir");

        buttonExcluir.each(function (index) {
            $(this).on("click", function (e) {
                e.preventDefault();
                let id_usuarios = $(this).data("id")
                $.ajax({

                    url: "crud_usuarios/delete.php",
                    method: "POST",
                    data: { id_usuarios: id_usuarios }
                }).done((result) => {
                    $(`tr[data-id='${id_usuarios}']`).remove();
                }).fail((xhr, status, error) => {
                    alert("Erro ao deletar os dados " + error)
                })
            })
        })






    }).fail((xhr, status, error) => {
        alert('Não possivel em inserir os dados' + error)
    })
}

let planosAtivos = 0;
let planosVencido = 0;
let planosRenovacao = 0;
let totalAlunos = 0;
function statusPlano(contratos) {

    $(".idUsuario").each(function () {

        let idUsuario = $(this).data("id");

        if (idUsuario == contratos.id_usuarios) {
            let tdStatus = $(`[data-id="${idUsuario}"] .tdStatus`); // Seleciona a célula de status específica para o usuário
            tdStatus.empty();
            let dataAtual = new Date();
            let dataValidade = new Date(contratos.data_validade); // Convertendo a string de data em um objeto Date

            let diffEmMilissegundos = dataValidade - dataAtual; // Calcula a diferença em milissegundos
            let diffEmDias = Math.ceil(diffEmMilissegundos / (1000 * 60 * 60 * 24)); // Converte a diferença em dias

            let status = "";
            if (diffEmDias < 0) {
                status = "VENCIDO"
                planosVencido++

            } else if (diffEmDias > 0 && diffEmDias <= 30) {
                status = "RENOVAÇÃO"
                planosRenovacao++
                totalAlunos++
            } else if (diffEmDias > 30) {
                status = "ATIVO"
                planosAtivos++
                totalAlunos++
            }



            alimentarGrafico(planosAtivos, planosVencido, planosRenovacao, totalAlunos)
            alimentarGraficoPizza(planosAtivos, planosVencido, planosRenovacao)

            tdStatus.append(`<p><strong>${status}</strong> <br> ${diffEmDias} dias restantes</p>`); // Define o texto da célula de status específica para o usuário atual

        }

    });
}



function alimentarGrafico(planosAtivos, planosVencido, planosRenovacao, totalAlunos) {
    google.charts.load("current", { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Plano", "Dias Restantes", { role: "style" }],
            ["Ativo", planosAtivos, "#greenyellow"],
            ["Vencido", planosVencido, "rgb(255, 79, 79)"],
            ["Renovação", planosRenovacao, "rgb(255, 197, 90)"],
            ["Total Alunos", totalAlunos, "rgb(112, 112, 252)"]

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2]);

        var options = {
            title: "Indice dos Planos",
            width: 480,
            height: 320,
            bar: { groupWidth: "95%" },
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }

}

function alimentarGraficoPizza(planosAtivos, planosVencido, planosRenovacao) {
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Planos', 'Por quantia de alunos'],
            ['Ativo', planosAtivos],
            ['Renovação', planosRenovacao],
            ['Vencido', planosVencido]

        ]);

        var options = {
            title: 'Indice dos Planos (em %)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

}



function inserirDadosPessoaisUsuarios(usuarios) {
    $("#infoDados").empty()
    let linhaDadosPessoais = ` 

    <div class="div">
    <img src="crud_usuarios/uploads/${usuarios.foto_usuario}" id = "foto_aluno" class = "foto" alt="">     
    </div>
    <div class="div">
      <h3>Nome Completo</h3>
      <p>${usuarios.nome}</p>
   </div>
   <div class="div">
     <h3>Email</h3>
     <p>${usuarios.email}</p>
   </div>
   <div class="div">
     <h3>Data de Nascimento</h3>
     <p>${usuarios.data_nascimento}</p>
   </div>
   <div class="div">
      <h3>CPF</h3>
      <p>${usuarios.cpf}</p>
   </div>
   <div class="div">
      <h3>Telefone</h3>
      <p>${usuarios.telefone}</p>
  </div>
  <div class="div">
     <h3>RG</h3>
     <p>${usuarios.rg}</p>
  </div>
  <div class="div">
    <h3>CEP</h3>
    <p>${usuarios.cep}</p>
   </div>
   <div class="div">
     <h3>Logradouro</h3>
     <p>${usuarios.logradouro}</p>
  </div>
    <div class="div">
       <h3>Numero da Residencia</h3>
       <p>${usuarios.numero_endereco}</p>
    </div>
    `

    $('#infoDados').append(linhaDadosPessoais);
}

function inserirContratos(contratos) {
    $("#infoPlanos").empty()
    let linhacontratos = `
    <div class="div">
    <h3>Plano Contratado</h3>
    <p>${contratos.nome_plano}</p>
</div>
<div class="div">
    <h3>Data de Inicio</h3>
    <p>${contratos.data_inicio}</p>
</div>
<div class="div">
    <h3>Data de Renovação</h3>
    <p>${contratos.data_renovacao}</p>
</div>
<div class="div">
    <h3>Data de Vencimento</h3>
    <p>${contratos.data_validade}</p>
</div>
<div class="div">
    <h3>Observações</h3>
    <p>${contratos.observacoes}</p>
</div>
    
    `
    $("#infoPlanos").append(linhacontratos);
}

function inserirModalidades(modalidade) {
    let linhamodalidade = `
    <div class="div">
    <h3>Modalidade</h3>
    <p>${modalidade.nome_modalidade}</p>
</div>
    `


    $("#infoPlanos").append(linhamodalidade);
}



function editarDadosUsuario(idUsuarios) {
    $.ajax({
        url: 'crud_usuarios/read.php',
        method: 'GET',
        dataType: 'json',
    }).done((result) => {
        console.log(result);
        let usuarioModalidades = [];

        result.usuarios.forEach((usuario) => {
            if (usuario.id_usuarios == idUsuarios) {
                $("#nome").val(`${usuario.nome}`);
                $("#email").val(`${usuario.email}`);
                $("#data_nascimento").val(`${usuario.data_nascimento}`);
                $("#cpf").val(`${usuario.cpf}`);
                $("#telefone").val(`${usuario.telefone}`);
                $("#rg").val(`${usuario.rg}`);
                $("#cep").val(`${usuario.cep}`);
                $("#logradouro").val(`${usuario.logradouro}`);
                $("#numero").val(`${usuario.numero_endereco}`);
            }
        });

        result.contratos.forEach((contrato) => {
            if (contrato.id_usuarios == idUsuarios) {
                $('#planosArea').val(contrato.id_planos)
                $('#data_inicio').val(`${contrato.data_inicio}`)
                $('#data_renovacao').val(`${contrato.data_renovacao}`);
                $('#data_validade').val(`${contrato.data_validade}`);
                $('#observacoes').val(`${contrato.observacoes}`);

                // Atualiza os campos de modalidades de acordo com o plano
                updateModalidadesContainer(contrato.id_planos, result.planos);

                // Armazena as modalidades do usuário para posterior preenchimento
                usuarioModalidades = result.modalidades.filter(modalidade => modalidade.id_usuarios == idUsuarios);
            }
        });

        // Preenche os campos de modalidades após uma pequena espera para garantir que os campos foram gerados
        setTimeout(() => {
            usuarioModalidades.forEach((modalidade, index) => {
                $(`#modalidadesArea${index + 1}`).val(modalidade.id_modalidades);
            });
        }, 500);

    }).fail((xhr, status, error) => {
        alert('Erro ao carregar dados: ' + error);
    });
}







