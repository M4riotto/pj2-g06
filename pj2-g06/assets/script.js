function showModal(idModal){ 
    //idModal é usado para avisar que há um parâmetro lá no html, o texto pode ser qualquer coisa para avisar que o parâmetro será um texto.
    const modal = document.querySelector(idModal)
    modal.style.display = "flex"
}

//deicar o modal escondido
function hideModal(idModal, event) {
    if(event.target.className === 'modal'){
        const modal = document.querySelector(idModal)
        modal.style.display = 'none'
    }
}

//forçar o fechamento após receber a mensagem de alerta
function closeAllModal() {
    const modais = document.querySelectorAll('.modal')
    modais.forEach(modal => {
        modal.style.display = 'none'
    })
}

//toda a resposta através do servidor:
async function insertEventos(event) {
    event.preventDefault() //tira a forma padrão.
    const formData = new FormData(event.target)
    const response = await fetch('../backend/insertEventos.php', {
        method: 'POST',
        body: formData
    })
    const result = await response.json()
    if (result?.success) {
        alert('Seu Evento '+result.data.nome+' foi cadastrado com sucesso!');
        loadEventos();
    }
}

async function loadEventos() {
    const response = await fetch('backend/list-eventos.php')
    const result = await response.json()
    if (result?.success) {
        const listaClientes = document.querySelector('#festas')
        listaClientes.innerHTML = ''
        const clientes = result.data
        clientes.map((eventos) => {
            listaClientes.innerHTML += `
                    ${eventos.nome}
                    ${eventos.descricao}
                    ${eventos.dia}
                    ${eventos.horario}`
     
        })

    }else{
        alert('Erro ao cadastrar a função')
    }       
}
