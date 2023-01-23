$(document).ready(() => {
    retornoCadastro();
})

function retornoCadastro() {
    const sucesso = $('#sucesso')
    const erro = $('#erro')

    if (sucesso.html() || erro.html()) {
        $('#retornoCadastroModal').modal('toggle')
    }
}