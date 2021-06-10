function cadastroE(event) {
    event.preventDefault();

    const {nmPaciente, endereco, dtNascimento, cpf, arqExame} = event.target;
    const dados = {
        nmPaciente: nmPaciente.value 
        , endereco: endereco.value
        , dtNascimento: dtNascimento.value
        , cpf: cpf.value
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
        url: './_php/cadastrar_exame.php',
        async: true,
        data: dados,
        success: function (response) {
            exibeAlerta(response)

            if (!response.success) return
            event.target.reset()   
        }
    });
}

//outro

function exibeAlerta(res) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

    if (res.success) {     
          Toast.fire({
            icon: 'success',
            title: res.message
          })
    } else {
        Toast.fire({
            icon: 'error',
            title: res.message
          })
    }
}