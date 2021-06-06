var conta;

function openCriarConta(){
    conta = document.getElementsByClassName('card-son')[0].style.display = 'block';
    conta = document.getElementsByTagName('main')[0].style.opacity = 0.1;
}

function exitCriarConta(){
    conta = document.getElementsByClassName('card-son')[0].style.display = 'none';
    conta = document.getElementsByTagName('main')[0].style.opacity = 1;
}

function carregaEmailNovo({data}) {
    console.log(data.email);
    document.getElementsByName('emailLogin').value = data.email;
}

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