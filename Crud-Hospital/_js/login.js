function enviaFormNovoLogin(event) {
    event.preventDefault();

    const { email, password } = event.target;
    const dados = {
        email: email.value
        ,senha: password.value
    };

    if (!dados.email || !dados.senha) {
        return exibeAlerta({
            success: false
            ,message: 'Preencha todos os campos!'
        })    
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: './_php/criar_login.php',
        async: true,
        data: dados,
        success: function (response) {
            exitCriarConta()
            exibeAlerta(response)

            if (!response.success) return
            event.target.reset()   
        }
    });
}

function enviaFormLogin(event) {
    event.preventDefault();   

    const { email, password } = event.target;
    const dados = {
        email: email.value
        ,senha: password.value
    };

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: './_php/login.php',
        async: true,
        data: dados,
        success: function (response) {
            exibeAlerta(response)

            if (!response.success) return
            setTimeout(() => {
                window.location.href = './home.html'
            }, 2500);
        }
    });
}