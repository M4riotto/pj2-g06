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
                    <div class="col-sm-3 col-lg-3">
                    <div class="card">
                        <div class="card-header col text-center p-2">Evento</div>
                        <img src="${eventos.capa}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">${eventos.nome}</h5>
                            <h6 class="card-sub-title mb-2 text-muted">${eventos.descricao}</h6>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">DIA: ${eventos.dia}</li>
                                <li class="list-group-item">horario: ${eventos.horario}</li>
                            </ul>
                            <div class="card-body p-2">
                                <a href="#" class="card-link">SEPARAR VAGA</a>
                                <a href="#" class="card-link">Detalhes..</a>
                            </div>
                            <div class="card-footer text-right card-rodape-empresa text-muted">EMPRESA QUE ESTÁ FAZENDO O EVENTO
                            </div>
                          </div><!--card-->
                        </div><!--col do car--> `              
        })

    }else{
        alert('Erro ao cadastrar a função')
    }       
}
