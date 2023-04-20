function cadastroExa(event) {
    event.preventDefault();

    const {nmPaciente, endereco, dtNascimento, cpf, arqExame} = event.target;
    const dados = {
        nmPaciente: nmPaciente.value 
        , endereco: endereco.value
        , dtNascimento: dtNascimento.value
        , cpf: parseInt((cpf.value).replace('.', '').replace('.', '').replace('-',''))
        , arqExame: arqExame.value
    };

    if (!dados.nmPaciente || !dados.endereco || !dados.dtNascimento || !dados.cpf || !dados.arqExame) {
        return exibeAlerta({
            success: false
            ,message: 'Preencha todos os campos!'
        })    
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: './_php/cadastroExame.php',
        async: true,
        data: dados,
        success: function (response) {
            exibeAlerta(response)

            if (!response.success) return
            event.target.reset() 
        }
    });
}

var time = null;
function pesquisaComFiltro(event) {
    clearTimeout(time);

    const dados = {paciente: event.target.value}

    time = setTimeout(() => {
        buscaPacientes(dados);              
    }, 1000);
}

function buscaPacientes(dados = {paciente: ''}) {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: './_php/pesquisarExame.php',
        async: true,
        data: dados,
        success: function (response) {
            montaPacientes(response)       
        }
    });      
}

function montaPacientes(pacientes) {
    document.querySelector('#listaPacientes').innerHTML = '';

    pacientes.forEach(paciente => {
        document.querySelector('#listaPacientes').innerHTML += `
            <li class='list-group-item p-0 d-flex'>
                <h6>${paciente.nmPaciente}</h6>
                <div class='ms-auto'>
                    <span class="badge bg-primary">${paciente.dtNascimento}</span>
                    <span class="badge bg-success btn">Alterar</span>
                    <span class="badge bg-danger btn" onClick='excluir(${paciente.id})'>X</span>
                </div>
            </li>
        `    
    });
    
}

function excluir(id) {
    const dados = {id: id};
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: './_php/deletarExame.php',
        async: true,
        data: dados,
        success: function (response) {
            exibeAlerta(response)

            if (!response.success) return
            buscaPacientes()     
        }
    });    
}